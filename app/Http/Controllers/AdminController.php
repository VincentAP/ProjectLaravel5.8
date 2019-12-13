<?php

namespace App\Http\Controllers;

use App\User;
use Faker\Provider\Uuid;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(){
        $users = User::all();
        return view("admin.manage_users", compact("users"));
    }

    public function remove($id){
        $user = User::find($id);
        $username = $user->nameregister;
        $user->delete();
        return redirect('/admin/manage_users')->with('alert-delete', $username.' has been successfully removed! ');
    }

    public function edit($id){
        $user = User::find($id);
        return view('admin.update_user', compact("user"));
    }

    public function update(Request $request, $id){
        $rules = [
            'nameregister' => 'required|string',
            'emailregister' => 'email|unique:users,emailregister,'.$id,
            'phoneregister' => 'required|numeric|digits_between:8,12',
            'gender' => 'required|in:male,female',
            'address' => 'required|min:10',
            'product_image' => 'required|mimes:jpg,jpeg,png'
        ];
        $this->validate($request, $rules);
        $profile = User::find($id);

        $profile->nameregister = $request->nameregister;
        $profile->emailregister = $request->emailregister;
        $profile->phoneregister = $request->phoneregister;
        $profile->gender = $request->gender;
        $profile->address = $request->address;

        $profile_image = $request->file('product_image');
        $image_name = Uuid::uuid().'.'.$profile_image->getClientOriginalExtension();
        $dest = public_path('storage/images');
        $profile_image->move($dest, $image_name);
        $profile->product_image = $image_name;

        $profile->save();
        return redirect('/admin/manage_users')->with('alert-delete', $profile->nameregister.' has been successfully updated! ');
    }
}
