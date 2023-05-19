<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Espacio;
use App\Models\Cliente;
use App\Models\Asignacion;
use App\Models\Convocatoria;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Parqueo;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator as FacadesValidator;


class AsignacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtener todos los clientes
        $clientes = Cliente::all() ?? null;

        // Obtener todos los espacios disponibles
        $espacios = Espacio::where('estado', 'disponible')->get();

        // Obtener todas las asignaciones con información de cliente y espacio
        $asignaciones = Asignacion::with(['cliente', 'espacio'])->get();

        return view('asignaciones.index', compact('clientes', 'espacios', 'asignaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fechaHoraActual = date('Y-m-d H:i:s');
        $espacios = Espacio::where('estado', 'disponible')->get();
        $clientes = Cliente::all();
        // Obtener espacios disponibles

        //Obtener la fecha de la convocataria
        $convocatoria = Convocatoria::all();

        return view('asignaciones.create', compact('clientes', 'espacios', 'fechaHoraActual', 'convocatoria'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar formulario
        $request->validate([
            'fecha_limite' => 'required|date|'
        ]);

        // Verificar si el espacio está ocupado
        $espacio = Espacio::findOrFail($request->espacio_id);
        if ($espacio->ocupado) {
            return redirect()
            ->back()->withErrors(['espacio_id' => 'El espacio de parqueo seleccionado ya está ocupado.'])->withInput();
        }
        
        // Asignar espacio a cliente
        $asignacion = new Asignacion();
        $asignacion->fecha_limite = $request->fecha_limite;
        $asignacion->carnet_Cliente = Cliente::find($request->cliente_id)->carnet;
        $asignacion->nombre_Cliente = Cliente::find($request->cliente_id)->nombre;
        $asignacion->codigoEspacio = Espacio::find($request->espacio_id)->codigo;
        $asignacion->cliente_id = $request->cliente_id;
        $asignacion->espacio_id = $request->espacio_id;
        $asignacion->save();

        // Actualizar estado del espacio a "ocupado"
        $espacio = Espacio::find($request->espacio_id);
        $espacio->estado = 'ocupado';
        $espacio->save();

        //Actualizar el espacioAsignado a "Si"
        $cliente = Cliente::find($request->cliente_id);
        $cliente->espacioAsignado = 'Si';
        $cliente->save();

        return redirect()->route('asignaciones.index')->with('success', 'El espacio ha sido asignado.');
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
