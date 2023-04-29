<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BaconQrCode\Renderer\Image\Png;
use BaconQrCode\Writer;
use App\Http\Controllers\Storage;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pago.index');
    }

    public function procesarPago(Request $request)
    {
        // Valida los campos del formulario
        $request->validate([
            'ci' => 'required',
            'detalle' => 'required',
            'monto' => 'required',
            'tipo_pago' => 'required|in:efectivo,qr',
            'imagen_deposito' => 'required|image|max:2048'
        ]);

        // Almacena la información del pago en la base de datos
        $pago = new Pago;
        $pago->ci = $request->ci;
        $pago->detalle = $request->detalle;
        $pago->monto = $request->monto;
        $pago->tipo_pago = $request->tipo_pago;
        $pago->imagen_deposito = $request->file('imagen_deposito')->store('public/imagenes_depositos');
        $pago->save();

        // Si el tipo de pago seleccionado es QR, genera el código QR y almacénalo en la base de datos
        if ($request->tipo_pago === 'qr') {
            $url_qr = 'https://mi-sitio.com/pagos/'.$pago->id;
            $renderer = new Png;
            $renderer->setHeight(256);
            $renderer->setWidth(256);
            $writer = new Writer($renderer);
            $imagen_qr = $writer->writeString($url_qr);
            Storage::put('public/imagenes_qr/'.$pago->id.'.png', $imagen_qr);
            $pago->imagen_qr = 'public/imagenes_qr/'.$pago->id.'.png';
            $pago->save();
        }

        // Redirige al usuario a una página de confirmación de pago
        return view('confirmacion_pago', [
            'pago' => $pago
        ]);
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
}
