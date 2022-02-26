<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function store(Request $request)
    {
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
}
