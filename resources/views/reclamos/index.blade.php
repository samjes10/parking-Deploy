<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="{{ asset('/css/reclamos.css') }}">
<link rel="stylesheet" href="{{ asset('/css/asignacion.css') }}">

@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Formulario de reclamos</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Agregamos el botón de añadir mensaje -->
                        <a href="{{ route('reclamos.create') }}" class="btn btn-primary mb-3">Nuevo mensaje</a>
                         
                        <table>
                            <thead>
                                <tr>
                                    <th>Mensaje</th>
                                    <th>Fecha/Hora </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reclamos as $reclamo)
                                    <tr>
                                        <td>{{ $reclamo->mensaje }}</td>
                                        <td>{{ DateTime::createFromFormat('Y-m-d H:i:s', $reclamo->created_at)->format('d/m/Y H:i') }}</td>
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