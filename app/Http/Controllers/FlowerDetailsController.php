<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Flower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class FlowerDetailsController extends Controller
{
    public function detail($id){
        $detail = Flower::find($id);
        return view('auth.flower_details', compact('detail'));
    }

    public function orderdetail(Request $request, $id){
        $this->validate($request,[
            'flower_stock' => 'required|numeric|min:1',
        ]);

        $orders = Flower::find($id);

        $order = DB::table('carts')->where('id_order', $id)->first();
        if($order) {
            //dd($request->flower_stock);
            if($request->flower_stock){
                $orders->flower_stock = $orders->flower_stock-$request->flower_stock;

                $affected = DB::table('carts')
                    ->where('id_order', $id)
                    ->update([
                        'id_order' => $id,
                        'user_id' => Session::get('user_id'),
                        'quantity' => $order->quantity + $request->flower_stock,
                        'price' => $orders->flower_price*($request->flower_stock+$order->quantity),
                        'flower_name' => $orders->flower_name,
                        'flower_image' => $orders->flower_image
                    ]);
            }
            else{
                $affected2 = DB::table('flowers')
                    ->where('id', $id)
                    ->update([
                        'flower_stock' => $orders->flower_stock-1
                    ]);

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
        }
        else{
            $order = new Cart();
            if($request->flower_stock){
                $orders->flower_stock = $orders->flower_stock-$request->flower_stock;
                $order->id_order = $id;
                $order->user_id = Session::get('user_id');
                $order->price = $orders->flower_price*($request->flower_stock+$order->quantity);
                $order->quantity = $request->flower_stock;
                $order->flower_name = $orders->flower_name;
                $order->flower_image = $orders->flower_image;
            }
            else{
                $affected2 = DB::table('flowers')
                    ->where('id', $id)
                    ->update([
                        'flower_stock' => $orders->flower_stock-1
                    ]);

                $order->id_order = $id;
                $order->user_id = Session::get('user_id');
                $order->quantity = $order->quantity + 1;
                $order->price = $orders->flower_price*$order->quantity;
                $order->flower_name = $orders->flower_name;
                $order->flower_image = $orders->flower_image;
            }
            //dd($order);
            $order->save();
        }

        $orders->save();
        return redirect('homepage')->with('alert-success','Flower added to cart !');
    }
}
