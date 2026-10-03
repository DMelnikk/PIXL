<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Like;
use App\Models\Post;
use App\Models\Profile;
use App\Queries\PostThreadQuery;
use App\Queries\TimeLineQuery;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index()
    {
        $profile = Auth::user()->profile;

        $posts = TimeLineQuery::forViewer($profile)->get();

        return Inertia::render('Posts/Index', [
            'profile' => $profile->toResource(),
            'posts' => $posts->toResourceCollection()
        ]);
    }

    public function show(Profile $profile, Post $post)
    {

        $post = PostThreadQuery::for($post, Auth::user()?->profile)->load();

        return Inertia::render('Posts/Show', [
            'post' => $post->toResource()
        ]);
    }

    public function store(CreatePostRequest $createPostRequest): Redirector|RedirectResponse
    {

        $profile = Auth::user()->profile;

        Post::publish($profile, $createPostRequest->validated('content'));

        return to_route('posts.index');
    }

    public function reply(Profile $profile, Post $post, CreatePostRequest $createPostRequest): Redirector|RedirectResponse
    {
        $currentProfile = Auth::user()->profile;

        Post::reply($currentProfile, $post, $createPostRequest->validated('content'));

        return back();
    }

    public function repost(Profile $profile, Post $post): Redirector|RedirectResponse
    {
        $currentProfile = Auth::user()->profile;

        Post::repost($currentProfile, $post);

        return to_route('posts.index');
    }

    public function quote(Profile $profile, Post $post, CreatePostRequest $createPostRequest): Redirector|RedirectResponse
    {
        $currentProfile = Auth::user()->profile;

        Post::repost($currentProfile, $post, $createPostRequest->validated('content'));

        return to_route('posts.index');
    }

    public function like(Profile $profile, Post $post)
    {
        $currentProfile = Auth::user()->profile;

        Like::createLike($currentProfile, $post);

        return back();
    }

    public function unlike(Profile $profile, Post $post)
    {
        $currentProfile = Auth::user()->profile;

        Like::removeLike($currentProfile, $post);

        return back();
    }

    public function destroy(Profile $profile, Post $post)
    {
        // Authorization...
        // If the current can update this post..
        if(Auth::user()->can('update',$post)) {
            $post->delete();
        }

        $post
            ->reposts()
            ->where('profile_id', Auth::user()->profile->id)
            ->first()
            ?->delete();

        return back();
    }
}
