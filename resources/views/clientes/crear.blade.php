@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('/css/asignacion.css') }}">
@section('content')

<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Formulario de registro de clientes</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        {!! Form::open(array('route' => 'clientes.store','method'=>'POST', 'class' => 'was-validated')) !!}
                            <div class="row">
                                <div class="col">
                                    <label for="uname" class="form-label">Nombre:</label>
                                    <input type="text" class="form-control" id="nombre" placeholder="Ingrese su nombre" name="nombre" required>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Por favor, rellene este campo.</div>
                                </div>
                                <div class="col">
                                    <label for="correo" class="form-label">Correo electrónico:</label>
                                    <input type="email" class="form-control" id="email" placeholder="admin@gmail.com" name="email" required>
                                    <div class="valid-feedback">Válido.</div>
                                    <div class="invalid-feedback">Por favor, rellene este campo con un correo electrónico válido.</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="apellido_paterno" class="form-label">Apellido Paterno:</label>
                                    <input type="text" class="form-control" id="primer_apellido" placeholder="Apellido paterno" name="primer_apellido" required>
                                    <div class="valid-feedback">Válido.</div>
                                    <div class="invalid-feedback">Por favor, rellene este campo.</div>
                                </div>
                                <div class="col">
                                    <label for="carnet" class="form-label">Carnet:</label>
                                    <input type="number" class="form-control" id="carnet" placeholder="Carnet" name="carnet" required>
                                    <div class="valid-feedback">Válido.</div>
                                    <div class="invalid-feedback">Por favor, rellene este campo con un número de carnet válido.</div>
                                </div>
                                <div class="col">
                                    <label for="telefono" class="form-label">Teléfono:</label>
                                    <input type="number" class="form-control" id="telefono" placeholder="Teléfono" name="telefono">
                                    <div class="valid-feedback">Válido.</div>
                                    <div class="invalid-feedback">Por favor, rellene este campo con un número de teléfono válido.</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="apellido_materno" class="form-label">Apellido Materno:</label>
                                    <input type="text" class="form-control" id="segundo_apellido" placeholder="Apellido materno" name="segundo_apellido">
                                    <div class="valid-feedback">Válido.</div>
                                    <div class="invalid-feedback">Por favor, rellene este campo.</div>
                                </div>
                                <div class="col">
                                    <label for="cargo" class="form-label">Cargo:</label>
                                    <input type="text" class="form-control" id="cargo" placeholder="cargo" name="cargo">
                                    <div class="valid-feedback">Valido.</div>
                                    <div class="invalid-feedback">Por favor, rellene este campo.</div>
                                </div>
                                <div class="col">
                                    <label for="uname" class="form-label">Direccion:</label>
                                    <input type="text" class="form-control" id="direccion" placeholder="dieccion" name="direccion">
                                    <div class="valid-feedback">Valido.</div>
                                    <div class="invalid-feedback">Por favor, rellene este campo.</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="pwd" class="form-label">Password:</label>
                                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
                                    <div class="valid-feedback">Valido.</div>
                                    <div class="invalid-feedback">Por favor, rellene este campo.</div>
                                </div>
                                <div class="col">
                                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Subir Imagen</label>
                                    <div class='flex items-center justify-center w-full'>
                                        <label><input name="imagen" id="imagen" type='file' class="hidden" /></label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="{{ route('clientes.index') }}" class="btn btn-primary">Cancelar</a>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
