<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('/css/espacios.css') }}">
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Registrar parqueo</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- Formulario para registrar el parqueo -->
                            {!! Form::open(array('id' => 'parqueo-form', 'route' => 'parqueos.store','method'=>'POST')) !!}
                            <div class="registrar-Parqueo">
                                <div class ="input-parqueo">
                                    <div class="form-group" style="width: 20%">
                                        {!! Form::label('nombre', 'Nombre del parqueo') !!}
                                        {!! Form::text('nombre', null, array('placeholder' => 'nombre del parqueo','class' => 'form-control')) !!}
                                        @if ($errors->has('nombre'))
                                            <div class="invalid-feedback">{{ $errors->first('nombre') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group" style="width: 10%">
                                        {!! Form::label('filas', 'Filas') !!}
                                        {!! Form::number('filas', null, array('placeholder' => '1', 'min'=>'1', 'class' => 'form-control', 'id' => 'filas-input')) !!}
                                        @if ($errors->has('filas'))
                                            <div class="invalid-feedback">{{ $errors->first('filas') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group" style="width: 10%">
                                        {!! Form::label('columnas', 'Columnas') !!}
                                        {!! Form::number('columnas', null, array('placeholder' => '1', 'min'=>'1',  'class' => 'form-control', 'id' => 'columnas-input')) !!}
                                        @if ($errors->has('columnas'))
                                            <div class="invalid-feedback">{{ $errors->first('columnas') }}</div>
                                        @endif
                                    </div>
                                
                                    <div class="form-group" style="width: 17%">
                                        {!! Form::label('estado', 'Estado del parqueo') !!}
                                        {!! Form::select('estado', array('activo' => 'Activo', 'inactivo' => 'Inactivo'), 'activo', array('class' => 'form-control')) !!}
                                    </div>
                                
                                    <div class="form-group" style="width: 25%">
                                        {!! Form::label('descripcion', 'Descripción del parqueo') !!}
                                        {!! Form::textarea('descripcion', isset($parqueo) ? $parqueo->precio : null, array('placeholder' => 'Descripción del parqueo','class' => 'form-control')) !!}
                                    </div>
                                    <div class="form-group" style="width: 10%">
                                    {!! Form::label('precio', 'Precio') !!}
                                    {!! Form::text('precio', null, ['placeholder' => '0 Bs', 'min' => '1', 'class' => 'form-control', 'id' => 'precio-input']) !!}
                                    @if ($errors->has('precio'))
                                            <div class="invalid-feedback">{{ $errors->first('precio') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-primary" onclick="generarTabla(document.getElementById('filas-input').value, document.getElementById('columnas-input').value)">Crear</button>
                                </div>
                                <div id="tabla-botones"></div>
                                </div>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                    <a href="{{ route('parqueos.index') }}" class="btn btn-primary">Cancelar</a>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<script>
    function generarTabla(filas, columnas) {
    let tabla = '';
    let cont = 1;
    let codigos = ''; // Variable para almacenar los códigos de cada espacio
    for (let i = 1; i <= filas; i++) {
        tabla += '<div class="fila">';
        for (let j = 1; j <= columnas; j++) {
            let codigo = 'PE-'+cont;
            tabla += '<div class="espacio">'+codigo + '</div>';
            codigos += codigo + ','; // Agregar el código al final de la lista de códigos
            cont++;
        }
        tabla += '</div>';
    }
    document.getElementById('tabla-botones').innerHTML = tabla;
    document.getElementById('codigos-input').value = codigos.slice(0, -1); // Asignar la lista de códigos al campo oculto
}

</script>