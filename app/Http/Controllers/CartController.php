<?php

namespace App\Http\Controllers;

use App\Courier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Cart;

class CartController extends Controller
{
    public function index(){
        $carts = Cart::where('user_id', '=', Session::get('user_id'))->get();
        $couriers = Courier::all();
        $totalprice = 0;
        foreach ($carts as $total){
            $totalprice = $totalprice + $total->price;
        }
        Session::put('totalprice', $totalprice);
        return view('auth.cart', compact('carts', 'couriers'));
    }

    public function remove($id)
    {
        $cartdata = Cart::find($id);
        Session::put('flower-delete', $cartdata->flower_name);
        $cartdata->delete();
        return redirect('/cart')->with('alert-delete', Session::get('flower-delete').' has been removed from cart!');
    }
}
