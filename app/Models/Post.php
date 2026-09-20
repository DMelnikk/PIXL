<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['parent_id','profile_id','content'])]
class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Post::class,'parent_id');
    }

    public function replies(): HasMany
    {
        return $this->hasMany(Post::class,'parent_id');
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

}
