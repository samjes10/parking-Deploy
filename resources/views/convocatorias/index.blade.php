@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Convocatoria</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                         
                           <a class="btn btn-warning" href="{{ route('convocatorias.create') }}">Nueva</a>
                          

                           <table class="table table-striped mt-2">
                              <thead style="background-color:#6777ef">                                     
                                  <th style="display: none;">ID</th>
                                  <th style="color:#fff;">Titulo</th>
                                  <th style="color:#fff;">Descripcion</th>
                                  <th style="color:#fff;">Fecha Inicio</th>
                                  <th style="color:#fff;">Fecha Fin</th>                                                                   
                              </thead>
                              <tbody>
                                @foreach ($convocatorias as $convocatoria)
                                  <tr>
                                    <td style="display: none;">{{ $convocatoria->id }}</td>
                                    <td>{{ $convocatoria->titulo }}</td>
                                    <td>{{ $convocatoria->descripcion }}</td>
                                    <td>{{ $convocatoria->fecha-inicio }}</td>
                                    <td>{{ $convocatoria->fecha-fin }}</td>
                                    <td> 
                                                                  
                                      <a class="btn btn-info" href="{{ route('convocatoria.edit',$convocatoria->id) }}">Editar</a>

                                    </td>
                                @endforeach
                                      
                                 </tr>
                                </tbody>
                            </table>
                            <!-- Centramos la paginacion a la derecha -->
                          <div class="pagination justify-content-end">
                            {!! $convocatorias->links() !!}
                          </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection