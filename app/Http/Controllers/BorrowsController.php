<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class BorrowsController extends Controller
{
    public function index(){
        $token = session()->get('token');
        $response = Http::withToken($token)->get('https://apiperpustakaan.herokuapp.com/api/v1/borrows');
        $response_members = Http::withToken($token)->get('https://apiperpustakaan.herokuapp.com/api/v1/members');
        $response_books = Http::withToken($token)->get('https://apiperpustakaan.herokuapp.com/api/v1/books');
        $date = date('yyyy-mm-dd');

        //echo count($response['data']);

        // if(array_key_exists('data', $response)) {
        //      echo "Ada";
        // } else {
        //     echo "tidak ada";
        // }

         if(Isset($response['data'])){
            //echo "Ada";
            return view('Borrows.index',['response' => $response['data'],'response_members' => $response_members['data'],'response_books' => $response_books['data'],'date' => $date], 200);
         }else{
            return view('Borrows.index',['response' => $response,'response_members' => $response_members['data'],'response_books' => $response_books['data'],'date' => $date]);
         }




         
        //return view('Borrows.index',['response' => $response['data'],'response_members' => $response_members['data'],'response_books' => $response_books['data'],'date' => $date], 200);
        //return view('Borrows.index')->with('error','Data not Found', 400);
        // return view('Categories.index',[
        //     'response'=>json_decode($response['data'])
        // ]);
    }

    public function getById($id){
        $token = session()->get('token');
        $borrows = Http::withToken($token)->get('https://apiperpustakaan.herokuapp.com/api/v1/borrows/'.$id);
        return view('borrows.detail',['borrows' => $borrows['data']]);
        //return $borrows->json();
    }

    public function createborrows(Request $request){
        $token = session()->get('token');

        $employees_id = $request->employees_id;
        $member_id = $request->member_id;
        $book_id = $request->book_id;
        $borrow_date = $request->borrow_date;
        $return_date = $request->return_date;
        
        $response = Http::withToken($token)->post('https://apiperpustakaan.herokuapp.com/api/v1/borrows/',[
            'employees_id' => $employees_id,
            'member_id' => $member_id,
            'book_id' => $book_id,
            'borrow_date' => $borrow_date,
            'return_date' => $return_date,
        ]);
        // Alert::success('Success Title', 'Success Message');
        return redirect()->back()->with('success','Data successfully created');
        //return $response->json();
    }

    public function updateborrows($id){
        $token = session()->get('token');
        $borrows = Http::withToken($token)->get('https://apiperpustakaan.herokuapp.com/api/v1/borrows/'.$id);
        $response_members = Http::withToken($token)->get('https://apiperpustakaan.herokuapp.com/api/v1/members');
        $response_books = Http::withToken($token)->get('https://apiperpustakaan.herokuapp.com/api/v1/books');
        $date = date('yyyy-mm-dd');
        //return $response->json();
        return view('Borrows.update',['date'=>$date,'borrows' => $borrows['data'],'response_members' => $response_members['data'],'response_books' => $response_books['data']]);
    }

    public function update(Request $request,$id){
        
        $token = session()->get('token');
        $employees_id = $request->employees_id;
        $member_id = $request->member_id;
        $book_id = $request->book_id;
        $borrow_date = $request->borrow_date;
        $return_date = $request->return_date;

        $response = Http::withToken($token)->put('https://apiperpustakaan.herokuapp.com/api/v1/borrows/'.$id,[
            'employees_id' => $employees_id,
            'member_id' => $member_id,
            'book_id' => $book_id,
            'borrow_date' => $borrow_date,
            'return_date' => $return_date,
        ]);
        //return $response->json();
        return redirect('/borrows')->with('success','Data successfully updated');
    }

    public function delete($id){
        $token = session()->get('token');
        $response = Http::withToken($token)->delete('https://apiperpustakaan.herokuapp.com/api/v1/borrows/'.$id);
        return redirect()->back()->with('error','Data deleted successfully');;
        // return $response->json();
    }
}
