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
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="{{ route('espacios.create') }}">Manual</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#menu1">Aleatoria</a>
                            </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                            <div class="tab-pane container active" id="home">...</div>
                            <div class="tab-pane container fade" id="menu1">...</div>
                            <div class="tab-pane container fade" id="menu2">...</div>
                            </div>
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