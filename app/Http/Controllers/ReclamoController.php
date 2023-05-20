<?php

namespace App\Http\Controllers;

use App\Models\Reclamo;
use App\Models\Cliente;
use App\Models\HistorialReclamo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReclamoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $reclamos = Reclamo::All();
        return view('reclamos.index', compact('reclamos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('reclamos.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'txtMsg' => 'required',
        ]);

        // Verificar si el usuario está autenticado
        if (Auth::check()) {
            // Obtener el usuario autenticado
            $user = Auth::user();

            // Verificar si el objeto $user es válido
            if ($user) {
                // Crear un nuevo reclamo y asignarle los datos del formulario
                $reclamo = new Reclamo();
                $reclamo->cliente_id = $user->id;
                $reclamo->mensaje = $request->input('txtMsg');
                // Guardar el reclamo en la base de datos
                $reclamo->save();

                // Resto del código...
            } else {
                // El objeto $user no es válido, manejar el caso apropiado
            }
        } else {
            // El usuario no está autenticado, manejar el caso apropiado
        }

        /*//Actualizar el historial de reclamos
        $reclamo = new Reclamo::all();
        $historial_reclamo = HistorialReclamo::find($reclamo->id);
        $historial_reclamo->reclamo_id = Reclamo::find($request->reclamo_id)->id;
        $historial_reclamo->cliente_id = Cliente::find($request->cliente_id)->id;
        $historial_reclamo->nombre_cliente = $request->input('txtName');
        $historial_reclamo->accion = 'respuesta enviado';
        $historial_reclamo->descripcion = $request->input('txtMsg');
        $historial_reclamo->save();*/

        // Redirigir a una página de confirmación o mostrar un mensaje de éxito
        return redirect()->route('reclamos.index')->with('success', 'Reclamo enviado correctamente.');        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reclamo  $reclamo
     * @return \Illuminate\Http\Response
     */
    public function show(Reclamo $reclamo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reclamo  $reclamo
     * @return \Illuminate\Http\Response
     */
    public function edit(Reclamo $reclamo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reclamo  $reclamo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reclamo $reclamo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reclamo  $reclamo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reclamo $reclamo)
    {
        //
    }
}
