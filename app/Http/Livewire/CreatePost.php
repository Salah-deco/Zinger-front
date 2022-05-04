<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;


class CreatePost extends Component
{
    public $text;
    public $media;

    protected $rules = [
        'text' => 'min:4',
    ];

    public function createPost() {
//        if(auth()->guest()) {
//            abort(Response::HTTP_FORBIDDEN);
//        }

        // validate rules
        $this->validate();

        // $post = Post::create(...);

        // userId, type, body, url
        $post = [
                //"userId" => auth()->get(),
                "userId" => '624cac94f698c55e89e0b5d1',
                "type" => ($this->media == null) ? 'text' : 'media',
                "body" => ($this->text == null) ? null : $this->text,
                "url" => ($this->media == null) ? null : $this->media
            ];
        $response = Http::post('http://localhost:8080/post', $post);
        if($response->ok()) {
           session()->flash('success_message', 'Post was added successfully!');
        } else {
            // error
        }

        return redirect()->route('post.index');
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
