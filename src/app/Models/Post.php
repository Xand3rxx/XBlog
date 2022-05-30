<?php

namespace xand3rxx\XBlog\app\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    /**
     * The "booted" method of the model.
     * Create uuid when a new post is to be created
     *
     * @return void
     */
    protected static function booted()
    {
        static::creating(function ($post) {
            // Generate unique uuid for a post user.
            $post->uuid = (string) Str::uuid();

            // Generate unique slug for a new post.
            $post->uuid = (string) Str::slug($post->title);
        });
    }
}
