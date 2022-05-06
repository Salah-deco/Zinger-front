<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class RegisteredUserController extends Controller {
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request) {
        $first_name = $request->input('fname');
        $last_name = $request->input('lname');
        $email = $request->input('email');
        $password = $request->input('password');
        $password_confirm = $request->input('password_confirmation');

        $isEmail = Http::get('http://localhost:8080/user/verifyEmail/'.$email);
        if ($isEmail == 'ZNG-201') {
            if ($password == $password_confirm) {
                $isCreated = Http::post('http://localhost:8080/user/add', [
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'email' => $email,
                    'password' => $password
                ]);
                if ($isCreated == 'ZNG-11') {
                    $user = Http::get('http://localhost:8080/user/getEmail/'.$email);
                    session(['id' => $user->json()['id'],
                            'first_name' => $user->json()['first_name'],
                            'last_name' => $user->json()['last_name'],
                            'password' => $user->json()['password'],
                            'bio' => $user->json()['bio'],
                            'createdAt' => $user->json()['createdAt'],
                            'isBlocked' => $user->json()['isBlocked'],
                            'isAdmin' => $user->json()['isAdmin'],
                            'idPosts' => $user->json()['idPosts'],
                            'idComments' => $user->json()['idComments']]);
                    return redirect()->intended(RouteServiceProvider::HOME);
                } else {
                    return view('auth.register');
                }
            } else {
                return view('auth.register');
            }
        } else {
            return view('auth.register');
        }
        /* $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        Auth::login($user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]));

        event(new Registered($user));

        return redirect()->intended(RouteServiceProvider::HOME); */
    }
}
