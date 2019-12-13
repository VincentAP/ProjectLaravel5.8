<?php

namespace App\Http\Controllers;

use App\Cart;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\TransactionHistory;

class TransactionHistoryController extends Controller
{
    public function checkout(Request $request)
    {
        //dd(substr($request->selectvalue, 0, strpos($request->selectvalue, ' ')));
        $carts = Cart::where('user_id', '=', Session::get('user_id'))->get();
        $user = User::find(Session::get('user_id'));
        foreach ($carts as $history){
            $datahistory = new TransactionHistory();
            $datahistory->user_id = Session::get('user_id');
            $datahistory->member_name = $user->nameregister;
            $datahistory->courier = substr($request->selectvalue, 0, strpos($request->selectvalue, ' '));
            $datahistory->flower_name = $history->flower_name;
            $datahistory->flower_price = $history->price;
            $datahistory->flower_quantity = $history->quantity;
            $datahistory->flower_image = $history->flower_image;
            $datahistory->save();
        }

        $carts = Cart::where('user_id', '=', Session::get('user_id'))->delete();
        return redirect('homepage')->with('alert-success','Thank you for purchasing !');
    }
}
