<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PublishersController extends Controller
{
    public function index(){
        $token = session()->get('token');
        $req = Http::withToken($token)->get("" . env('API_URL') . "publishers");
        
        $res = ($req->successful()) ? $req['data'] : [];
        return view('publishers.index',[
            'publishers'=>$res,
            'title' => 'Publishers'
        ]);
    }

    public function show($id){
        $token = session()->get('token');
        $req = Http::withToken($token)->get("" . env('API_URL') . "publishers/" . $id . "");
        
        if ($req->clientError()) {
            return redirect()->route('publishers.index');
        }

        return view('publishers.show', [
            'publisher' => $req['data'],
            'title' => 'Publisher Detail'
        ]);
    }

    public function store(Request $request){
        $token = session()->get('token');

        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;

        $req = Http::withToken($token)->post("" . env('API_URL') . "publishers", [
            'name' => $name,
            'address' => $address,
            'phone' => $phone
        ]);

        if ($req->clientError()) {
            return redirect()->back()->with('error', 'Data Failed to Create');
        }

        return redirect()->back()->with('success', 'Data Successfully Created');
    }

    public function edit($id){
        $token = session()->get('token');
        $req = Http::withToken($token)->get("" . env('API_URL') . "publishers/" . $id . "");
        
        if ($req->clientError()) {
            return redirect()->route('publishers.index');
        }

        return view('publishers.edit', [
            'publisher' => $req['data'],
            'title' => 'Update Publisher'
        ]);
    }

    public function update(Request $request,$id){
        $token = session()->get('token');
        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;

        $req = Http::withToken($token)->put("" . env('API_URL') . "publishers/" . $id . "", [
            'name' => $name,
            'address' => $address,
            'phone' => $phone
        ]);

        if ($req->clientError()) {
            return redirect()->route('publishers.index')->with('error', 'Data Failed to Update');
        }

        return redirect()->route('publishers.index')->with('success', 'Data Successfully Updated');
    }

    public function destroy($id){
        $token = session()->get('token');
        $req = Http::withToken($token)->delete("" . env('API_URL') . "publishers/" . $id . "");
        
        if ($req->clientError()) {
            return redirect()->back()->with('error', 'Data Failed to Update');
        }

        return redirect()->back()->with('success', 'Data deleted successfully');;
    }
}
