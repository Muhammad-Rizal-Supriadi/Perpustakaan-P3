<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $token = session()->get('token');
        $req_borrows = Http::withToken($token)->get("" . "https://apiperpustakaan.herokuapp.com/api/v1/borrows");
        $req_employees = Http::withToken($token)->get("" . "https://apiperpustakaan.herokuapp.com/api/v1/employees");
        $req_books = Http::withToken($token)->get("" . "https://apiperpustakaan.herokuapp.com/api/v1/books");
        $req_members = Http::withToken($token)->get("" . "https://apiperpustakaan.herokuapp.com/api/v1/members");

        $borrows = ($req_borrows->successful()) ? $req_borrows['data'] : [];
        $count_employees = ($req_employees->successful()) ? count($req_employees['data']) : 0;
        $count_books = ($req_books->successful()) ? count($req_books['data']) : 0;
        $count_members = ($req_members->successful()) ? count($req_members['data']) : 0;

        return view('admin.index', [
            'borrows' => $borrows,
            'count_employees' => $count_employees,
            'count_books' => $count_books,
            'count_members' => $count_members
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
