<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class HomePost extends Model
{
    use HasFactory;

    public $userId;
    public $firstName;
    public $lastName;
    public $profileImage;

    public $postId;
    public $body;
    public $type;
    public $url; // url if type image, video, file...
    public $createdAt;
    public $numberLikes;
    public $numberComments;

    /**
     * @param $post: array
     */
    function __construct(array $post = [])
    {
        if ($post != null){
            $this->userId = $post["userId"];
            $this->firstName = $post["first_name"];
            $this->lastName = $post["last_name"];
            $this->profileImage = $post["profile_image"];
            $this->postId = $post["postId"];
            $this->body = $post["body"];
            $this->type = $post["type"];
            $this->url = $post["url"];
            $this->createdAt = Carbon::parse($post["createdAt"]);
            $this->numberLikes = $post["number_likes"];
            $this->numberComments = $post["number_comments"];
        }
    }

}

