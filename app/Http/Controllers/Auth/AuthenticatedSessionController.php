<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Symfony\Component\Console\Input\Input;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        /* $response = Http::get('https://jsonplaceholder.typicode.com/posts');
        return $response->json(); */
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request) {
        $email = $request->input('email');
        $password = $request->input('password');
        $res = Http::get('http://localhost:8080/user/verify/'.$email.'/'.$password);
        if($res != 'ZNG-201') {
            session(['id' => $res->json()['id'],
                    'first_name' => $res->json()['first_name'],
                    'last_name' => $res->json()['last_name'],
                    'password' => $res->json()['password'],
                    'bio' => $res->json()['bio'],
                    'createdAt' => $res->json()['createdAt'],
                    'isBlocked' => $res->json()['isBlocked'],
                    'isAdmin' => $res->json()['isAdmin'],
                    'idPosts' => $res->json()['idPosts'],
                    'idComments' => $res->json()['idComments']]);
            if ($res->json()['isAdmin'] == 'true') {
                return redirect()->route('admin');
            } else {
                return redirect()->route('user');
            }
            //return redirect()->intended(RouteServiceProvider::HOME);
        } else {
            return view('auth.login');
        }
        /* $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME); */
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
