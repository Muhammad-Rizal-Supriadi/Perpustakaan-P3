<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(){
        $token = session()->get('token');
        $response = Http::withToken($token)->get('https://apiperpustakaan.herokuapp.com/api/v1/members');
        //return $response->json();
        return view('Members.index',['response' => $response['data']]);
        // return view('Categories.index',[
        //     'response'=>json_decode($response['data'])
        // ]);
    }

    public function getById($id){
        $token = session()->get('token');
        $members = Http::withToken($token)->get('https://apiperpustakaan.herokuapp.com/api/v1/members/'.$id);
        return view('Members.detail',['members' => $members['data']]);
        //return $members->json();
    }

    public function createmembers(Request $request){
        $token = session()->get('token');

       // return $request->file('image')->store('images');
        // $request->validate([
        //     'image' => 'required|mimes:jpg,png,jpeg|max:5048'    
        // ]);

        // $newImageName = time() . '-' . $request->name. '.' .
        // // $request->image->extension();

        // $request->image->move(public_path('images'), $newImageName);
        // ddd($request);
        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;
        $image = $request->image;
        $email = $request->email;
        // $password = $request->password;
        // $password_confirmation = $request->password_confirmation;

        
        $response = Http::withToken($token)->post('https://apiperpustakaan.herokuapp.com/api/v1/members/',[
            'name' => $name,
            'address' => $address,
            'phone' => $phone,
            'image' => $image,
            'email' => $email,
            // 'password' => $password,
            // 'password_confirmation' => $password_confirmation,
        ]);
        // Alert::success('Success Title', 'Success Message');
        return redirect()->back()->with('warning','Please check the email to confirm your account');
        //return $response->json();
    }

    public function updatemembers($id){
        $token = session()->get('token');
        $members = Http::withToken($token)->get('https://apiperpustakaan.herokuapp.com/api/v1/members/'.$id);
        //return $response->json();
        return view('Members.update',['members' => $members['data']]);
    }

    public function update(Request $request,$id){
        
        $token = session()->get('token');
        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;
        $image = $request->image;
        $email = $request->email;
        $password = $request->password;
        $password_confirmation = $request->password_confirmation;

        $response = Http::withToken($token)->put('https://apiperpustakaan.herokuapp.com/api/v1/members/'.$id,[
            'name' => $name,
            'address' => $address,
            'phone' => $phone,
            'image' => $image,
            'email' => $email,
            'password' => $password,
            'password_confirmation' => $password_confirmation,
        ]);
        //return $response->json();
        return redirect('/members')->with('success','Data successfully updated');
    }

    public function delete($id){
        $token = session()->get('token');
        $response = Http::withToken($token)->delete('https://apiperpustakaan.herokuapp.com/api/v1/members/'.$id);
        //return redirect()->back()->with('error','Data deleted successfully');;
        return $response->json();
    }
}
