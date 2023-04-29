@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('/css/operador.css') }}">
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Asignacion de sitios</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-button">
                                <a type="button" href="{{ route('espacios.create') }}" class="btn btn-outline-primary">Asignacion manual</a>
                                <a type="button" href="{{ route('espacios.create') }}" class="btn btn-outline-success">Asignacion aleatoria</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection