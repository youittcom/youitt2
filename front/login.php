<?php
require_once '../config/paramtetros.php';
?>
<!DOCTYPE HTML>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/estilosfront.css">
</head>
<body>
<div>
    <div><h1>INICIAR SESION</h1></div>
    <form action="<?php base_url_front;?>" method="post">
        <label>email</label>
        <input type="email">
        <label>password</label>
        <input type="password">
        <input type="submit">
    </form>
</div>
<div>
    <div><h1>REGISTRARSE</h1></div>
    <form action="<?php base_url_front;?>cliente/registro" method="post">
        <label>nombre</label>
        <input type="text" name="nombre"/>
        <label>email</label>
        <input type="email" name="email"/>
        <label>password</label>
        <input type="password" name="password"/>
        <input type="submit">
    </form>
</div>
</body>
</html>