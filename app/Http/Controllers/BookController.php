<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //
    Public function index(){

     $allBook = Book::all();


        return view('index',['books'=>$allBook]);
    }
    public function show(Book $id){
          //type 1
          //   $book = Book::findOrFail($id);
          //type 2
          //   if(is_null($book)){
          //       return to_route('book.index');
          //   }


        return view('show',['book'=>$id]);
    }
    public function create(){

        return view('create');
    }
       public function store(Request $request ){

        //type 1
//         $newBook = new Book();
//    $newBook->title = request()->title;
//   $newBook->author = request()->author;
//   $newBook->save();
   $request->validate([
        'title' => ['required','max:255'],
        'author' => ['required',  'min:3','alpha'],
    ]);
//type 2
Book::create([
    'title'=>request()->title,
    'author'=>request()->author,
]);
     return redirect()->route('book.index')->with('message_type', 'add')
                ->with('message', 'تم إضافة كتاب');

    }
           public function edit($id ){
            $book = Book::findOrFail($id);
  return view ('edit',['book'=>$book]);
        //type 1

    }

    public function update($id){

  $title = request()->title;
    $author = request()->author;
    $newBook = Book::FindOrFail($id);
    $newBook->title = $title;
    $newBook->author = $author;
    $newBook->save();

  return redirect()->route('book.show',$id); ;


    }
        public function destroy($id){
//   $book = Book::findOrFail($id);
//   $book->delete();
  Book::where('id',$id)->delete();
  return redirect()->route('book.index')->with('message_type', 'delete')
                ->with('message', 'delete Book');


    }
       public function Search(Request $request){

            $data = request()->search;
           $books = Book::where('title', 'LIKE', '%' . $data . '%')->get();

            return view('index',compact('books'));
       }
}