<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;

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
            'created_at'=>Carbon::naw(),
        ]);
    }
    return back()->with('category','category Added Successfuly');
}
        // Category_view

        public function Category_view(){
            $category_show = Category::all();
            return view('Admin.category.Category_view',[
                'category_show'=>$category_show,
            ]);
        }  // Category Datele

        public function Category_delete($cat_id){

            Category::find($cat_id)->Delete();

            return back();
        }
}
