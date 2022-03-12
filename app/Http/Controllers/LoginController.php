<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\PseudoTypes\True_;

class LoginController extends Controller
{
    public function login(){
        return view('login');
    }

    public function loginApi(Request $request){
        $http = new \GuzzleHttp\Client;

        $email    = $request->email;
        $password = $request->password;
        try {
            $req = $http->request('POST', "".env('API_URL')."login/web", [
                'headers' => [
                    'Authorization' => 'Bearer' . session()->get('token.access_token')
                ],
                'form_params' => [
                    'email' => $email,
                    'password' => $password,
                ]
            ]);

            $res = json_decode(
                (string)$req->getBody(),
                true
            );

            $token = $res['token']['token'];
            $request->session()->put('token', $token);

            return redirect()->route('admin.index');
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            return redirect()->route('login.index');
        }
        
    }


    // public function verification(){
    //     $response = Http::post('https://apiperpustakaan.herokuapp.com/api/v1/login', [
    //         'email' => 'admin@admin.com',
    //         'code' => '200',
    //     ]);
    // }
}
