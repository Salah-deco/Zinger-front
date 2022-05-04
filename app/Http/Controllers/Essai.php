<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use DateTime;



class Essai extends Controller{
	public function index(){
		$users=Http::get("http://localhost:8080/Comments")
		->json();
		dump($users);
		return view("Comment", [ "users" => $users ,]);


}
		


	

}