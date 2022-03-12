<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index()
    {
        $token = session()->get('token');
        $req = Http::withToken($token)->get("" . env('API_URL') . "employees");

        $res = ($req->successful()) ? $req['data'] : [];
        return view('employees.index', ['employees' => $res]);
    }

    public function show($id)
    {
        $token = session()->get('token');
        $req = Http::withToken($token)->get("" . env('API_URL') . "employees/" . $id . "");

        if ($req->clientError()) {
            return redirect()->route('employees.index');
        }

        return view('employees.show', ['employee' => $req['data']]);
    }

    public function store(Request $request)
    {
        $token = session()->get('token');

        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;
        $email = $request->email;
        $password = $request->password;
        $password_confirmation = $request->password_confirmation;

        $req = Http::withToken($token)->post("" . env('API_URL') . "employees", [
            'name' => $name,
            'address' => $address,
            'phone' => $phone,
            'email' => $email,
            'password' => $password,
            'password_confirmation' => $password_confirmation,
        ]);

        if ($req->clientError()) {
            return redirect()->back()->with('error', 'Data Failed to Create');
        }

        return redirect()->back()->with('warning', 'Please check the email to confirm your account');
    }

    public function edit($id)
    {
        $token = session()->get('token');
        $req = Http::withToken($token)->get("" . env('API_URL') . "employees/" . $id . "");

        if ($req->clientError()) {
            return redirect()->route('employees.index');
        }

        return view('employees.edit', ['employee' => $req['data']]);
    }

    public function update(Request $request, $id)
    {
        $token = session()->get('token');

        $employee = [
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
        ];

        if ($request->password) {
            $employee['password'] = $request->password;
            $employee['password_confirmation'] = $request->password_confirmation;
        }

        $req = Http::withToken($token)->put("" . env('API_URL') . "employees/" . $id . "", $employee);

        if ($req->clientError()) {
            return redirect()->route('employees.index')->with('error', 'Data Failed to Update');
        }

        return redirect()->route('employees.index')->with('success', 'Data Successfully Updated');
    }

    public function destroy($id)
    {
        $token = session()->get('token');
        $req = Http::withToken($token)->delete("" . env('API_URL') . "employees/" . $id . "");

        if ($req->clientError()) {
            return redirect()->back()->with('error', 'Data Failed to Update');
        }

        return redirect()->back()->with('success', 'Data deleted successfully');;
    }
}
