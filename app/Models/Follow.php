<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['follower_profile_id','following_profile_id'])]
class Follow extends Model
{
    /** @use HasFactory<\Database\Factories\FollowFactory> */
    use HasFactory;

    public function follower(): belongsTo
    {
        return $this->belongsTo(Profile::class, 'follower_profile_id');
    }

    // old name following_profile_id
    public function following(): belongsTo
    {
        return $this->belongsTo(Profile::class, 'following_profile_id');
    }


}
