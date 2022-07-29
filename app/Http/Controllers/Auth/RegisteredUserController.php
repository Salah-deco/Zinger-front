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
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
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
    public function store(Request $request)
    {
        // from Youssef and Saloua
        $first_name = $request->input('fname');
        $last_name = $request->input('lname');
        $email = $request->input('email');
        $password = $request->input('password');
        $password_confirm = $request->input('password_confirmation');

        $emailIsExisted = Http::get("http://localhost:8080/user/verifyEmail/" . $email);
        error_log("Check email");
        if ($emailIsExisted->body() == "ZNG-201") {
            if ($password == $password_confirm) {
                $created = Http::post("http://localhost:8080/user", [
                    "first_name" => $first_name,
                    "last_name" => $last_name,
                    "email" => $email,
                    "password" => $password
                ]);
                // MODIFIER RESPONSE FOR CREATE USER
                if ($created->body() == "User created") {
                    error_log("user created succss");

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

//        $request->validate([
//            'name' => ['required', 'string', 'max:255'],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//            'password' => ['required', 'confirmed', Rules\Password::defaults()],
//        ]);
//
//        $user = User::create([
//            'name' => $request->name,
//            'email' => $request->email,
//            'password' => Hash::make($request->password),
//        ]);
//
//        event(new Registered($user));
//
//        Auth::login($user);
//
//        return redirect(RouteServiceProvider::HOME);
    }
}
