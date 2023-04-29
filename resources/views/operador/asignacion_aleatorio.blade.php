@extends('operador.app')
<link rel="stylesheet" href="{{ asset('/css/operador.css') }}">
@section('content')

<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Asignaccion aleatorio</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="asignacion">
                            <div class="lista-lientes">
                                <table class="table table-dark table-striped">
                                    <thead>
                                        <tr>
                                        <th scope="col">Nro</th>
                                        <th scope="col">Nombre Completo</th>
                                        <th scope="col">COD-Espacio</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($usuarios as $usuario)
                                        <tr>
                                            <td>{{ $usuario->id }}</td>
                                            <td>{{ $usuario->name }}</td>
                                            <td>
                                            <select name="espacio_usuario_{{ $usuario->id }}">
                                                <option value="">Seleccione un espacio</option>
                                                @foreach ($espacios as $espacio)
                                                <option value="{{ $espacio->id }}">{{ $espacio->codigo }}</option>
                                                @endforeach
                                            </select>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="sorteo">
                            <a type="button" class="btn btn-outline-primary">Sorteo aleatorio</a>
                            </div>
                            <div class="lista-espacios">
                            <table class="table table-dark table-striped">
                                <thead>
                                        <tr>
                                        <th scope="col">Nro</th>
                                        <th scope="col">Cod-espacio</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <th scope="row">1</th>
                                        <td>PE25D</td>
                                        </tr>
                                        <tr>
                                        <th scope="row">2</th>
                                        <td>PE25S</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection