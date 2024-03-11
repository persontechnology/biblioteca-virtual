<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Unidad;
use Illuminate\Http\Request;

class UnidadController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index2($curoId)  {
        $curso=Curso::find($curoId);
        $unidades = Unidad::whereNull('unidad_padre_id')->where('curso_id',$curoId)->get();
        $data = array(
            'curso'=>$curso,
            'unidades'=>$unidades
        );
        return view('unidades.index2', $data);
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
        $unidadRaiz = Unidad::create($request->all());
        return redirect()->route('unidad.index2',$request->curso_id);
    }
    public function storeSub(Request $request)
    {
        $unidadRaiz = Unidad::find($request->unidad_padre_id);
        $subunidad1 = $unidadRaiz->subunidades()->create($request->all());
        return redirect()->route('unidad.index2',$request->curso_id);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Unidad $unidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Unidad $unidad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Unidad $unidad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unidad $unidad)
    {
        //
    }
}
