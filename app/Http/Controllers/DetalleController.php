<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detalle;

class DetalleController extends Controller
{

    // getAll detalle
    public function index(Request $request){
        $detealle = Detalle::where('idPadre', $request->idPadre )
        ->orderBy('created_at', 'desc')
        ->get();
        return response()->json($detealle);
    }

    // añadir Nuevo Post
    public function add(Request $request){
        $request->validate([
            'contenido' => 'required',
            'autor' => 'required',
            'idPadre' => 'required'
         ]);

        $detalle = Detalle::create($request->post());
        return response()->json(['detalles'=>$detalle]);
    }

    //Eliminar detalle
    public function destroy($id)
    {
        $detalle = Detalle::find($id);
        $detalle->delete();

        return response()->json(['data' => 'Post Eliminado!!']);
    }
}
