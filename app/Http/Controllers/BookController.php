<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;

class BookController extends Controller
{
    public function create(){
        // $this->authorize('isAdmin');
        $category = Category::all();
        return view('createBook', compact('category'));
    }

    public function store(Request $request){
        $extension = $request->file('Image')->getClientOriginalExtension();
        $filename = $request->Title.'_'.$request->Author.'.'.$extension;
        $request->file('Image')->storeAs('/public/book', $filename);

        Book::create([
            'Title' => $request -> Title,
            'Author' => $request -> Author,
            'ReleaseDate' => $request ->ReleaseDate,
            'Quantity' => $request -> Quantity,
            'Price' => $request -> Price,
            'Image' => $filename,
            'category_id' => $request -> Category
        ]);

        return redirect('/');
    }

    public function show(){
        $book = Book::all();
        return view('showBook', compact('book'));
    }

    public function editBook($id){
        $book = Book::findOrFail($id);
        $category = Category::all();
        return view('editForm', compact('book', 'category'));
    }

    public function update(Request $request, $id){
        $extension = $request->file('Image')->getClientOriginalExtension();
        $filename = $request->Title.'_'.$request->Author.'.'.$extension;
        $request->file('Image')->storeAs('/public/book', $filename);

        Book::findOrFail($id)->update([
            'Title' => $request -> Title,
            'Author' => $request -> Author,
            'ReleaseDate' => $request ->ReleaseDate,
            'Quantity' => $request -> Quantity,
            'Price' => $request -> Price,
            'Image' => $filename,
            'category_id' => $request -> Category
        ]);

        return redirect('/');
    }

    public function delete($id){
        $book = Book::findOrFail($id);
        $images = '/storage/book/'.$book->Image;
        $path = str_replace('\\', '/', public_path());
        unlink($path.$images);
        Book::destroy($id);
        return redirect('/');
    }
}
