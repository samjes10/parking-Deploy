@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('/css/cliente.css') }}">
@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Clientes</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Agregamos el botón de añadir parqueos -->
                        <a href="{{ route('clientes.create') }}" class="btn btn-primary mb-3">Nuevo Cliente</a>

                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Apellido Paterno</th>
                                    <th>Apellido Materno</th>
                                    <th>Email</th>
                                    <th>Telefono</th>
                                    <th>Carnet</th>
                                    <th>Cargo</th>
                                    <th>Direccion</th>
                                    <th>Espacio Asignado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clientes as $cliente)
                                <tr>
                                    <td>{{ $cliente->id }}</td>
                                    <td>{{ $cliente->nombre }}</td>
                                    <td>{{ $cliente->primer_apellido }}</td>
                                    <td>{{ $cliente->segundo_apellido }}</td>
                                    <td>{{ $cliente->email }}</td>
                                    <td>{{ $cliente->telefono }}</td>
                                    <td>{{ $cliente->carnet }}</td>
                                    <td>{{ $cliente->cargo }}</td>
                                    <td>{{ $cliente->direccion }}</td>
                                    <td>{{ $cliente->espacioAsignado }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Centramos la paginacion a la derecha -->
                        <div class="pagination justify-content-end">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection