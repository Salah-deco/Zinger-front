<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
//        Http::get('http://localhost:8080/');
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
//        $request->authenticate();
//
//        $request->session()->regenerate();

        // store request data
        $email = $request->input('email');
        $password = $request->input('password');


        $data = ["email" => $email, "password" => $password];
        error_log(json_encode($data));

        $response = Http::post("http://localhost:8080/auth",$data);
        $body = $response->json();
        $s_id = $response->header("Authorization");
        error_log("===========================");
        error_log(json_encode($data));
        error_log("===========================");
        error_log(json_encode($s_id));

        error_log(json_encode($body));

        if ($body != null) {

            session([
                "S_ID" => $s_id,
                "userId" => $body["id"],
                "first_name" => $body["first_name"],
                "last_name" => $body["last_name"],
                "email" => $body["email"],
                "admin" => $body["admin"],
                "image" => $body["image"]
                ]);
            return redirect("/");
        }


        return redirect()->intended(RouteServiceProvider::HOME);
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

        session(null);

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
