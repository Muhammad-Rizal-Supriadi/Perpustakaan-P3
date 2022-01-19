<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BooksController extends Controller
{
    public function index(){
        $token = session()->get('token');
        $response = Http::withToken($token)->get('https://apiperpustakaan.herokuapp.com/api/v1/books');
        $response_category = Http::withToken($token)->get('https://apiperpustakaan.herokuapp.com/api/v1/categories');
        $response_publishers = Http::withToken($token)->get('https://apiperpustakaan.herokuapp.com/api/v1/publishers');
        
        $response_data = ($response->successful()) ? $response['data'] : [];
        $response_category_data = ($response_category->successful()) ? $response_category['data'] : [];
        $response_publishers_data = ($response_publishers->successful()) ? $response_publishers['data'] : [];

        return view('Books.index',[
            'response_category'=>$response_category_data,
            'response_publishers'=>$response_publishers_data,
            'response' => $response_data]);
        // return view('Categories.index',[
        //     'response'=>json_decode($response['data'])
        // ]);
    }

    public function getById($id){
        $token = session()->get('token');
        $books = Http::withToken($token)->get('https://apiperpustakaan.herokuapp.com/api/v1/books/'.$id);
        //return $books->json();
        return view('Books.detail',['books' => $books['data']]);
    }

    public function createBooks(Request $request){
        $token = session()->get('token');

        $title = $request->title;
        $description = $request->description;
        $year = $request->year;
        $author = $request->author;
        $qty = $request->qty;
        $page = $request->page;
        $category_id = $request->category_id;
        $publisher_id = $request->publisher_id;

        $response = Http::withToken($token)->post('https://apiperpustakaan.herokuapp.com/api/v1/books/',[
            'title' => $title,
            'description' => $description,
            'year' => $year,
            'author' => $author,
            'qty' => $qty,
            'page' => $page,
            'category_id' => $category_id,
            'publisher_id' => $publisher_id
        ]);
        // Alert::success('Success Title', 'Success Message');
        return redirect()->back()->with('success','Data Successfully Created');
        //return $response->json();
    }

    public function updateBooks($id){
        $token = session()->get('token');
        $books = Http::withToken($token)->get('https://apiperpustakaan.herokuapp.com/api/v1/books/'.$id);
        $response_category = Http::withToken($token)->get('https://apiperpustakaan.herokuapp.com/api/v1/categories');
        $response_publishers = Http::withToken($token)->get('https://apiperpustakaan.herokuapp.com/api/v1/publishers');
        return view('Books.update',['response_category'=>$response_category['data'],'response_publishers'=>$response_publishers['data'],'books' => $books['data']]);
    }

    public function update(Request $request,$id){
        
        $token = session()->get('token');
        $title = $request->title;
        $description = $request->description;
        $year = $request->year;
        $author = $request->author;
        $qty = $request->qty;
        $page = $request->page;
        $category_id = $request->category_id;
        $publisher_id = $request->publisher_id;

        $response = Http::withToken($token)->put('https://apiperpustakaan.herokuapp.com/api/v1/books/'.$id,[
            'title' => $title,
            'description' => $description,
            'year' => $year,
            'author' => $author,
            'qty' => $qty,
            'page' => $page,
            'category_id' => $category_id,
            'publisher_id' => $publisher_id
        ]);
        //return $response->json();
        return redirect('/books')->with('success','Data successfully updated');
    }

    public function delete($id){
        $token = session()->get('token');
        $response = Http::withToken($token)->delete('https://apiperpustakaan.herokuapp.com/api/v1/books/'.$id);
        return redirect()->back()->with('error','Data deleted successfully');;
        // return $response->json();
    }
}
