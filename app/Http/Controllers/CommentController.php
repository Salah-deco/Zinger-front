<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use DateTime;
use Illuminate\Support\Facades\URL;
use Input;

class CommentController extends Controller{


	public function index(){
		$users=Http::get("http://localhost:8080/Comments")
		->json();
		dump($users);



		


	return view("welcome", [ "users" => $users ,]);}
	
	public function affiche(){
		return view("Comment");
	}
	public function affi(){
		return view("signle");
	}
public function Report(){
	
		return view("signle2");
	}


	public function store(){


		$body=request("body");
		$userid=request("userid");
		$postid=request("postid");
		$date=request("date");
		$dt = new DateTime();


		//if($body!=null && $postid!=null && $userid!=null && $date!=null){

		$response=Http::post("http://localhost:8080/Comments", [
        "body" =>$body,
        "userId"=> $userid,
        "postId"=> $postid,
        "createdAt"=> $dt->format("Y-m-d"),
		])->json();
		
		return $response;
		




	}

	public function ReportComment(Request $request){

      
		//echo($_GET['userid']);
		$op1=request("optradio1");
		$dt = new DateTime();

		//if($body!=null && $postid!=null && $userid!=null && $date!=null){

		$response=Http::post("http://localhost:8080/Report", [
        "body" =>$op1,
        "userId"=>  $request->input('userid'),
        "postId"=> $request->input('id'),
        "createdAt"=> $dt->format("Y-m-d"),




		])->json();
		
		return $response;		
		




	}
	
	 public function show() {
	 	$posts=http::get("localhost:8080/Postby/6258a15f099715739caffe38")->json();
        $commentaire=Http::get("localhost:8080/CommentPost/6258a15f099715739caffe38");
        $commentaires=$commentaire->json();
        
        $user=Http::get('localhost:8080/Users');
        $users=$user->json();
        $result = Array();
        foreach ($commentaires as $a) {
            foreach ($users as $b) {
                if($a['userId'] ==  $b['id']) {
                	$b["createdAt"]=date('d F Y', strtotime($b["createdAt"]));                   
                	$result[] = array_merge($b,$a);

                }
            }
        }

       return view('Comment',['result'=>$result, 'posts'=> $posts, ]);
     }
   public function update(){



   	$response = Http::put('http://localhost:8080/Comment/6258a0df099715739caffe37', [
                'body' =>'nice photo' ,
        ]);
        return $response;
   }

   public function delete(){
   	  $response = Http::delete('http://localhost:8080/comment/delete/6258a0df099715739caffe37', [
        ]);
        return $response;
    }
   




}
