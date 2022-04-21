<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    public function index() { 
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
       return view('post.index',['collection' => $result]);
    }

    public function create() { }

    public function store(Request $request) { 

        $name=$request->body;
        $file=$request->file('file');
        $fileName = $file->getClientOriginalName() ;
        $filetype = explode(".", $fileName);
        $filetype_l=strtolower( $filetype[1] );
        $destinationPath = public_path().'/uploads' ;
        $file->move($destinationPath,$fileName);

        if($request->hasFile('file') && !$name){

    
            if($filetype_l == "png"||$filetype_l == "jpeg" ||$filetype_l == "jpg"||$filetype_l == "gif" ){
                $type="image";
            }else if($filetype_l == "mp4"||$filetype_l == "mpg"){
                $type="video";
            }else if($filetype_l == "pdf"){
                $type="document";
            }
            
        }else if($request->hasFile('file') && $name){
            
        }else if(!$request->hasFile('file') && $name){
            if(str_starts_with($name,'http')){
                $type="url";
            }else{
                $type="text";
            }
        }

        $data=array(
            "userId" => Auth::user()->id,
            "type" => $type,
            "body" => $fileName,
        );

        Http::post('http://localhost:9091/post', $data);
       return redirect()->route('post.index');

    }

    public function show($id) {
        $post=Http::get('http://localhost:9091/post/'.$id);
        $post_inf=$post->json();
        
        $user_post=Http::get('http://localhost:9091/user/'.$post_inf['userId']);
        $user_posts=$user_post->json();

        $commentaire=Http::get('http://localhost:9091/commentOfPost/'.$id);
        $commentaires=$commentaire->json();
        
        $user=Http::get('http://localhost:9091/users');
        $users=$user->json();
        $result = Array();
        foreach ($commentaires as $a) {
            foreach ($users as $b) {
                if($a['userId'] ==  $b['id']) {
                    $result[] = array_merge($b,$a);
                }
            }
        }
        return view('post.show',['collection' => $post_inf,'user'=>$user_posts,'comments'=>$result]);
     }

    public function edit($id) {
        $posts=Http::get('http://localhost:9091/post/'.$id);
        return view('Post.edit',['collection' => $posts->json()]);
     }

    public function update(Request $request, Post $post) { }

    public function destroy(Post $post,$id) { 
        Storage::delete('http://localhost:80/post/'.$id);
        return redirect(route('Profil.index'));
    }
}
