<?php

namespace App\Http\Controllers;

use App\Cart;
use App\dataFlower;
use App\Flower;
use App\User;
use Faker\Provider\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;

class RegisterController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

    public function store(Request $request){
        //dd($request->emailregister);
        $rules = [
            'emailregister' => 'required|string|email|max:255|unique:users',
            'nameregister' => 'required',
            'password' => 'required|confirmed|alpha_dash|min:5',
            'password_confirmation' => 'required',
            'phoneregister' => 'required|numeric|digits_between:8,12',
            'gender' => 'required|in:male,female',
            'txtarea' => 'required|min:10',
            'product_image' => 'required|mimes:jpg,jpeg,png|max:2048'
        ];

        $this->validate($request, $rules);

        $user = new User();
        $user->login_status = 0;
        $user->emailregister = $request->emailregister;
        $user->nameregister = $request->nameregister;
        $user->passregister = bcrypt($request->password);
        $user->phoneregister = $request->phoneregister;
        $user->gender = $request->gender;
        $user->address = $request->txtarea;

        $product_image = $request->file('product_image');
        $image_name = Uuid::uuid().'.'.$product_image->getClientOriginalExtension();
        $dest = public_path('storage/images');
        $product_image->move($dest, $image_name);
        $user->product_image = $image_name;
        $user->save();

        return redirect('login')->with('alert-success','Register Success, Please Login!');
    }

    public function loginPost(Request $request){
        $email = $request->emaillogin;
        $password = $request->passlogin;
        $remember = $request->remember;

        $user = DB::table('users')->where('emailregister', $email)->first();
        //dd($password);
        if($user){
            if(Hash::check($password,$user->passregister)){
                Session::put('id',$user->id);
                Session::put('address', $user->address);
                Session::put('phone',$user->phoneregister);
                Session::put('username',$user->nameregister);
                Session::put('email',$user->emailregister);
                Session::put('role',$user->role);
                Session::put('login',1);
                Session::put('user_id',$user->id);
                if($remember){
                    //dd($remember);
                    return redirect('homepage')->withCookie(cookie('cookie', $email,60));
                }
                else{
                    //dd($remember);
                    return redirect('homepage'); //ini d ubah ntar
                }
            }
            else{
                return redirect('login')->with('alert','Wrong Password or Email, or you haven\'t registered yet !');
            }
        }
        else{
            return redirect('login')->with('alert','Wrong Password or Email, or you haven\'t registered yet !');
        }
    }

    public function order(Request $request, $id){
        $orders = Flower::find($id);

        $order = DB::table('carts')->where('id_order', $id)->first();
        if($order) {
            $orders->flower_stock = $orders->flower_stock-$request->flower_stock;
            $affected = DB::table('carts')
                ->where('id_order', $id)
                ->update([
                    'id_order' => $id,
                    'user_id' => Session::get('user_id'),
                    'quantity' => $order->quantity + 1,
                    'price' => $orders->flower_price*($order->quantity+1),
                    'flower_name' => $orders->flower_name,
                    'flower_image' => $orders->flower_image
                ]);
        }
        else{
            $order = new Cart();
            $orders->flower_stock = $orders->flower_stock-$request->flower_stock;
            $order->id_order = $id;
            $order->user_id = Session::get('user_id');
            $order->quantity = $order->quantity + 1;
            $order->price = $orders->flower_price*$order->quantity;
            $order->flower_name = $orders->flower_name;
            $order->flower_image = $orders->flower_image;
            //dd($order);
            $order->save();
        }

        $affected2 = DB::table('flowers')
            ->where('id', $id)
            ->update([
                'flower_stock' => $orders->flower_stock-1
            ]);

        $orders->save();
        return redirect('homepage')->with('alert-success','Flower added to cart !');
    }
}
