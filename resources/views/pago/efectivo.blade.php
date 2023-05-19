<link rel="stylesheet" href="{{ asset('/css/pago.css') }}">

<!-- formulario_pago.blade.php -->
{!! Form::open(array('route' => 'procesar_pago','method'=>'POST', 'class' => 'was-validated')) !!}
<div class="form-group">
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

    <div class="form-group">
        <label for="tipo_pagoEfec">Tipo de pago:</label>
        <select class="form-control" name="tipo_pagoEfec" id="tipo_pagoEfec" required>
            <option value="">Seleccionar tipo de pago</option>
            <option value="anual">Pago Anual</option>
            <option value="mensual">Pago Mensual</option>
        </select>
    </div>

    <div class="form-group" id="meses_containerEfec" style="display: none;">
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
</div>
<button class="btn-pago" type="submit">Pagar</button>
{!! Form::close() !!}

<script>
    // Obtiene la fecha y hora actual
    var fechaHoraActual = new Date();

    // Establece el valor del campo de entrada de fecha y hora actual
    document.getElementById("fecha_hora_actual").value = fechaHoraActual.toLocaleString();
</script>

<script>
    // Mostrar u ocultar el campo de meses según el tipo de pago seleccionado
    const tipoPagoSelect = document.getElementById('tipo_pagoEfec');
    const mesesContainer = document.getElementById('meses_containerEfec');

    tipoPagoSelect.addEventListener('change', function() {
        const tipoPago = this.value;

        if (tipoPago === 'mensual') {
            mesesContainer.style.display = 'block';
        } else {
            mesesContainer.style.display = 'none';
        }
    });
</script>