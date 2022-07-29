<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProfileController extends Controller
{
    public $url = 'http://localhost:8080/';
    public $id = "624cac94f698c55e89e0b5d1";

    function index()
    {
        // $id = Auth::user()->id;
        $responseUser = Http::get($this->url . "user/" . $this->id);
        $responsePosts = Http::get($this->url . "postsOfUser/" . $this->id);
        return view('profile.index',['user' => $responseUser->json(),'posts'=> $responsePosts->json()]);
    }

    function edit() {
        $profile = Http::get($this->url ."user/" . $this->id);
        return view('profile.edit',['user' => $profile->json()]);
    }

    function update(Request $request,$id) {
        $user = $this->id;

        if ($request->hasfile('photos')){
            //a modifier origialpathname
            $file = $request->file('photos');
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/img/users' ;
            $file->move($destinationPath,$fileName);
        }else{
            $fileName='';
        }
        $data=array(
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "email"=>$request->email,
            "bio"=>$request->bio,
            "image"=>$fileName
        );

        $response = Http::put($this->url . "user/" . $id, $data);

        return redirect()->route("profile.index");
    }

    // details post
    public function show($id){
//        $identif = Auth::user()->id;
        $responseUser = Http::get($this->url . 'user/' . $this->id);

        $responsePost=Http::get($this->url . 'post/' . $id);
        $post = $responsePost->json();

        $responseComments = Http::get($this->url . 'commentsOfPost/' . $post['id']);
        $commentaires = $responseComments->json();

        $user = Http::get($this->url . 'users');
        $users = $user->json();
        $result = Array();
        foreach ($commentaires as $a) {
            foreach ($users as $b) {
                if($a['userId'] ==  $b['id']) {
                    $result[] = array_merge($a,$b);
                }
            }

        }
        return view('profile.show',['collection' => $post,'comment'=>$result,'profil'=>$responseUser->json()]);
    }

    public function destroy($id_u)
    {
        $delete=Http::get('http://localhost:8080/post/'.$id_u);
        $a=$delete->json();
        Http::delete('http://localhost:8080/post/'.$a['id']);
        return redirect()->route('profile.index');
    }
}
