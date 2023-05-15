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
            <div class="pagos">
              <!-- formulario_pago.blade.php -->
              <form method="POST" action="{{ route('procesar_pago') }}" enctype="multipart/form-data">
                @csrf
                <div>
                  <div>
                    <label for="ci">Carnet de identidad:</label>
                    <input type="text" name="ci" id="ci" required>
                  </div>
                  <div>
                    <label for="ci">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" required>
                  </div>
                  <div>
                    <label for="codigoEspacio">Código de Espacio:</label>
                    <input type="text" name="codigoEspacio" id="codigoEspacio" value="{{ $asignacion->codigoEspacio }}" readonly>
                  </div>
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
                  <label>Fecha y hora:</label>
                  <input type="text" id="fechaHora" name="fechaHora" value="{{ $fechaHoraActual }}" readonly>
                </div>

                <div>
                  <label>Tipo de pago:</label>
                  <div>
                    <label><input type="radio" name="tipo_pago" value="efectivo" required>Efectivo</label>
                  </div>
                  <div>
                    <label><input type="radio" name="tipo_pago" value="qr" required>QR</label>
                  </div>
                  <div class="imagen-deposito">
                    <div class="img-qr">
                      <img src="/img/QR.png" alt="Código QR">
                    </div>
                    <label for="imagen_deposito">Imagen del depósito:</label>
                    <input type="file" name="imagen_deposito" id="imagen_deposito" required>
                  </div>
                </div>     
                <button class="btn-pago" type="submit">Pagar</button>
              </form>

              <!-- Agregar este bloque de código al final de la vista -->
              <script>
                const tipoPagoRadios = document.getElementsByName('tipo_pago');
                for (let i = 0; i < tipoPagoRadios.length; i++) {
                  tipoPagoRadios[i].addEventListener('change', function() {
                    if (tipoPagoRadios[i].value === 'efectivo') {
                      document.querySelector('.imagen-deposito').style.display = 'none';
                    } else {
                      document.querySelector('.imagen-deposito').style.display = 'block';
                    }
                  });
                }
              </script>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
