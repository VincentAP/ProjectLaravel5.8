<?php

namespace App\Http\Controllers;

use App\Courier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourierController extends Controller
{
    public function index()
    {
        $types = Courier::paginate(10);

        return view('admin.manage_courier', compact('types'));
    }

    public function create()
    {
        return view('admin.insert_courier');
    }

    public function store(Request $request)
    {
        $data = DB::table('couriers')
            ->where('courier_name', $request->courier_name)->first();

        if($data){
            return redirect('/admin/couriers/insert')->with('alert-fail', 'Courier already in database.');
        }
        else{
            $type = new Courier();
            $type->courier_name = $request->courier_name;
            $type->courier_price = $request->courier_price;
            $type->save();
            return redirect('/admin/couriers')->with('alert-success', 'Courier added to database.');
        }
    }

    public function search(Request $request)
    {
        $key = $request->search;
        $types = DB::table('couriers')
            ->where('courier_name', 'like', '%' . $key . '%')
            ->paginate(10);

        if (!$types->isEmpty()) {
            return view('admin.manage_courier',
                compact('types')
            );
        } else {
            return redirect('/admin/couriers')->with('alert', 'We can\'t seems to find the item you were looking for.');
        }
    }

    public function update(Request $request, $id){
        $rules = [
            'courier_name' => 'required|min:3',
            'courier_price' => 'required|numeric|min:3000'
        ];
        $this->validate($request, $rules);
        $data = DB::table('couriers')
            ->where('courier_name', $request->courier_name)->first();

        if($data){
            return redirect('/admin/couriers/'.$id.'/edit')->with('alert-fail', 'Courier already in database.');
        }
        else{
            $courier = Courier::find($id);
            $courier->courier_name = $request->courier_name;
            $courier->courier_price = $request->courier_price;
            $courier->save();
            return redirect('/admin/couriers')->with('alert-update', 'Courier updated!');
        }
    }
    public function edit($id)
    {
        $courier = Courier::find($id);
        return view('admin.UpdateCourier', compact('courier'));
    }
}
