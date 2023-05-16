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
                {!! Form::open(array('route' => 'procesar_pago','method'=>'POST', 'class' => 'was-validated')) !!}
                  <div class="row">
                    <div class="col">
                       <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" placeholder="Ingrese su nombre" name="nombre" required>
                        <div class="valid-feedback">Valido.</div>
                        <div class="invalid-feedback">Por favor, rellene este campo.</div>
                    </div>
                    
                    <div class="col">
                      <label for="carnet" class="form-label">Carnet:</label>
                      <input type="text" class="form-control" id="carnet" placeholder="carnet" name="carnet" required>
                      <div class="valid-feedback">Valido.</div>
                        <div class="invalid-feedback">Por favor, rellene este campo.</div>
                    </div>
                  </div>
              
                  <div class="row">
                    <div class="col">
                      <label for="cargo" class="form-label">Codigo Espacio:</label>
                      <input type="text" class="form-control" id="codigo" placeholder="codigo" name="codigo" required>
                      <div class="valid-feedback">Valido.</div>
                      <div class="invalid-feedback">Por favor, rellene este campo.</div>
                    </div>

                    <div class="col">
                      <label for="cargo" class="form-label">Detalle de pago:</label>
                      <input type="text" class="form-control" id="detalle" placeholder="detalle" name="detalle" required>
                      <div class="valid-feedback">Valido.</div>
                      <div class="invalid-feedback">Por favor, rellene este campo.</div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col">
                      <label for="cargo" class="form-label">Monto:</label>
                      <input type="text" class="form-control" id="monto" placeholder="monto" name="monto">
                      <div class="valid-feedback">Valido.</div>
                      <div class="invalid-feedback">Por favor, rellene este campo.</div>
                    </div>
                    
                    <div class="col">
                        {!! Form::label('fecha_hora_actual', 'Fecha y hora actual:', ['class' => 'form-label']) !!}
                        {!! Form::text('fecha_hora_actual', now(), ['class' => 'form-control', 'readonly']) !!}
                    </div>
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
              {!! Form::close() !!}

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
<script>
    // Obtiene la fecha y hora actual
    var fechaHoraActual = new Date();

    // Establece el valor del campo de entrada de fecha y hora actual
    document.getElementById("fecha_hora_actual").value = fechaHoraActual.toLocaleString();
</script>
@endsection
