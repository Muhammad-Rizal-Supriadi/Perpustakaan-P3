<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    public function index(){
        $token = session()->get('token');
        $req = Http::withToken($token)->get("" . env('API_URL') . "members");
        
        $res = ($req->successful()) ? $req['data'] : [];
        return view('members.index', [
            'members' => $res,
            'title' => 'Members'
        ]);
    }

    public function show($id){
        $token = session()->get('token');
        $req = Http::withToken($token)->get("" . env('API_URL') . "members/" . $id . "");

        if ($req->clientError()) {
            return redirect()->route('members.index');
        }

        return view('members.show', [
            'member' => $req['data'],
            'title' => 'Member Detail'
        ]);
    }

    public function store(Request $request){
        $token = session()->get('token');

        $member = [
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
        ];

        if ($request->password) {
            $member['password'] = $request->password;
            $member['password_confirmation'] = $request->password_confirmation;
        }
    
        $req = Http::withToken($token)->post("" . env('API_URL') . "members", $member);

        if ($req->clientError()) {
            return redirect()->back()->with('error', 'Data Failed to Create');
        }

        return redirect()->back()->with('warning','Please check the email to confirm your account');
    }

    public function edit($id){
        $token = session()->get('token');
        $req = Http::withToken($token)->get("" . env('API_URL') . "members/" . $id . "");

        if ($req->clientError()) {
            return redirect()->route('members.index');
        }

        return view('members.edit', [
            'member' => $req['data'],
            'title' => 'Update Member'
        ]);
    }

    public function update(Request $request,$id){
        $token = session()->get('token');

        $member = [
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
        ];

        if ($request->password) {
            $member['password'] = $request->password;
            $member['password_confirmation'] = $request->password_confirmation;
        }
    
        $req = Http::withToken($token)->put("" . env('API_URL') . "members/" . $id . "", $member);

        if ($req->clientError()) {
            return redirect()->route('members.index')->with('error', 'Data Failed to Update');
        }

        return redirect()->route('members.index')->with('success', 'Data Successfully Updated');
    }

    public function delete($id){
        $token = session()->get('token');
        $req = Http::withToken($token)->delete("" . env('API_URL') . "members/" . $id . "");

        if ($req->clientError()) {
            return redirect()->back()->with('error', 'Data Failed to Update');
        }

        return redirect()->back()->with('success', 'Data deleted successfully');;
    }
}
