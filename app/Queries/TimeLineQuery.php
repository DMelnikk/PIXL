<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\Post;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class TimeLineQuery
{
    public function __construct(private Profile $profile) {}

    public static function forViewer(Profile $profile): self
    {
        return new self($profile);
    }

    public function paginate(int $perPage = 20): LengthAwarePaginator
    {
        return $this->baseQuery()->paginate($perPage)->through(fn (Post $post): Post => $this->normalize($post));
    }

    public function get(): Collection
    {
        return $this->baseQuery()->get()->map(fn (Post $post): Post => $this->normalize($post));
    }

    private function baseQuery(): Builder
    {
        // 1. Retrieve:
        //   - who I am
        //   - who I follow
        //
        // 2. Get posts:
        //   - mine
        //   - from those I follow
        //
        // 3. Exclude replies
        //
        // 4. For each post, load:
        //   - author
        //   - reply count
        //   - like count
        //   - repost count
        //   - whether I liked it
        //   - whether I reposted it
        //
        // 5. If it is a repost:
        //   - load the original post
        //   - its author
        //   - its counters
        //   - check if I liked the original
        //   - check if I reposted the original
        //
        // 6. Sort by date:
        //   newest → oldest
        $followingIds = $this->profile->followings()
            ->pluck('following_profile_id')
            ->prepend($this->profile->id);

        return Post::whereIn('profile_id', $followingIds)
            ->whereNull('parent_id')
            ->with([
                'profile',
                'repostOf' => fn ($q) => $q->withCount(['replies', 'likes', 'reposts'])->with('profile'),
            ])
            ->withCount(['replies', 'likes', 'reposts'])
            ->withExists([
                'likes as has_liked' => fn ($q) => $q->where('profile_id', $this->profile->id),
                'reposts as has_reposted' => fn ($q) => $q->where('profile_id', $this->profile->id),
                'repostOf as like_original' => fn ($q) => $q->whereHas('likes', fn ($q) => $q->where('profile_id', $this->profile->id)),
                'repostOf as repost_original' => fn ($q) => $q->whereHas('reposts', fn ($q) => $q->where('profile_id', $this->profile->id)),
            ])->latest();
    }

    private function normalize(Post $post): Post
    {
        if ($post->isRepost() && is_null($post->content)) {
            $post->repostOf->has_liked = (bool) $post->like_original;
            $post->repostOf->has_reposted = (bool) $post->repost_original;
        }

        return $post;
    }
}
