<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Brand;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BrandController extends Controller
{
    public function Add_brand()
    {

        return view('Admin.brand.add_brand');
    }

    // Brand Store

    public function Brand_store(Request $request)
    {
        // $brands = Brand::all();
        // if ($brands->image != null) {
        //     $delete_from = public_path('uploads/brand/' . $brands->imamjn

        //     ge);
        //     if (file_exists($delete_from)) {
        //         unlink($delete_from);
        //     }
        // }

        $data = new Brand();
        $image = $request->image;


        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('uploads/brand/', $imagename);

            $data->image = $imagename;

            Brand::insert([

                'barnd_name' => $request->barnd_name,

                'slug' => Str::lower(str_replace('', '-', $request->barnd_name)) . '-' . random_int(1000, 3000),
                'image' => $imagename,
                'created_at' => Carbon::Now(),

            ]);

            return back();
        }
    }   //Brand_view

    public function Brand_view()
    {
        $brand_view = Brand::all();
        return view('Admin.brand.brand_view', [

            'brand_view' => $brand_view,
        ]);
    }  //brand Delete

    public function Brand_del($brand_id)
    {

        $brand = Brand::find($brand_id);
        $delete_from = public_path('uploads/brand/' . $brand->image);
        unlink($delete_from);

        Brand::find($brand_id)->Delete();

        return back();
    }
}
