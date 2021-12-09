<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(){
        return view('login');
    }

    public function loginApi(Request $request){
        $http = new \GuzzleHttp\Client;

        $email    = $request->email;
        $password = $request->password; 

        $response = $http->post('https://apiperpustakaan.herokuapp.com/api/v1/login/web', [
            'headers'=>[
                'Authorization'=>'Bearer'.session()->get('token.access_token')
            ],
            'query'=>[
                'email'=>$email,
                'password'=>$password,
            ]
            
        ]);
        
        $result = json_decode((string)$response->getBody(),true);
        $token = $result['token']['token'];

        $request->session()->put('token',$token);
        Session::put('authentication',$token);

        // dd($result);
        // dd(
        //     Session::get('authentication')
        // );
        // return dd($result);

        return redirect('admin');
    }


    // public function verification(){
    //     $response = Http::post('https://apiperpustakaan.herokuapp.com/api/v1/login', [
    //         'email' => 'admin@admin.com',
    //         'code' => '200',
    //     ]);
    // }
}
