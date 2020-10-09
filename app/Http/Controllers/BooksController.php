<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Category;
use Session;
 
 

class BooksController extends Controller
{
    public function __construct()

    {
        $this->middleware("auth")->except('bookstore', 'showbookbycat', 'detail');    
    }
    public function bookstore()
    {   
    
        $books = Book::All();       
        $category = Category::All();
     
        return view('bookstore', [
             
            'book'=>$books,
            'cat'=>$category,
        ]);
    }
    

    public function viewbook()
    {   
        $books = Book::All();
        return view('admin.view')->with('book', $books);
    }

    public function addbook()
    {
        $book=Category::All();
        return view('admin.add', [
            'book'=>$book
        ]);
    }

    public function storebook()
    {
        $validator = validator(request()->all(), [
            "category_id" => "required",
            "name" => "required",
            "cover"=> "required|max:3000",
        ]);

        if ($validator->fails()){
            return back()->withErrors($validator);
        }

       
        $data= request()->all();
        $file=request()->file('cover');
        $filename= $file->getClientOriginalName();
        $file -> move('upload',$filename);

        $book= new Book();
        $book->name = $data['name'];
        $book->author = $data['author'];
        $book->description = $data['description'];
        $book->price = $data['price'];
        $book->category_id=$data['category_id'];
        $book->cover = $filename;
         
        
        $book->save();
        return redirect('/viewbooks')->with('info', 'A Book was added!!');
    }

    public function editbook(Book $id)
    {
        $category = Category::all();
        return view('admin.edit', [
            'book'=>$id,
            'category'=>$category,
        ]);
    }
    public function updatebook(Book $id)
    {
        $validator = validator(request()->all(), [
            "category_id" => "required",
            "name" => "required",
            "cover"=> "nullable|max:4000",
        ]);

        if ($validator->fails()){
            return back()->withErrors($validator);
        }

        $data=request()->all();
        

        $id->name = $data['name'];
        $id->author = $data['author'];
        $id->description = $data['description'];
        $id->price = $data['price'];
        $id->category_id=$data['category_id'];
        
        if(request()->hasFile('cover')){
            $file=request()->file('cover');
            $filename= $file->getClientOriginalName();
            $file->move('upload', $filename);
            $id->cover = $filename;
        } 
        
        $id->save();
        return redirect('/viewbooks')->with('info', 'A Book was added!!');
    }

    public function deletebook(Book $id)
    {
       $id->delete();
       return back();
    }

    public function bookdetail(Book $id)
    {
        return view('admin.detail')->with('book', $id);
    }
    public function showbookbycat($id)
    {
        $book = Book::where('category_id', $id)->get();
        $books= Book::All();
        $cat = Category::All();
         
        return view('bookstore', [
            'books'=>$books,
            'book'=>$book,
            'cat'=>$cat,
        ]);
    }
    
    public function detail(Book $id)
    {
        return view('detail')->with('book', $id);
    }
}

