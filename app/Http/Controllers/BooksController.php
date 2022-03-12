<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BooksController extends Controller
{
    public function index()
    {
        $token = session()->get('token');
        $req_books = Http::withToken($token)->get("" . env('API_URL') . "books");
        $req_publishers = Http::withToken($token)->get("" . env('API_URL') . "publishers");
        $req_categories = Http::withToken($token)->get("" . env('API_URL') . "categories");

        $res_books = ($req_books->successful()) ? $req_books['data'] : [];
        $res_publishers = ($req_publishers->successful()) ? $req_publishers['data'] : [];
        $res_categories = ($req_categories->successful()) ? $req_categories['data'] : [];

        return view('books.index', [
            'books' => $res_books,
            'publishers' => $res_publishers,
            'categories' => $res_categories
        ]);
    }

    public function show($id)
    {
        $token = session()->get('token');
        $req = Http::withToken($token)->get("" . env('API_URL') . "books/" . $id . "");

        if ($req->clientError()) {
            return redirect()->route('books.index');
        }

        return view('books.show', ['book' => $req['data']]);
    }

    public function store(Request $request)
    {
        $token = session()->get('token');

        $title = $request->title;
        $description = $request->description;
        $year = $request->year;
        $author = $request->author;
        $qty = $request->qty;
        $page = $request->page;
        $category_id = $request->category_id;
        $publisher_id = $request->publisher_id;

        $req = Http::withToken($token)->post("" . env('API_URL') . "books", [
            'title' => $title,
            'description' => $description,
            'year' => $year,
            'author' => $author,
            'qty' => $qty,
            'page' => $page,
            'category_id' => $category_id,
            'publisher_id' => $publisher_id
        ]);

        if ($req->clientError()) {
            return redirect()->back()->with('error', 'Data Failed to Create');
        }

        return redirect()->back()->with('success', 'Data Successfully Created');
    }

    public function edit($id)
    {
        $token = session()->get('token');

        $req_book = Http::withToken($token)->get("" . env('API_URL') . "books/" . $id . "");
        $req_publishers = Http::withToken($token)->get("" . env('API_URL') . "publishers");
        $req_categories = Http::withToken($token)->get("" . env('API_URL') . "categories");

        $res_book = ($req_book->successful()) ? $req_book['data'] : [];
        $res_publishers = ($req_publishers->successful()) ? $req_publishers['data'] : [];
        $res_categories = ($req_categories->successful()) ? $req_categories['data'] : [];

        return view('books.edit', [
            'book' => $res_book,
            'publishers' => $res_publishers,
            'categories' => $res_categories
        ]);
    }

    public function update(Request $request, $id)
    {
        $token = session()->get('token');

        $title = $request->title;
        $description = $request->description;
        $year = $request->year;
        $author = $request->author;
        $qty = $request->qty;
        $page = $request->page;
        $category_id = $request->category_id;
        $publisher_id = $request->publisher_id;

        $req = Http::withToken($token)->put("" . env('API_URL') . "books/" . $id . "", [
            'title' => $title,
            'description' => $description,
            'year' => $year,
            'author' => $author,
            'qty' => $qty,
            'page' => $page,
            'category_id' => $category_id,
            'publisher_id' => $publisher_id
        ]);

        if ($req->clientError()) {
            return redirect()->route('books.index')->with('error', 'Data Failed to Update');
        }

        return redirect()->route('books.index')->with('success', 'Data Successfully Updated');
    }

    public function destroy($id)
    {
        $token = session()->get('token');

        $req = Http::withToken($token)->delete("" . env('API_URL') . "books/" . $id . "");

        if ($req->clientError()) {
            return redirect()->back()->with('error', 'Data Failed to Update');
        }

        return redirect()->back()->with('success', 'Data deleted successfully');;
    }
}
