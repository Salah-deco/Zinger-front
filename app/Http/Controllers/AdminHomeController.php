<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;


class AdminHomeController extends Controller
{
    public function index(){

        $allpost=Http::get('http://localhost:8080/postblock');
        $iduser=$allpost->json();
        $user=Http::get('http://localhost:8080/users');
        $users=$user->json();

        $data=array();
        foreach($iduser as $a){
            foreach($users as $b){
                if($a['userId']==$b['id'] ){
                    $data[]= array_merge($b,$a);
                }
            }
        }
        return view('Admin.Admin',['collection'=> $data]);
        
    }




    public function show($id){
        $post=Http::get('http://localhost:8080/post/'.$id);
        $posts=$post->json();
        $use=Http::get('http://localhost:8080/user/'.$post['userId']);
        $uses=$use->json();
        $report=Http::get('http://localhost:8080/repoByPost/'.$id);
        $reports=$report->json();
        $user=Http::get('http://localhost:8080/users');
        $users=$user->json();

        $data=array();
        foreach($reports as $a){
            foreach($users as $b){
                if($a['userId']==$b['id'] ){
                    $data[]= array_merge($b,$a);
                }
            }
        }


        return view('Admin.show',['collection'=> $posts,'user'=> $uses, 'repo'=> $data ]);
    }

    






    public function destroy($id)
    {
        $delete=Http::get('http://localhost:8080/post/'.$id);
        $a=$delete->json();
        Http::delete('http://localhost:8080/post/'.$a['id']);
        return redirect()->route('Admin.index');
    }
    public function update($id){

       
        $post=Http::get('http://localhost:8080/post/'.$id);
        $b=$post->json();
        
      $data=array(
          "userId"=>$b['userId'],
          "type"=>$b['type'],
          "isBlocked"=>false
      );

     Http::put('http://localhost:8080/post/'.$id,$data);
      return redirect()->route('Admin.index');

        
    }

    public function edit($id){

        $delete=Http::get('http://localhost:8080/post/'.$id);
        $a=$delete->json();
        Http::delete('http://localhost:8080/post/'.$a['id']);

    $user=Http::get('http://localhost:8080/user/'.$a['userId']);
    $b=$user->json();
        $data=array(
        
            "first_name"=>$b['first_name'],
            "last_name"=>$b['last_name'],
            "email"=>$b['email'],
            "password"=>$b['password'],
            "bio"=>$b['bio'],
            "isBlocked"=>true
        );
       Http::put('http://localhost:8080/user/'.$a['userId'],$data);
      return redirect()->route('Admin.index');

        
    }
}
