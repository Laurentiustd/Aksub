<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function create(){
        return view('createCategory');
    }

    public function store(Request $request){
        Category::create([
            'Name' => $request -> Name
        ]);

        return redirect('/');
    }
}
