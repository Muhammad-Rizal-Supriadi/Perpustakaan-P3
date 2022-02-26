<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function store(Request $request)
    {
        $email    = $request->email;
        $password = $request->password;
        
        $req = Http::post("".env('API_URL')."login/web", [
            'email' => $email,
            'password' => $password,
        ]);
        
        if ($req->clientError()) {
            return redirect()->route('login.index');
        } 
        
        $res = $req->json();
        $token = $res['token']['token'];
        $request->session()->put('token', $token);
        return redirect()->route('admin.index');
    }
}
