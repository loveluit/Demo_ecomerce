<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function Add_product()
    {
        $cate = Category::all();
        return view('Admin.product.add_product', [
            'cate' => $cate,
        ]);
    }
    // Product Store

    public function Product_store(Request $request)
    {

        $data = new Product;
        $product_image = $request->product_image;


        if ($product_image) {
            $imagename_product = time() . '.' . $product_image->getClientOriginalExtension();
            $request->product_image->move('uploads/product/', $imagename_product);

            $data->product_image = $imagename_product;

            //privew image

            $data = new Product;
            $priview_image = $request->priview;


            if ($priview_image) {
                $imagename_priview = time() . '.' . $priview_image->getClientOriginalExtension();
                $request->priview->move('uploads/product/priview', $imagename_priview);

                $data->priview_image = $imagename_priview;

                Product::insert([

                    'title' => $request->title,
                    // 'slug'=>$request->slug,
                    'slug' => Str::lower(str_replace('', '-', $request->title)) . '-' . random_int(1000, 3000),
                    'category_id' => $request->category_id,
                    'brand_id' => $request->brand_id,
                    'short_desp' => $request->short_desp,
                    'desp' => $request->desp,
                    'product_image' => $imagename_product,
                    'priview' => $imagename_priview,
                    'regular_price' => $request->regular_price,
                    'sale_price' => $request->sale_price,
                    'sku' => $request->sku,
                    'quantity' => $request->quantity,
                    'stock' => $request->stock,
                    'featured' => $request->featured,
                    'created_at' => Carbon::Now(),

                ]);
                return back()->with('product', "Your Product Added Successfully");
            }
        }
    }    //Product_view

    public function Product_view()
    {
        $product_view = Product::all();
        return view('Admin.product.product_view', [
            'product_view' => $product_view,
        ]);
    }
}
 //
