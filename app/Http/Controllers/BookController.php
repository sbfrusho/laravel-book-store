<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;  
use App\Models\Book;
class BookController extends Controller
{
    public function welcome(){
        return view('welcome');
    }

    public function index(Request $request){
        // dd($request->all());
        if($request->has('search')){
            $books = Book::where('title','like','%'.$request->search.'%')
            ->orWhere('author','like','%'.$request->search.'%')
            ->paginate(10);
        }
        else{
            //fetch books data from books table
            $books = Book::paginate(10);
        }
        
        // dd($books);
        return view('books.index')
        ->with('name', 'Rusho')
        ->with('books',$books);
    }

    public function show($id){
        $book = Book::find($id);
        
        return view('books.show')
        ->with('book',$book);
    }

    public function create( ){
        return view('books.create');
    }
    public function store(Request $request){

        $rules = [
            'title'=> 'required|max:255',
            'author'=> 'required|max:255',
            'price'=> 'required|numeric',
            'isbn'=> 'required|digits:13|numeric',
            'stock'=>'required|numeric|min:0'
        ];

        $this->validate($request, $rules);
        $book = new Book;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->price = $request->price;
        $book->isbn = $request->isbn;
        $book->stock = $request->stock;
        $book->save();

        return redirect()->route('books.show',$book->id)->with('success','');

        // echo '<pre>';
        //     print_r($request->all());
        // echo '<pre>';

    }

    public function edit($id){
        $book = Book::find($id);
        return view('books.edit')->with('book' ,$book);
    }

    public function update(Request $request){

        $rules = [
            'title'=> 'required|max:255',
            'author'=> 'required|max:255',
            'price'=> 'required|numeric',
            'isbn'=> 'required|digits:13|numeric',
            'stock'=>'required|numeric|min:0'
        ];


        $this->validate($request, $rules);
        
        $book = Book::find($request->id);
        
        $book->title = $request->title;
        $book->author = $request->author;
        $book->price = $request->price;
        $book->isbn = $request->isbn;
        $book->stock = $request->stock;
        
        $book->save();
        return redirect()->route('books.show',$book->id)->with('success','');
        

        // echo '<pre>';
        // print_r($book);
        // echo '</pre>';
    }

    public function delete(Request $request){
        $book = Book::find($request->id);
        $book->delete();
        return redirect()->route('books.index');
    }
}
