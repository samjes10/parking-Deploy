<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Espacio;
use App\Models\Parqueo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class ParqueoController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-parqueo|crear-parqueo|editar-parqueo|borrar-parqueo',['only' => ['index']]);
         $this->middleware('permission:crear-parqueo', ['only' => ['create','store']]);
         $this->middleware('permission:borrar-parqueo', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parqueos = Parqueo::All();
        $espacios = Espacio::all();
        return view('parqueos.index', compact('parqueos', 'espacios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parqueos.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Valida los datos del formulario
        $rules = [
            'nombre' => 'required|string|max:255',
            'filas' => 'required|integer|min:1',
            'columnas' => 'required|integer|min:1',
        ];

        $validator = FacadesValidator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect('parqueos/create')
                ->withErrors($validator)
                ->withInput();
        }

        // Si la validación es exitosa, guarda los datos del formulario en la base de datos.
        // ...

        // Crear un nuevo parqueo
        $parqueo = new Parqueo();
        $parqueo->nombre = $request->nombre;
        $parqueo->descripcion = $request->descripcion;
        $parqueo->estado = $request->estado;
        $parqueo->filas = $request->filas;
        $parqueo->columnas = $request->columnas;
        $parqueo->cantidadEspacios = $request->filas * $request->columnas;

        // Guardar el objeto Parqueo en la base de datos
        $parqueo->save();

        // Redireccionar a la vista index con el nombre del parqueo y la tabla de botones
        //return view('index', ['nombre' => $nombre]);

        // Crear los espacios para el parqueo
        $filas = $request->filas;
        $columnas = $request->columnas;
        $cont = 1;
        for ($i = 1; $i <= $filas; $i++) {
            for ($j = 1; $j <= $columnas; $j++) {
                $codigo = 'PE-'.$cont;
                $espacios = new Espacio;
                $espacios->codigo = $codigo;
                $espacios->estado = 'disponible';
                $espacios->parqueo_id = $parqueo->id;
                $espacios->save();
                $cont++;
            }
        }

        // Redireccionar a la página de índice de parqueos con un mensaje de éxito
        return redirect()->route('parqueos.index')->with('success', 'Parqueo creado exitosamente.');
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
        // Obtener el parqueo desde la base de datos
        $parqueos = Parqueo::find($id);

        // Obtener los espacios del parqueo
        $espacios = Espacio::where('parqueo_id', $parqueos->id)->get();

        // Pasar el parqueo y los espacios a la vista
        return view('index', ['parqueo' => $parqueos, 'espacios' => $espacios]);
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
        $parqueo = Parqueo::findOrFail($id);
        $parqueo->delete();
        return redirect()->route('parqueos.index')->with('success', 'Parqueo eliminado exitosamente.');
    }
}
