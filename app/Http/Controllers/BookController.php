<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class BookController extends Controller{


  function generateRandomString($length = 10) {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }
  function generateRandomNumberString($length = 10) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }

    public function index(){

        $Books  = $this->generateRandomString(4);
        $number = $this->generateRandomNumberString(4);
        $looks =''.$Books.''.$number.'';
        return response()->json($looks);

    }

    public function getBook($id){

        $Book  = Book::find($id);

        return response()->json($Book);
    }

    public function createBook(Request $request){

        $Book = Book::create($request->all());

        return response()->json($Book);

    }

    public function deleteBook($id){
        $Book  = Book::find($id);
        $Book->delete();

        return response()->json('success');
    }

    public function updateBook(Request $request,$id){
        $Book  = Book::find($id);
        $Book->title = $request->input('title');
        $Book->author = $request->input('author');
        $Book->isbn = $request->input('isbn');
        $Book->save();

        return response()->json($Book);
    }

}
