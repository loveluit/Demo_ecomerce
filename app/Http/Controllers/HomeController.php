<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function dashboard(){
        return view('dashboard');
    }

    //Admin profile

    function profile(){


        return view('Admin.profile');
    }

    function profile_name_update(Request $request){

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

     User::find(Auth::id())->update([

        'name'=>$request->name,
        'email'=>$request->email,

     ]);

     return back()->with('update','Your Prodile Update Success');

    }  // Update passwoord

    function Update_password(Request $request){



        $request->validate([
            'current_password' => 'required',
            'password' => ['required', 'confirmed',Password::min(8)
            ->letters()
            ->mixedCase()
            ->numbers()
            ->symbols()


                ],
            'password_confirmation' => 'required',
        ]);

        if(Hash::check($request->current_password,Auth::user()->password)){

            User::find(Auth::id())->update([
                'password'=>bcrypt($request->password),
            ]);

            return back()->with('pass','Password has Updated');

        }else{

            return back()->with('err','Current Password does not match');
        }

    }  //profile Image Update

    public function Update_image(Request $request){

        // if((Auth::user()->image !== null)){


        //     $delete_from=public_path('uploads/user/'.Auth::user()->image);
        //     unlink($delete_from);



       


        //  }
                $data = new User;
                $image = $request->image;


                   if($image){
                     $imagename = time().'.'.$image->getClientOriginalExtension();
                     $request->image->move('uploads/user/',$imagename);

                     $data->image=$imagename;

                     User::find(Auth::id())->update([
                        'image' =>$imagename,
                           ]);

                         return back()->with('update','Your Update Successfullly');


                  }
}

}







