@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('/css/pago.css') }}">
@section('content')

<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Formulario de cobro</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="container contact-form">

                            <div class="container tipo_pago">
                                <label>Tipo de pago:</label>
                                <div>
                                    <label><input type="radio" name="tipo_pago" value="efectivo" required>Efectivo</label>
                                </div>
                                <div>
                                    <label><input type="radio" name="tipo_pago" value="qr" required>QR</label>
                                </div>
                            </div>

                            <div id="efectivoForm" style="display: none;">
                                <!-- Formulario de pago en efectivo -->
                                @include('pago.efectivo')
                            </div>

                            <div id="qrForm" style="display: none;">
                                <!-- Formulario de pago QR -->
                                @include('pago.qr')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    var tipoPagoRadios = document.querySelectorAll('input[name="tipo_pago"]');
    var efectivoForm = document.getElementById("efectivoForm");
    var qrForm = document.getElementById("qrForm");

    // Agrega el evento change a los radios de tipo de pago
    tipoPagoRadios.forEach(function(radio) {
        radio.addEventListener("change", function() {
            if (this.value === "efectivo") {
                efectivoForm.style.display = "block";
                qrForm.style.display = "none";
            } else if (this.value === "qr") {
                efectivoForm.style.display = "none";
                qrForm.style.display = "block";
            }
        });
    });
</script>

<script>
    // Obtiene la fecha y hora actual
    var fechaHoraActual = new Date();

    // Establece el valor del campo de entrada de fecha y hora actual
    document.getElementById("fecha_hora_actual").value = fechaHoraActual.toLocaleString();
</script>
@endsection
