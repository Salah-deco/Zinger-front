<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(Request $request) {
        $size = intval($request->query("size")??10);
        $page = intval($request->query("page")??0);

//        var_dump($size, $page);
        return view('post.index')->with("size", $size)->with("page", $page);
    }

    public function show(Post $post) {
        return view('post.show', [
            'post' => $post,
            'likesCount' => $post->likes()->count(),
            'backUrl' => url()->previous() !== url()->full() && url()->previous() !== route('login')
                            ? url()->previous()
                            : route('idea.index'),
        ]);
    }
}
