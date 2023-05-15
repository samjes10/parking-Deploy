@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('/css/asignacion.css') }}">
@section('content')

<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Lista de asignaciones</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Agregamos el botón de asignar -->
                        <a href="{{ route('asignaciones.create') }}" class="btn btn-primary mb-3">Asignacion manual</a>
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>ID Cliente</th>
                                    <th>ID Espacio</th>
                                    <th>Nombre de cliente</th>
                                    <th>Fecha/Hora Actual</th>
                                    <th>Fecha Límite</th>
                                    <th>Código Espacio</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($asignaciones as $asignacion)
                                    <tr>
                                        <td>{{ $asignacion->id }}</td>
                                        <td>{{ $asignacion->cliente_id }}</td>
                                        <td>{{ $asignacion->espacio_id }}</td>
                                        <td>{{ $asignacion->cliente }}
                                        <td>{{ DateTime::createFromFormat('Y-m-d H:i:s', $asignacion->fecha_hora_actual)->format('d/m/Y H:i') }}</td>
                                        <td>{{ DateTime::createFromFormat('Y-m-d', $asignacion->fecha_limite)->format('d/m/Y') }}</td>
                                        <td>{{ $asignacion->codigoEspacio }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
