<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function index(Request $request){
        
        // $respon = Http::get('https://apiperpustakaan.herokuapp.com/api/v1/categories',[
        //     'headers'=>[
        //         'Authorization'=>'Bearer'.session()->get('token')
        //     ]    
        // ]);
        $token = session()->get('token');
    
        

        $response = Http::withToken('token')->get('https://apiperpustakaan.herokuapp.com/api/v1/categories');
        return $response->json();

        // return view('categories.index',[
        //     'response'=>json_decode($response)
        // ]);
    }

    public function store(){
        $respon = Http::post('https://apiperpustakaan.herokuapp.com/api/v1/categories');
        dd($respon);
    }

    public function getby_id($id){
        $respon = Http::get("https://apiperpustakaan.herokuapp.com/api/v1/categories/$id");
        dd($respon);
    }

    public function update($id){
        $respon = Http::put("https://apiperpustakaan.herokuapp.com/api/v1/categories/$id");
        dd($respon);
    }

    public function delete($id){
        $respon = Http::delete("https://apiperpustakaan.herokuapp.com/api/v1/categories/$id");
        dd($respon);
    }
}
