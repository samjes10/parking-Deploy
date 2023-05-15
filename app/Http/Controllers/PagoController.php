<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BaconQrCode\Renderer\Image\Png;
use BaconQrCode\Writer;
use App\Http\Controllers\Storage;
use App\Http\Controllers\AsignacionController;
use Carbon\Carbon;
use App\Models\Pago;
use App\Models\Asignacion;


class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $asignacion = Asignacion::findOrFail($id);

        $fechaLimite = date('Y-m-d', strtotime($asignacion->created_at . ' + ' . $asignacion->dias . ' days'));
        $diasRetraso = max(0, strtotime(date('Y-m-d')) - strtotime($fechaLimite)) / 86400;

        return view('pago.index', [
            'asignacion_id' => $id,
            'codigoEspacio' => $asignacion->espacio->codigo,
            'cliente' => $asignacion->cliente->nombreCompleto(),
            'monto' => $asignacion->precio,
            'dias_retraso' => $diasRetraso,
            'fechaHoraActual' => date('Y-m-d H:i:s'),
        ]);
    }

    public function procesar(Request $request)
    {
        $request->validate([
            'ci' => 'required|string|min:7|max:10',
            'detalle' => 'required|string|max:255',
            'monto' => 'required|numeric|min:0',
            'tipo_pago' => 'required|string|in:efectivo,qr',
            'imagen_deposito' => 'required_if:tipo_pago,qr|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $pagos = new Pago();
        $pagos->asignacion_id = $request->input('asignacion_id');
        $pagos->ci = $request->input('ci');
        $pagos->detalle = $request->input('detalle');
        $pagos->monto = $request->input('monto');
        $pagos->tipo_pago = $request->input('tipo_pago');
        
        if ($request->hasFile('imagen_deposito')) {
            $file = $request->file('imagen_deposito');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/imagenes_deposito', $fileName);
            $pagos->imagen_deposito = $fileName;
        }

        $pagos->save();

        return redirect()->route('pago.confirmacion', ['id' => $pagos->id]);
    }

    public function confirmacion($id)
    {
        $pagos = Pago::findOrFail($id);

        return view('pago.confirmacion', ['pago' => $pagos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    public function showForm()
    {
        $fechaHoraActual = now();
        $fechaHoraActual = Carbon::now()->toDateTimeString();
        return view('pago.index')->with('fechaHoraActual', $fechaHoraActual);
    }
}
