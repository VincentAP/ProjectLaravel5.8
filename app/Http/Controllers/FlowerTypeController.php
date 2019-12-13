<?php

namespace App\Http\Controllers;

use App\FlowerType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FlowerTypeController extends Controller
{
    public function index()
    {
        $types = FlowerType::paginate(10);

        return view('admin.manage_flower_type', compact('types'));
    }

    public function create()
    {
        return view('admin.insert_flower_type');
    }

    public function store(Request $request)
    {
        $data = DB::table('flower_types')
            ->where('flower_type', $request->flower_type)->first();

        if($data){
            return redirect('/admin/flowers/type/insert')->with('alert-fail', 'Flower\'s type already in database.');
        }
        else{
            $type = new FlowerType();
            $type->flower_type = $request->flower_type;
            $type->save();
            return redirect('/admin/flowers/type')->with('alert-success', 'Flower\'s type added to database.');
        }
    }

    public function search(Request $request)
    {
        $key = $request->search;
        $types = DB::table('flower_types')
            ->where('flower_type', 'like', '%' . $key . '%')
            ->paginate(10);

        if (!$types->isEmpty()) {
            return view('admin.manage_flower_type',
                compact('types')
            );
        } else {
            return redirect('/admin/flowers/type')->with('alert', 'We can\'t seems to find the item you were looking for.');
        }
    }

    public function edit($id)
    {
        $flower = FlowerType::find($id);

        return view('admin.update_flower_type', compact('flower'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'flower_type' => 'required|max:50',
        ];
        $this->validate($request, $rules);
        $data = DB::table('flower_types')
            ->where('flower_type', $request->flower_type)->first();

        if($data){
            return redirect('/admin/flowers/type/'.$id.'/edit')->with('alert-fail', 'Flower\'s type already in database.');
        }
        else {
            $flower = FlowerType::find($id);
            $flower->flower_type = $request->flower_type;
            $flower->save();
            return redirect('/admin/flowers/type')->with('alert-update', 'Flower\'s type updated!');
        }
    }

    public function destroy($id)
    {
        $flower = FlowerType::find($id);
        $flower->delete();
        return redirect('/admin/flowers/type')->with('alert-delete', 'Your flower\'s type successfully deleted!');
    }
}
