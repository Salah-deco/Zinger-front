<?php

namespace App\Http\Controllers;

use App\Mail\testMail;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail()
    {
        $details = [
            'title' => 'Mail from PFE App',
            'body' => 'This is for testing mail using gmail'
        ];
        Mail::to('bcdoussama@gmail.com')->send(new testMail($details));
        return 'msg env';
    }
}
