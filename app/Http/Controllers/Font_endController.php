<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Font_endController extends Controller
{
    public function Master()
    {

        return view('Font_end.index');
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
}
