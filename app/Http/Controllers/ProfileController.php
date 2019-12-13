<?php

namespace App\Http\Controllers;

use App\User;
use Faker\Provider\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    //
    public function update(Request $request){
        $id = Session::get('id');

        $rules = [
            'nameregister' => 'required|string',
            'emailregister' => 'email|unique:users,emailregister,'.$id,
            'phoneregister' => 'required|numeric|digits_between:8,12',
            'gender' => 'required|in:male,female',
            'address' => 'required|min:10',
            'product_image' => 'required|mimes:jpg,jpeg,png'
        ];
        $this->validate($request, $rules);

        $id = Session::get('id');
        $profile = User::find($id);

        $profile->nameregister = $request->nameregister;
        $profile->emailregister = $request->emailregister;
        $profile->phoneregister = $request->phoneregister;
        $profile->gender = $request->gender;
        $profile->address = $request->address;

        $profile_image = $request->file('product_image');
        $image_name = Uuid::uuid().'.'.$profile_image->getClientOriginalExtension();
        $dest = public_path('storage/app/public/images');
        $profile_image->move($dest, $image_name);
        $profile->product_image = $image_name;

        Session::put('address', $profile->address);
        Session::put('phone',$profile->phoneregister);
        Session::put('username',$profile->nameregister);
        Session::put('email',$profile->emailregister);

        $profile->save();
        return redirect()->back();
    }
    public function edit()
    {
        $profile = User::find(Session::get('id'));
        return view('updateProfile', compact('profile'));
    }
}
