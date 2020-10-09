<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;

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
        Session::flash('success', 'You successfully created a category');
        return back();
    }

    public function delete(Category $id)
    {
        $data = request()->all();

        $id->delete();
        Session::flash('success', 'You successfully deleted a category');
        return back();
    }

}
