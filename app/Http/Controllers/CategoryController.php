<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function Category(){

        return view('Admin.category.category');
    }
    // Category store

    public function Category_store(Request $request){

        $data = new Category();
        $image = $request->image;


           if($image){
             $imagename = time().'.'.$image->getClientOriginalExtension();
             $request->image->move('uploads/category/',$imagename);

             $data->image=$imagename;

        Category::insert([

            'category_name'=>$request->category_name,
            'category_slug'=>$request->category_slug,
            'image'=>$imagename,
        ]);
    }
    return back()->with('category','category Added Successfuly');
}
}
