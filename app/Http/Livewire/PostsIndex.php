<?php

namespace App\Http\Livewire;

use App\Models\HomePost;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Livewire\WithPagination;
use App\Models\Post;


class PostsIndex extends Component
{
    use WithPagination;

    public $search;
    public $posts = array();
    public $homePage;
    public $first;
    public $last;
    public $empty;
    public $number;
    public $size;


    protected $queryString = ['search'];

    public function mount()
    {
        $url = "http://localhost:8080/home?size=".$this->size."&page=". $this->number;
    //    $response = Http::get($url);

//        var_dump(session("key"));

        //$response = Http::get($url . "&S_ID=". session("S_ID")[0]);
        $response = Http::get($url);
        $this->homePage = $response->json();
        $resPosts = $this->homePage["homePost"];
        // print_r($page);

        $this->posts = [];
        foreach ($resPosts as $post) {
            if ($post != null) {
                $newPost = new HomePost($post);
                $this->posts[] = $newPost;
            }
        }

        $this->first = $this->homePage["first"];
        $this->last = $this->homePage["last"];
        $this->empty = $this->homePage["empty"];
        $this->number = $this->homePage["number"];

    }

    public function previousPage()
    {
        if (!$this->first) {
            $this->number--;
            $this->redirect("/?size=" . $this->size . "&page=" . $this->number);
            // $this->mount($this->number--);
        }
    }

    public function nextPage()
    {
        if (!$this->last){
            $this->number++;
            $this->redirect("/?size=".$this->size."&page=".$this->number);
            // $this->mount($this->number++);
        }
    }


    public function render()
    {
        return view('livewire.posts-index', ['page' => $this->posts]);
    }
}
