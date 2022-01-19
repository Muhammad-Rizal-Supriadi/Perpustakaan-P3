<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PublishersController extends Controller
{
    public function index(){
        $token = session()->get('token');
        $response = Http::withToken($token)->get('https://apiperpustakaan.herokuapp.com/api/v1/publishers');
        
        $response_data = ($response->successful()) ? $response['data'] : [];
        
        return view('Publishers.index',['response'=>$response_data]);
        // return view('Categories.index',[
        //     'response'=>json_decode($response['data'])
        // ]);
    }

    public function getById($id){
        $token = session()->get('token');
        $publishers = Http::withToken($token)->get('https://apiperpustakaan.herokuapp.com/api/v1/publishers/'.$id);
        return view('Publishers.detail',['publishers' => $publishers['data']]);
    }

    public function createPublishers(Request $request){
        $token = session()->get('token');

        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;

        $response = Http::withToken($token)->post('https://apiperpustakaan.herokuapp.com/api/v1/publishers/',[
            'name' => $name,
            'address' => $address,
            'phone' => $phone
        ]);
        // Alert::success('Success Title', 'Success Message');
        return redirect()->back()->with('success','Data Successfully Created');
        //return $response->json();
    }

    public function updatepublishers($id){
        $token = session()->get('token');
        $publishers = Http::withToken($token)->get('https://apiperpustakaan.herokuapp.com/api/v1/publishers/'.$id);
        return view('Publishers.update',['publishers' => $publishers['data']]);
    }

    public function update(Request $request,$id){
        
        $token = session()->get('token');
        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;

        $response = Http::withToken($token)->put('https://apiperpustakaan.herokuapp.com/api/v1/publishers/'.$id,[
            'name' => $name,
            'address' => $address,
            'phone' => $phone
        ]);
        //return $response->json();
        return redirect('/publishers')->with('success','Data successfully updated');
    }

    public function delete($id){
        $token = session()->get('token');
        $response = Http::withToken($token)->delete('https://apiperpustakaan.herokuapp.com/api/v1/publishers/'.$id);
        return redirect()->back()->with('error','Data deleted successfully');;
        // return $response->json();
    }
}
