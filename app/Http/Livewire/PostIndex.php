<?php

namespace App\Http\Livewire;

use App\Exceptions\DuplicateLikeException;
use App\Exceptions\LikeNotFoundException;
use App\Models\HomePost;
use Livewire\Component;
use App\Models\Post;
use App\Http\Livewire\Traits\WithAuthRedirects;
use Illuminate\Support\Facades\Http;

class PostIndex extends Component
{
    use WithAuthRedirects;

    public $post;
    public $postId;
//    public $likesCount;
    public $hasLiked;

    public function mount(HomePost $post) {
        $this->post = $post;
        // if user current has liked this post true
        $this->hasLiked = true;

        error_log("create post component with id=". $this->postId);
    }

    public function like()
    {
        // check auth
        if (auth()->guest()) {
            return $this->redirectToLogin();
        }
        // userId from session
        $userId = session("userId") ?? "624cac94f698c55e89e0b5d1";
        if ($this->hasLiked) {
            try {
                // $this->post->removeLike(auth()->user());
                $url = "http://localhost:8080/post/removelike/" . $this->postId . "?userId=" . $userId;
                $response = Http::put($url);
                error_log(str($response->json()));

            } catch (LikeNotFoundException $e) {
                // do
                error_log($e->getMessage());
            }
            $this->hasLiked = false;
        } else {
            try {
                $url = "http://localhost:8080/post/like/". $this->postId . "?userId=" . $userId;
                $response = Http::contentType("x-www-form-urlencoded")->put($url);
                error_log(str($response->json()));
                // $this->post->like(auth()->user());
            } catch (DuplicateLikeException $e) {
                // do nothing
                error_log($e->getMessage());
            }
            $this->hasLiked = true;
        }
        return $this->redirect(url()->previous() );
    }

    public function render()
    {
        return view('livewire.post-index', ['post'=> $this->post, 'hasLiked' => $this->hasLiked]);
    }
}
