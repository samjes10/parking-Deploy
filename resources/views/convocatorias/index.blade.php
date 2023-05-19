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
                           
                         <!-- Botón para abrir el modal -->
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#carruselModal">
                            Ver Convocatorias
                        </button>

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
<style>
    .carousel-img {
        width: 1100px; /* Ancho deseado */
        height: 500px; /* Alto deseado */
        object-fit: cover; /* Ajuste de imagen */
    }
    .carousel-text {
        color: white; /* Color del texto */
        -webkit-text-stroke: 1px black; /* Borde blanco */
        text-stroke: 1px black; /* Borde blanco */
    }
</style>

<!-- Modal -->
<div class="modal fade" id="carruselModal" tabindex="-1" role="dialog" aria-labelledby="carruselModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="carruselModalLabel">Convocatoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Slides del carrusel -->
                    <div class="carousel-inner">
                        @foreach ($convocatorias as $convocatoria)
                            <div class="carousel-item{{ $loop->first ? ' active' : '' }}">
                                <img src="/imagen/{{ $convocatoria->imagen }}"  class="carousel-img">
                                <div class="carousel-caption">
                                    <h3 class="carousel-text">{{ $convocatoria->titulo }}</h3>
                                    <h4 class="carousel-text">{{ $convocatoria->descripcion }}</h4>
                                    <h4 class="carousel-text">{{ $convocatoria->fecha_inicio }}</h4>
                                    <h4 class="carousel-text">{{ $convocatoria->fecha_limite }}</h4>
                                    <!-- Otros datos del objeto -->
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Controles del carrusel -->
                    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Anterior</span>
                    </a>
                    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Siguiente</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
