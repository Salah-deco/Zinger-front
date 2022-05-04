<?php

namespace App\Models;

use App\Exceptions\DuplicateLikeException;
use App\Exceptions\LikeNotFoundException;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public $id;
    public $userId;
    public $type;
    public $body;
    public $url;
    public $createdAt;
    public $updatedAt;
    public $comments = array();
    public $reactions = array();
    public $reports = array();
    public $blocked;

    function __construct(array $post=null)
    {
        if ($post != null) {
            $this->id = $post["id"];
            $this->userId = $post['userId'];
            $this->type = $post['type'];
            $this->url = $post['url'];
            $this->body = $post['body'];
            $crated_at = Carbon::parse($post['createdAt']);
            $this->createdAt = $crated_at;
            $this->updatedAt = $post['updateAt'] ??  Null;
            $this->comments = $post['comments'];
            $this->likes = $post['likes'];
            $this->blocked = $post['blocked'];
            $this->reports = $post['reports'];
        }
    }

//    public function comments() {
//        return $this->hasMany(Comment::class);
//    }
//
//    public function user() {
//        return $this->belongsTo(User::class);
//    }
//
//    public function likes() {
//        return $this->belongsTo(User::class, 'votes');
//    }

    public function isLikedByUser(?User $user) {
        if (!$user) {
            return false;
        }
        // return true if like exists
    }

    public function like(User $user) {
        if ($this->isLikedByUser($user)) {
            throw new DuplicateLikeException;
        }

        // create like
    }

    public function removeLike(User $user) {
        $likeToDelete = false;

        if ($likeToDelete) {
            // delete
        } else {
            throw new LikeNotFoundException;
        }
    }

}
