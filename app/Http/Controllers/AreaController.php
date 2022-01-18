<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;

class AreaController extends Controller
{
    public function index(){
        $area = Area::all();
        return response()->json($area);
    }

    public function add(Request $request)
    {
        $request->validate([
            'seccion' => 'required',
        ]);

        $area = Area::create($request->post());
        return response()->json(['areas'=>$area]);
    }
}
