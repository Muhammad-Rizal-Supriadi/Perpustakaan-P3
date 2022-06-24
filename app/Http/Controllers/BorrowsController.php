<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BorrowsController extends Controller
{
    public function index()
    {
        $token = session()->get('token');
        $req_borrows = Http::withToken($token)->get("" . env('API_URL') . "borrows");
        $req_members = Http::withToken($token)->get("" . env('API_URL') . "members");
        $req_books = Http::withToken($token)->get("" . env('API_URL') . "books");

        $res_borrows = ($req_borrows->successful()) ? $req_borrows['data'] : [];
        $res_members = ($req_members->successful()) ? $req_members['data'] : [];
        $res_books = ($req_books->successful()) ? $req_books['data'] : [];


        return view('borrows.index', [
            'borrows' => $res_borrows,
            'members' => $res_members,
            'books' => $res_books,
        ]);
    }

    public function show($id)
    {
        $token = session()->get('token');
        $req = Http::withToken($token)->get("" . env('API_URL') . "borrows/" . $id . "");

        if ($req->clientError()) {
            return redirect()->route('borrows.index');
        }

        return view('borrows.show', ['borrow' => $req['data']]);
    }

    public function store(Request $request)
    {
        $token = session()->get('token');
        
        $member_id = $request->member_id;
        $book_id = $request->book_id;
        $borrow_date = $request->borrow_date;
        $return_date = $request->return_date;

        $req = Http::withToken($token)->post("" . env('API_URL') . "borrows", [
            'member_id' => $member_id,
            'book_id' => $book_id,
            'borrow_date' => $borrow_date,
            'return_date' => $return_date,
        ]);

        if ($req->clientError()) {
            return redirect()->back()->with('error', 'Data Failed to Create');
        }

        return redirect()->back()->with('success', 'Data Successfully Created');
    }

    public function edit($id)
    {
        $token = session()->get('token');

        $req_borrow = Http::withToken($token)->get("" . env('API_URL') . "borrows/" . $id . "");
        $req_members = Http::withToken($token)->get("" . env('API_URL') . "members");
        $req_books = Http::withToken($token)->get("" . env('API_URL') . "books");

        $res_borrow = ($req_borrow->successful()) ? $req_borrow['data'] : [];
        $res_members = ($req_members->successful()) ? $req_members['data'] : [];
        $res_books = ($req_books->successful()) ? $req_books['data'] : [];


        return view('borrows.edit', [
            'borrow' => $res_borrow,
            'members' => $res_members,
            'books' => $res_books
        ]);
    }

    public function update(Request $request, $id)
    {
        $token = session()->get('token');
    
        $member_id = $request->member_id;
        $book_id = $request->book_id;
        $borrow_date = $request->borrow_date;
        $return_date = $request->return_date;
        $status = $request->status;

        $req = Http::withToken($token)->put("" . env('API_URL') . "borrows/" . $id . "", [
            'member_id' => $member_id,
            'book_id' => $book_id,
            'borrow_date' => $borrow_date,
            'return_date' => $return_date,
            'status' => $status,
        ]);

        if ($req->clientError()) {
            return redirect()->route('borrows.index')->with('error', 'Data Failed to Update');
        }

        return redirect()->route('borrows.index')->with('success', 'Data Successfully Updated');
    }

    public function destroy($id)
    {
        $token = session()->get('token');

        $req = Http::withToken($token)->delete("" . env('API_URL') . "borrows/" . $id . "");

        if ($req->clientError()) {
            return redirect()->back()->with('error', 'Data Failed to Update');
        }

        return redirect()->back()->with('success', 'Data deleted successfully');;
    }
}
