<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Libro;
use App\Models\Unidad;
use Illuminate\Http\Request;

class LibroController extends Controller
{

    public function index2($curoId){
        $unidades = Unidad::whereNull('unidad_padre_id')->get();
        return view('unidades', compact('unidades'));

        $data = array('curso'=>Curso::find($curoId));
        return view('libros.index2',$data);
    }
    /**
     * Display a listing of the resource.
     */
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Libro $libro)
    {
        //
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
