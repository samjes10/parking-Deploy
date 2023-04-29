@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('/css/pago.css') }}">
@section('content')

<section class="section">
  <div class="section-header">
    <h3 class="page__heading">Formulario de pagos</h3>
  </div>
  <div class="section-body">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <!-- formulario_pago.blade.php -->
            <form method="POST" action="{{ route('procesar_pago') }}" enctype="multipart/form-data">
              @csrf
              <div>
                <label for="ci">Carnet de identidad:</label>
                <input type="text" name="ci" id="ci" required>
              </div>

              <div>
                <label for="detalle">Detalle del pago:</label>
                <input type="text" name="detalle" id="detalle" required>
              </div>

              <div>
                <label for="monto">Monto:</label>
                <input type="number" name="monto" id="monto" required>
              </div>

              <div>
                <label>Tipo de pago:</label>
                <div>
                  <label>
                    <input type="radio" name="tipo_pago" value="efectivo" required>
                    Efectivo
                  </label>
                </div>
                <div>
                  <label>
                    <input type="radio" name="tipo_pago" value="qr" required>
                    QR
                  </label>
                </div> 
                <div>
                  <label for="imagen_deposito">Imagen del depósito:</label>
                  <input type="file" name="imagen_deposito" id="imagen_deposito" required>
                </div>
              </div>
              
              <button type="submit">Pagar</button>
            </form>

            <!-- Agregar este bloque de código al final de la vista -->
            @if ($errors->has('tipo_pago') && $errors->first('tipo_pago') == 'qr')
              <script>
                // Selecciona la imagen y establece la fuente al QR correspondiente
                const imagenQR = document.querySelector('img.qr-code');
                imagenQR.src = '{{ $qr_code_url }}';
                // Muestra la imagen QR
                imagenQR.classList.remove('hidden');
              </script>
            @endif

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
