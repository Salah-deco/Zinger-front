<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $post=Http::get('http://localhost:9091/posts');
        $user=Http::get('http://localhost:9091/users');
        $posts=$post->json();
        $users=$user->json();
        $result = Array();
        foreach ($posts as $a) {
            foreach ($users as $b) {
                if( $b['id'] == $a['userId']) {
                    $result[] = array_merge($b,$a);
                }
            }
    
        }
       return view('index',['collection' => $result]);
    }
}
