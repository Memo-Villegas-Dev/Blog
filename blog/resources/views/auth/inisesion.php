<?php

include '../layouts/main.php';

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/app.css">
    <title>[BLOGX]</title>
</head>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/">BLOGX</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" 
        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
        aria-expanded="false" aria-label="Intercambiar navegacion">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
            <?php if(true){ ?>
                <li class="nav-item">
                    <a href="/resources/views/publicaciones.php" class="nav-link">Mis publicaciones</a>
                </li>
            <?php } ?>
            </ul>
            <ul class="navbar-nav navbar-rigth">
                <li class="nav-item dropdown">
            <?php if(true){ ?>
                <button class="nav-link btn btn-link" type="button" onclick="app.view('inisesion')">Iniciar sesion</button>
            <?php }else{ ?>
                <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" 
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Nombre de usuario(PHP)</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <button class="dropdown-item" onclick="">Cerrar sesion</button>
                </div>
            <?php } ?>
                </li>
            </ul>
        </div>
    </nav>

<div class="container">
    <div class="card mt-5 w-50 mx-auto">
        <div class="card-body">
            <form action="" id="inisesionform">
                <div class="form-group">
                    <label for="email">Correo Electronico</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="psswd">Contraseña</label>
                    <input type="password" name="passwd" id="passwd" class="form-control">
                </div>
                <small id="error" class="form-text text-danger d-none mb-2">Los datos de inicio de sesion son incorrectos</small>
                <button class="btn btn-primary" type="submit">Iniciar</button>
            </form>
        </div>
    </div>
</div>

<script src="../../js/jquery.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/app.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        const isf = $("#inisesionform");
        isf.on("submit",function(e){
            e.preventDefault();
            e.stopPropagation();
            const datos = new FormData();
            datos.append("email",$("#email").val());
            datos.append("passwd",$("#passwd").val());
            datos.append("login",'');

            fetch(app.routes.login,{
                method : 'POST',
                body : datos
            })
            .then(response => response.json())
            .then(resp => {
                console.log("Resultado del response en el modulo de inicio de sesion : ",resp.r);
                if(resp.r !== false){
                    location.href = "../home.php";
                }else{
                    $("#error").removeClass("d-none");
                }
            }).catch(error => console.log("Error ->"+ error));
        });
    });
</script>

<footer>
    <small>"BLOX EXCEPCIONAL EN PHP | JS | CRUD"</small>
</footer>