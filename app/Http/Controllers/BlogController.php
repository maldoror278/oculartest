<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\blog;


class BlogController extends Controller
{
    public function index()
    {
        $blogs = blog::orderBy('created_at','DESC')->paginate(5);
        return response()->json($blogs);
     }


    public function store(Request $request)
    {
         $request->validate([
            'titulo' => 'required',
            'contenido' => 'required',
            'resumen' => 'required',
            'autor' => 'required'
        ]);

        $blog = blog::create($request->post());
        return response()->json(['blogs'=>$blog]);
    }

    public function show(Blog $blog)
    {
        return response()->json($blog);
    }


    public function update(Request $request, Blog $blog)
    {

         $blog->fill($request->post())->save();
         return response()->json([
             'blog'=>$blog
         ]);
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return response()->json([
            'mensaje' => 'blog Eliminado'
        ]);
    }
}
