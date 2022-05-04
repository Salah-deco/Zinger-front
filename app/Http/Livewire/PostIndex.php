<?php

namespace App\Http\Livewire;

use App\Models\HomePost;
use Livewire\Component;
use App\Models\Post;
use App\Http\Livewire\Traits\WithAuthRedirects;

class PostIndex extends Component
{
//    use WithAuthRedirects;

    public $post;
    public $likesCount;
    public $hasLiked;

    public function mount(HomePost $post) {
        $this->post = $post;
        // if user current has liked this post true
        $this->hasLiked = false;
    }

    public function like()
    {
        # code...
    }

    public function render()
    {
        return view('livewire.post-index', ['post'=> $this->post, 'hasLiked' => $this->hasLiked]);
    }
}
