<?php
require_once '../config/paramtetros.php';
?>
<!DOCTYPE HTML>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/estilosfront.css">
    <title>Youitt2</title>
    <!-- ==================================
     PLUGINS CSS
     ======================================-->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/454431ce79.js" crossorigin="anonymous"></script>
</head>
<body>
<!-- ========= LOGO ======-->
<div class="container-fluid">
    <h3 class="text-center py-3">LOGO</h3>
</div>
<div class="d-flex justify-content-center text-center">
        <form class="p-5 bg-light" action="<?php base_url_front;?>cliente/login" method="post">
            <p>INICIAR SESION</p>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" placeholder="Enter email" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" placeholder="Enter password" id="pwd" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
        </form>
</div>
<div class="d-flex justify-content-center text-center">
    <form class="p-5 bg-light" action="<?php base_url_front;?>cliente/save" method="post">
        <p>REGISTRARSE</p>
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre">
        </div>
        <div class="form-group">
            <label for="telefono">Telefono:</label>
            <input type="text" class="form-control" id="telefono" name="telefono">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Registro</button>
    </form>
</div>
</body>
</html>