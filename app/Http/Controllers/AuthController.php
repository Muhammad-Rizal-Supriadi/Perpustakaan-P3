<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function store(Request $request)
    {
        $email    = $request->email;
        $password = $request->password;
        
        $req = Http::post("".env('API_URL')."https://apiperpustakaan.herokuapp.com/api/v1/", [
            'email' => $email,
            'password' => $password,
        ]);
        
        if ($req->clientError()) {
            return redirect()->route('login.index');
        } 

        if (array_key_exists('employee', $req['data'])){
            $request->session()->put('employee', $req['data']['employee']);
        } else {
            $request->session()->put('member', $req['data']['member']);
        }
        
        $request->session()->put('token', $req['data']['token']);
        return redirect()->route('admin.index');
    }

    public function logout(Request $request) {
        $request->session()->flush();
        return redirect()->route('login.index');
    }
}
