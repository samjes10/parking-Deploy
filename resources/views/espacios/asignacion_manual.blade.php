@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('/css/operador.css') }}">
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
                        <div class="lista-lientes">
                        {!! Form::open(['route' => 'asignarEspacio', 'method' => 'post']) !!}
                            <div class="form-group">
                                {!! Form::label('cliente_id', 'Cliente') !!}
                                {!! Form::select('cliente_id', $clientes, null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('espacio_id', 'Espacio') !!}
                                {!! Form::select('espacio_id', $espacios, null, ['class' => 'form-control']) !!}
                            </div>
                            {!! Form::submit('Asignar', ['class' => 'btn btn-primary']) !!}
                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection