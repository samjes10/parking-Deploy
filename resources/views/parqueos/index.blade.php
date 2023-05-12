@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('/css/parqueoIndex.css') }}">
@section('content')
<section class="section">
        <div class="section-header">
            <h3 class="page__heading">Parqueos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- Agregamos el botón de añadir parqueos -->
                            <a href="{{ route('parqueos.create') }}" class="btn btn-primary mb-3">Añadir Parqueo</a>
                            
                            @foreach($parqueos as $parqueo)
                            <div class="card-parqueos">
                                <div class="card-header">
                                    <h5>{{ $parqueo->nombre }}</h5>
                                    
                                    <div class="eliminar-parqueo">
                                        <form method="POST" action="{{ route('parqueos.destroy', ['parqueo' => $parqueo->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-primary">Eliminar</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-body-info">
                                    <table>
                                        <tr>
                                            <th>Código</th>
                                            <th>Estado</th>
                                            <th>Descripción</th>
                                        </tr>
                                        @foreach ($parqueo->espacios as $espacio)
                                            <tr>
                                                <td>{{ $espacio->codigo }}</td>
                                                <td>{{ $espacio->estado }}</td>
                                                <td>{{ $espacio->descripcion}}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                    
                            <!-- Agregar más campos según sea necesario -->
                            </div>
                            @endforeach    

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