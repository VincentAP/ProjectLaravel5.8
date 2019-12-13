<?php

namespace App\Http\Controllers;

use App\dataFlower;
use App\Flower;
use App\FlowerType;
use Illuminate\Http\Request;
use Faker\Provider\Uuid;
use Illuminate\Support\Facades\DB;

class FlowerController extends Controller
{
    public function index()
    {
        $flowers = Flower::paginate(10);
        return view('admin.manage_flower', compact('flowers'));
    }

    public function create()
    {
        $flower_types = FlowerType::all();
        return view('admin.insert_flower', compact('flower_types'));
    }

    public function store(Request $request)
    {
        $rules = [
            'flower_name' => 'required|min:5|max:50',
            'flower_price' => 'required|numeric',
            'flower_stock' => 'required|numeric',
            'flower_description' => 'required',
            'flower_image' => 'required',
        ];

        $this->validate($request, $rules);
        $flower = new Flower();
        $flower->flower_name = $request->flower_name;
        $flower->flower_price = $request->flower_price;
        $flower->flower_stock = $request->flower_stock;
        $flower->flower_type = $request->flower_type;
        $flower->flower_description = $request->flower_description;
        $flower_image = $request->file('flower_image');
        // 1. Nama image
        $image_name = Uuid::uuid().'.'.$flower_image->getClientOriginalExtension();
        // 2. Path/folder untuk store image
        $dest = public_path('/storage/images');
        // 3. Move image
        $flower_image->move($dest, $image_name);
        // 4. Store nama image di DB
        $flower->flower_image = $image_name;
        $flower->save();
        return redirect('/admin/flowers')->with('alert-success', 'Flower added to database.');
    }

    public function search(Request $request)
    {
        $key = $request->search;
        $flowers = DB::table('flowers')
            ->where('flower_name','like','%'.$key.'%')
            ->orWhere('flower_description', 'like', '%'.$key.'%')
            ->paginate(10);

        if (!$flowers->isEmpty()){
            return view('admin.manage_flower',
                compact('flowers')
            );
        }
        else {
            return redirect('/admin/flowers')->with('alert','We can\'t seems to find the item you were looking for.');
        }
    }

    public function edit($id)
    {
        $flower = Flower::find($id);
        $flower_types = FlowerType::all();
        return view('admin.update_flower', compact('flower', 'flower_types'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'flower_name' => 'required|min:5|max:50',
            'flower_price' => 'required|numeric',
            'flower_stock' => 'required|numeric',
            'flower_description' => 'required',
            'flower_image' => 'required',
        ];
        $this->validate($request, $rules);
        $flower = Flower::find($id);
        $flower->flower_name = $request->flower_name;
        $flower->flower_price = $request->flower_price;
        $flower->flower_stock = $request->flower_stock;
        $flower->flower_type = $request->flower_type;
        $flower->flower_description = $request->flower_description;
        $flower_image = $request->file('flower_image');
        $image_name = Uuid::uuid().'.'.$flower_image->getClientOriginalExtension();
        $dest = public_path('/storage/images');
        $flower_image->move($dest, $image_name);
        $flower->flower_image = $image_name;
        $flower->save();
        return redirect('/admin/flowers')->with('alert-update', 'Flower updated!');
    }

    public function destroy($id)
    {
        $flower = Flower::find($id);
        $flower->delete();
        return redirect('/admin/flowers')->with('alert-delete', 'Your flower successfully deleted!');
    }
}
