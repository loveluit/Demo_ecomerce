<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class Font_endController extends Controller
{
    public function Master()
    {
        $categorys = Category::all();
        $products = Product::all();
        return view('Font_end.index', [
            'categorys' => $categorys,
            'products' => $products,
        ]);
    }
    public function Shop()
    {

        return view('Font_end.shop');
    }
    public function Cart()
    {

        return view('Font_end.cart');
    }
    public function About()
    {

        return view('Font_end.about');
    }
    public function Contact()
    {

        return view('Font_end.contact');
    }
    public function wishlist()
    {

        return view('Font_end.wishlist');
    }
    public function details($id)
    {
        $products = Product::where('id', $id)->first();
        // $post = Post::where('slug', $slug_id)->first();
        return view('Font_end.products_details', [
            'products' => $products,
        ]);
    }
}
