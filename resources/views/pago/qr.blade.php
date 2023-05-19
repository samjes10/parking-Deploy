<!-- formulario de pago por QR -->
{!! Form::open(array('route' => 'procesar_pago','method'=>'POST', 'class' => 'was-validated')) !!}
<div class="imagen-deposito">
    <div class="container img-qr">
        <img src="/img/QR.png" alt="Código QR">
    </div>
    <label for="imagen_deposito">Imagen del depósito:</label>
    <input type="file" name="imagen_deposito" id="imagen_deposito" required>

    <div class="form-group">
        <label for="tipo_pago">Tipo de pago:</label>
        <select class="form-control" name="tipo_pago" id="tipo_pago" required>
            <option value="">Seleccionar tipo de pago</option>
            <option value="anual">Pago Anual</option>
            <option value="mensual">Pago Mensual</option>
        </select>
    </div>

    <div class="form-group" id="meses_container" style="display: none;">
        <label for="meses">Meses a pagar:</label>
        <div class="col custom-columns">
            <div class="row custom-filas">
                <label><input type="checkbox" name="meses[]" value="enero"> Enero</label><br>
                <label><input type="checkbox" name="meses[]" value="febrero"> Febrero</label><br>
                <label><input type="checkbox" name="meses[]" value="marzo"> Marzo</label><br>
                <label><input type="checkbox" name="meses[]" value="abril"> Abril</label><br>
            </div>
            <div class="row custom-filas">
                <label><input type="checkbox" name="meses[]" value="mayo"> Mayo</label><br>
                <label><input type="checkbox" name="meses[]" value="junio"> Junio</label><br>
                <label><input type="checkbox" name="meses[]" value="julio"> Julio</label><br>
                <label><input type="checkbox" name="meses[]" value="agosto"> Agosto</label><br>
            </div>
            <div class="row custom-filas">
                <label><input type="checkbox" name="meses[]" value="septiembre"> Septiembre</label><br>
                <label><input type="checkbox" name="meses[]" value="octubre"> Octubre</label><br>
                <label><input type="checkbox" name="meses[]" value="noviembre"> Noviembre</label><br>
                <label><input type="checkbox" name="meses[]" value="diciembre"> Diciembre</label><br>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="monto">Monto:</label>
        <input type="text" class="form-control" name="monto" id="monto" required>
    </div>

    <button type="submit" class="btn btn-primary">Realizar Pago</button>
    {!! Form::close() !!}

    <script>
        // Mostrar u ocultar el campo de meses según el tipo de pago seleccionado
        const tipoPagoSelect = document.getElementById('tipo_pago');
        const mesesContainer = document.getElementById('meses_container');

        tipoPagoSelect.addEventListener('change', function() {
            const tipoPago = this.value;

            if (tipoPago === 'mensual') {
                mesesContainer.style.display = 'block';
            } else {
                mesesContainer.style.display = 'none';
            }
        });
    </script>