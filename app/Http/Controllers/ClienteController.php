<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Cliente;
use PhpParser\Node\Stmt\Return_;

class ClienteController extends Controller
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
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('clientes.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar los campos del formulario
        $this->validate($request, [
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:clientes',
            'primer_apellido' => 'required|string|max:255',
            'carnet' => 'required|numeric',
            'password' => 'required|string|min:8',
        ]);
        // crear una nueva instancia del cliente
        $cliente = new Cliente;
        $cliente->nombre = $request->input('nombre');
        $cliente->email = $request->input('email');
        $cliente->primer_apellido = $request->input('primer_apellido');
        $cliente->carnet = $request->input('carnet');
        $cliente->telefono = $request->input('telefono');
        $cliente->segundo_apellido = $request->input('segundo_apellido');
        $cliente->cargo = $request->input('cargo');
        $cliente->direccion = $request->input('direccion');
        $cliente->password = bcrypt($request->input('password'));
        $cliente->espacioAsignado = 'No';

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $nombre_imagen = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $nombre_imagen);
            $cliente->imagen = $nombre_imagen;
        }
        $cliente->save();

        return redirect()->route('clientes.index');
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
