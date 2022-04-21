<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{


    function index()
    {
        $id = Auth::user()->id;
        $resp=Http::get('http://localhost:9091/user/'.$id);
        $name=Http::get('http://localhost:9091/postOfUser/'.$id);
        return view('Profil.index',['collection' => $resp->json(),'posts'=> $name->json()]);
     }


     public function edit($id)
     {
         $profil=Http::get('http://localhost:9091/user/'.$id);
         return view('Profil.edit',['collection' => $profil->json()]);
     }

     public function show($id){
        $identif = Auth::user()->id;
        $resp=Http::get('http://localhost:9091/user/'.$identif);

        $posts=Http::get('http://localhost:9091/post/'.$id);
        $id_user=$posts->json();
        $commentaire=Http::get('http://localhost:9091/commentOfPost/'.$id_user['id']);
        $commentaires=$commentaire->json();
        
        $user=Http::get('http://localhost:9091/users');
        $users=$user->json();
        $result = Array();
        foreach ($commentaires as $a) {
            foreach ($users as $b) {
                if($a['userId'] ==  $b['id']) {
                    $result[] = array_merge($a,$b);
                }
            }
    
        }
        return view('Profil.show',['collection' => $posts->json(),'comment'=>$result,'profil'=>$resp->json() ]);
     }

    public function update(Request $request,$id)
    {
        $user = Auth::user()->id;
        
        if ($request->hasfile('photos')){
            //a modifier origialpathname 
               $file = $request->file('photos');
               $fileName = $file->getClientOriginalName() ;
              $destinationPath = public_path().'/uploads' ;
              $file->move($destinationPath,$fileName);
        }else{
            $fileName='';
        }

        $data=array(
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "email"=>$request->email,
            "bio"=>$request->bio,
            "photos"=>$fileName,
        );
       
        Http::put('http://localhost:9091/user/'.$id, $data);
        
        
       return redirect()->route('profil.index');
   }

    public function destroy($id_u)
    {
        $delete=Http::get('http://localhost:9091/post/'.$id_u);
        $a=$delete->json();
        Http::delete('http://localhost:9091/post/'.$a['id']);
        return redirect()->route('profil.index');
    }
}
