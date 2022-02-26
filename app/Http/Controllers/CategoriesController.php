<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CategoriesController extends Controller
{
    public function index()
    {
        $token = session()->get('token');
        $req = Http::withToken($token)->get("" . env('API_URL') . "categories");

        $res = ($req->successful()) ? $req['data'] : [];
        return view('categories.index', ['response' => $res]);
    }

    public function store(Request $request)
    {
        $token = session()->get('token');

        $name = $request->name;

        $req = Http::withToken($token)->post("" . env('API_URL') . "categories", [
            'name' => $name
        ]);

        if ($req->clientError()) {
            return redirect()->back()->with('error', 'Data Failed to Create');
        }

        return redirect()->back()->with('success', 'Data Successfully Created');
    }

    public function edit($id)
    {
        $token = session()->get('token');
        $req = Http::withToken($token)->get("" . env('API_URL') . "categories/" . $id . "");

        if ($req->clientError()) {
            return redirect()->route('categories.index');
        }

        $res = $req->json();
        return view('categories.edit', ['category' => $res['data']]);
    }

    public function update(Request $request, $id)
    {
        $token = session()->get('token');
        $name = $request->name;

        $req = Http::withToken($token)->put("" . env('API_URL') . "categories/" . $id . "", [
            'name' => $name
        ]);

        if ($req->clientError()) {
            return redirect()->route('categories.index')->with('error', 'Data Failed to Update');
        }

        return redirect()->route('categories.index')->with('success', 'Data Successfully Updated');
    }

    public function destroy($id)
    {
        $token = session()->get('token');
        $req = Http::withToken($token)->delete("" . env('API_URL') . "categories/" . $id . "");

        if ($req->clientError()) {
            return redirect()->back()->with('error', 'Data Failed to Update');
        }

        return redirect()->back()->with('success', 'Data deleted successfully');;
    }
}
