<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parking</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/loginCliente.css') }}">

</head>
<body>
    <div class="bg-img">
        <div class="content">
            <header>Bienvenidos al Sistema de Parking</header>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger p-0">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                <div class="field">
                    <span class="fa fa-lock"></span>
                    <input aria-describedby="emailHelpBlock" id="email" type="email"
                           class="email{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                           placeholder="Introdusca su correo" tabindex="1"
                           value="{{ (Cookie::get('email') !== null) ? Cookie::get('email') : old('email') }}" autofocus
                           required>
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                </div>
                <div class="field space">
                    <span class="fa fa-lock"></span>
                    <input aria-describedby="passwordHelpBlock" id="password" type="password"
                           value="{{ (Cookie::get('password') !== null) ? Cookie::get('password') : null }}"
                           placeholder="Introdusca su contraseña"
                           class="password{{ $errors->has('password') ? ' is-invalid': '' }}" name="password"
                           tabindex="2" required>
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3"
                               id="remember"{{ (Cookie::get('remember') !== null) ? 'checked' : '' }}>
                        <label class="custom-control-label" for="remember">Remember Me</label>
                    </div>
                </div>
                <div class="pass">
                    <a href="{{ route('password.request') }}" class="text-small">Olvido su Contraseña?</a>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        INICIAR
                    </button>
                </div>

                <div class="signup">Eres nuevo?
                    <a href="#">Crear cuenta</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
