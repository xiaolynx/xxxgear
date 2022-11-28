<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable=['user_id','parent_id', 'body'];

    protected $appends = [
        'liked', 'disliked'
    ];


    public function getLikedAttribute() {
        return $this->likes()->where('like', 1)
            ->where('likeable_id', $this->id)
            ->where('likeable_type', get_class($this))
            ->count();
    }

    public function getdislikedAttribute() {
        return $this->likes()->where('dislike', 1)
            ->where('likeable_id', $this->id)
            ->where('likeable_type', get_class($this))
            ->count();
    }

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['user'];
    public function scopeAllPosts($query){
        return $query->where('user_id', auth()->id())
        ->orWhereIn('user_id', auth()->user()->friends_ids());
    }
   /**
         * Get the user that owns the Post
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function user() {
            return $this->belongsTo(User::class);
        }
        public function likes() {
            return $this->morphMany(Like::class, 'likeable');
        }
    }

