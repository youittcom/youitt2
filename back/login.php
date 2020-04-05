<?php
require_once '../config/paramtetros.php';
?>
<!DOCTYPE HTML>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/estilosback.css">
</head>
<body>
<div>
    <form action="<?php base_url_back;?>usuario/login" method="post">
        <label>email</label>
        <input type="email" name="email">
        <label>password</label>
        <input type="password" name="password">
        <input type="submit">
    </form>
</div>
<p>estas en el login del bac</p>
</body>
</html>