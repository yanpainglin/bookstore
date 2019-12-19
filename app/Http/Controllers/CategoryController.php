<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function category()
    {
        $cat= Category::All();
        return view('admin.category')->with('cats',$cat);
    }

    public function storecat()
    {
        $data =request()->all();
        $cat = new Category();

        $cat->name= $data['name'];
        $cat->save();
        return back();
    }

    public function delete(Category $id)
    {
        $data = request()->all();

        $id->delete();
        return back();
    }

}
