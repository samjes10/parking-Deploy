<?php

namespace App\Http\Controllers;

use App\Models\Espacio;
use App\Models\User;
use Illuminate\Http\Request;

class EspacioController extends Controller
{
    //
    public function index()
    {
        $usuarios = User::all() ?? null;
        $espacios = Espacio::All();
        return view('espacios.index', compact('usuarios', 'espacios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = User::all() ?? null;
        $espacios = Espacio::All();
        
        if (count($usuarios) < count($espacios)) {
            return view('espacios.asignacion_manual', compact('usuarios', 'espacios'));
        } else {
            return view('espacios.asignacion_aleatorio', compact('usuarios', 'espacios'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        $espacio = new Espacio();
        $espacio->codigo = $request->codigo;
        $espacio->descripcion = $request->descripcion;
        $espacio->estado = $request->estado;
        
        $espacio->save();

        return response()->json(['mensaje'=>'Espacios de parqueo guardados correctamente']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
