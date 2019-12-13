<?php

namespace App\Http\Controllers;

use App\dataFlower;
use App\Flower;
use App\Score;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function logout(){
        Session::flush();
        return redirect('login');
    }

    public function index(){
        $flowers = Flower::paginate(10);
        return view('auth.homepage', compact('flowers'));
    }

    public function search(Request $request){
        $key = $request->search;

        $flowers = DB::table('flowers')
            ->where('flower_name','like','%'.$key.'%')
            ->orWhere('flower_description', 'like', '%'.$key.'%')
            ->paginate(10);

        if (!$flowers->isEmpty()){
            return view('auth.homepage',
                compact('flowers')
            );
        }
        else {
            return redirect('homepage')->with('alert','Flower Not Found, kindly check out another flowers :)');
        }
    }
}
