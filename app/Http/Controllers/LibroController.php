<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Unidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function crear($unidadId)
    {
        $unidad=Unidad::find($unidadId);
        return view('libros.crear',['unidad'=>$unidad]);
    }
   
     public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $libro=new Libro();
        $libro->nombre=$request->nombre;
        $libro->unidad_id=$request->unidad_id;
        $libro->save();

        if ($request->hasFile('archivo')) {

            $path = Storage::putFileAs(
                'public/libros', $request->file('archivo'), $libro->id.'.'.$request->file('archivo')->getClientOriginalExtension()
            );
            $libro->archivo=$path;
            $libro->save();
        }


        
        return redirect()->route('unidad.index2',$libro->unidad->curso_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Libro $libro)
    {
        try {
            $libro->delete();
        } catch (\Throwable $th) {
            //throw $th;
        }
        
        return redirect()->route('unidad.index2',$libro->unidad->curso_id);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Libro $libro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Libro $libro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Libro $libro)
    {
        //
    }
}
