<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
Use Alert;

class CategoryController extends Controller
{
    public function index(){
        $token = session()->get('token');
        $response = Http::withToken($token)->get('https://apiperpustakaan.herokuapp.com/api/v1/categories');
        // return $response->json();
        return view('Categories.index',['response' => $response['data']]);
        // return view('Categories.index',[
        //     'response'=>json_decode($response['data'])
        // ]);
    }

    public function getById($id){
        $token = session()->get('token');
        $response = Http::withToken($token)->get('https://apiperpustakaan.herokuapp.com/api/v1/categories/'.$id);
        return $response->json();
    }

    public function createCategory(Request $request){
        $token = session()->get('token');

        $name = $request->name;

        $response = Http::withToken($token)->post('https://apiperpustakaan.herokuapp.com/api/v1/categories/',[
            'name' => $name
        ]);
        // Alert::success('Success Title', 'Success Message');
        return redirect()->back()->with('success','Data Successfully Created');
        //return $response->json();
    }

    public function updateCategory($id){
        $token = session()->get('token');
        $category = Http::withToken($token)->get('https://apiperpustakaan.herokuapp.com/api/v1/categories/'.$id);
        return view('Categories.update',['category' => $category['data']]);
    }

    public function update(Request $request,$id){
        
        $token = session()->get('token');
        $name = $request->name;

        $response = Http::withToken($token)->put('https://apiperpustakaan.herokuapp.com/api/v1/categories/'.$id,[
            'name' => $name
        ]);
        //return $response->json();
        return redirect('/category')->with('success','Data successfully updated');
    }

    public function delete($id){
        $token = session()->get('token');
        $response = Http::withToken($token)->delete('https://apiperpustakaan.herokuapp.com/api/v1/categories/'.$id);
        return redirect()->back()->with('error','Data deleted successfully');;
        // return $response->json();
    }
}
