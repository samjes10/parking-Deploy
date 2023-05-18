@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Convocatorias</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                           
                           <a class="btn btn-warning" href="{{ route('convocatorias.create') }}">Nueva convocatoria</a>
                           

                           <table class="table table-striped mt-2">
                              <thead style="background-color:#6777ef">                                     
                                  <th style="display: none;">ID</th>
                                  <th style="color:#fff;">Titulo</th>
                                  <th style="color:#fff;">Descripcion</th>
                                  <th style="color:#fff;">Fecha Inicio</th>
                                  <th style="color:#fff;">Fecha final</th>  
                                  <th style="color:#fff;">Imagen</th>  
                                  <th style="color:#fff;">Opciones</th>                                                                
                              </thead>
                              <tbody>
                                @foreach ($convocatorias as $convocatoria)
                                  <tr>
                                    <td style="display: none;">{{ $convocatoria->id }}</td>
                                    <td>{{ $convocatoria->titulo }}</td>
                                    <td>{{ $convocatoria->descripcion }}</td>
                                    <td>{{ $convocatoria->fecha_inicio }}</td>
                                    <td>{{ $convocatoria->fecha_limite }}</td>
                                    <td>
                                       <img src="/imagen/{{ $convocatoria->imagen }}" width="80L" >

                                    </td>
                                    <td>                                 
                                      <a class="btn btn-info" href="{{ route('convocatorias.edit',$convocatoria->id) }}">Editar</a>
                                     

                                      
                                      {!! Form::open(['method' => 'DELETE','route' => ['convocatorias.destroy', $convocatoria->id],'style'=>'display:inline']) !!}
                                          {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                      {!! Form::close() !!}
                                    

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