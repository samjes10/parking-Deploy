@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('/css/asignacion.css') }}">
@section('content')

<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Asignaccion manual</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class=" container lista-clientes">
                            {!! Form::open(array('id' => 'asignacion-form', 'route' => 'asignaciones.store','method'=>'POST')) !!}
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('cliente_id', 'Cliente:', ['class' => 'form-label']) !!}
                                    {!! Form::select('cliente_id', ['' => 'Seleccione un cliente'] + $clientes->reject(function ($cliente) {
                                    return !empty($cliente->espacioAsignado);
                                    })->pluck('nombre', 'id')->toArray(), null, ['class' => 'form-control', 'required']) !!}
                                    @error('cliente_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('espacio_id', 'Espacio de parqueo:', ['class' => 'form-label']) !!}
                                    {!! Form::select('espacio_id', ['' => 'Seleccione un espacio de parqueo'] + $espacios->reject(function ($espacio) {
                                    return $espacio->asignacion;
                                    })->pluck('codigo', 'id')->toArray(), null, ['class' => 'form-control', 'required']) !!}
                                    @error('espacio_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('fecha_hora_actual', 'Fecha y hora actual:', ['class' => 'form-label']) !!}
                                    {!! Form::text('fecha_hora_actual', now(), ['class' => 'form-control', 'readonly']) !!}
                                </div>
                            </div>
                            <div class="col-md-12">
                                @if($convocatoria->count() > 0)
                                <div class="form-group">
                                    {!! Form::label('fecha_limite', 'Fecha límite:', ['class' => 'form-label']) !!}
                                    {!! Form::text('fecha_limite', $convocatoria->first()->fecha_limite, ['class' => 'form-control', 'readonly', 'required']) !!}
                                    @error('fecha_limite')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                @else
                                <div class="alert alert-warning" role="alert">
                                    Por favor, cree una convocatoria antes de asignar un espacio.
                                </div>
                                @endif
                            </div>
                            <div class="col-md-12">
                                {!! Form::button('Asignar', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                            </div>
                            {!! Form::close() !!}

                            @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif

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