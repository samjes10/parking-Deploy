@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear Convocatoria</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">     
                                                                      
                        @if ($errors->any())                                                
                            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                            <strong>¡Revise los campos!</strong>                        
                                @foreach ($errors->all() as $error)                                    
                                    <span class="badge badge-danger">{{ $error }}</span>
                                @endforeach                        
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        @endif

                    <form action="{{ route('convocatorias.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                               <div class="form-group">
                                 <label for="titulo">Título</label>
                                 <input type="text" name="titulo" id="titulo" class="form-control" required>
                              </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">                      
                              <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea name="descripcion" id="descripcion" class="form-control" rows="4" required></textarea>
                              </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                                <label for="fecha_inicio">Fecha Inicio</label>
                                <input type="datetime-local" name="fecha_inicio" id="fecha_inicio" class="form-control" required>
                              </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                                <label for="fecha_limite">Fecha límite</label>
                                <input type="datetime-local" name="fecha_limite" id="fecha_limite" class="form-control" required>
                              </div>
                            </div>

                            <!-- Para ver la imagen seleccionada, de lo contrario no se -->
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <img id="imagenSeleccionada" style="max-height: 150px;">           
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                               <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Subir Imagen</label>
                              <div class='flex items-center justify-center w-full'>
                                <label >
                                    <input name="imagen" id="imagen" type='file' class="hidden" />
                               </label>
                              </div>
                            </div>
                            
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <button type="submit" class="btn btn-primary">Guardar</button>                            
                            
                           </div>
                        </div>
                    </form>
                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- Script para ver la imagen antes de CREAR UN NUEVO PRODUCTO -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> 
<script>   
    $(document).ready(function (e) {   
        $('#imagen').change(function(){            
            let reader = new FileReader();
            reader.onload = (e) => { 
                $('#imagenSeleccionada').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
        });
    });
</script>
@endsection