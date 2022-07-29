<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(Request $request) {
        $size = intval($request->query("size")??10);
        $page = intval($request->query("page")??0);

//        $request->session()->push("key", "value for test");
//        $sid = "c93b877e-2ccf-46f2-a582-75c28a9d14b3"; // exemple
//        $request->session()->push("S_ID", Str::uuid()->toString());

        $userSalah = "624cac94f698c55e89e0b5d1";


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
