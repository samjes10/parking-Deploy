<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="{{ asset('/css/reclamos.css') }}">
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
                        <div class="container contact-form">
                            <div class="contact-image">
                                <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact"/>
                            </div>
                            {!! Form::open(array('route' => 'reclamos.store','method'=>'POST', 'class' => 'was-validated')) !!}
                                <h3>Has tu reclamo o queja...!</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="txtName" class="form-control" placeholder="Ingrese su nombre *" value="" required/>
                                            <div class="valid-feedback">Valido.</div>
                                            <div class="invalid-feedback">Por favor, rellene este campo.</div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="txtAsunto" class="form-control" placeholder="Asunto *" value="" required/>
                                            <div class="valid-feedback">Valido.</div>
                                            <div class="invalid-feedback">Por favor, rellene este campo.</div>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" href="{{ route('reclamos.index') }}" name="btnSubmit" class="btnContact" value="Enviar reclamo" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <textarea name="txtMsg" class="form-control" placeholder="Escriba su reclamo *" style="width: 100%; height: 120px;" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection