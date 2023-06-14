<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Resources\BookResources;
use App\Models\Book;
use App\Models\User;
use Auth;

class ApiController extends Controller
{
    public function index(){
        $book = Book::all();
        return BookResources::collection($book);
        // return response()->json(['data'=>$book]);
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Email must be filled',
            'password.required' => 'Password must be filled',
        ]);

        $user = User::where('email', $request->email)->first();
 
    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    return $user->createToken($request->email)->plainTextToken;
    }

    public function logout(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Email must be filled',
            'password.required' => 'Password must be filled',
        ]);

        $user = User::where('email', $request->email)->first();

        $user->tokens()->delete();

        return 'logout succesfully';
    }

    public function create(Request $request){
        $book = Book::create([
            'Title' => $request -> title,
            'Author' => $request -> author,
            'ReleaseDate' => $request ->releaseDate,
            'Quantity' => $request -> quantity,
            'Price' => $request -> price,
            'Image' => "image",
            'category_id' => "1"
        ]);
        return response()->json(["messages"=>"success","data"=>$book, "created_by" => Auth::user()]);
    }

    public function update(Request $request, $id){
        $book = Book::findOrFail($id)->update([
            'Title' => $request -> title,
            'Author' => $request -> author,
            'ReleaseDate' => $request ->releaseDate,
            'Quantity' => $request -> quantity,
            'Price' => $request -> price,
            'Image' => "image",
            'category_id' => "1"
        ]);
        return response()->json(["messages"=>"success","data"=>$book, "updated_by" => Auth::user()]);
    }

    public function delete($id){
        $book = Book::find($id);
        Book::destroy($id);
        return response()->json(["messages"=>"success","data"=>$book, "deleted_by" => Auth::user()]);
    }
}
