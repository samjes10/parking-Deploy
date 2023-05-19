<!-- Botón para abrir el modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#carruselModal">
    Ver Carrusel
</button>

<!-- Modal -->
<div class="modal fade" id="carruselModal" tabindex="-1" role="dialog" aria-labelledby="carruselModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="carruselModalLabel">Carrusel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Slides del carrusel -->
                    <div class="carousel-inner">
                        @foreach ($objetos as $objeto)
                            <div class="carousel-item{{ $loop->first ? ' active' : '' }}">
                                <img src="{{ $objeto->imagen }}" alt="{{ $objeto->titulo }}">
                                <div class="carousel-caption">
                                    <h3>{{ $objeto->titulo }}</h3>
                                    <p>{{ $objeto->descripcion }}</p>
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
