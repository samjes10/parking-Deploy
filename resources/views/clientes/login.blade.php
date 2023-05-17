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
            <form class ="was-validated">
                <div class="field">
                    <span class="fa fa-lock"></span>
                    <input type="rol" class="rol" rerequired placeholder="rol" required>
                </div>
                <div class="field space">
                    <span class="fa fa-lock"></span>
                    <input type="password" class="password" required placeholder="Ingrese su carnet" required>

                </div>
                <div class="pass">
                    <a href="#">Olvido su Contraseña?</a>
                </div>
                <div class="field">
                    <input type="submit" value="INICIAR">
                </div>
                <div class="login">O inicia con</div>
                <div class="link">
                    <div class="facebook">
                        <i class="fab fa-facebook-f"><span>Facebook</span></i>
                    </div>
                    <div class="instagram">
                        <i class="fab fa-instagram"><span>Google</span></i>
                    </div>
                </div>
                <div class="signup">Eres nuevo?
                    <a href="#">Crear cuenta</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>