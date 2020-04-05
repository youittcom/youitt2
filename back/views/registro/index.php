<?php
require_once '../config/paramtetros.php';
echo 'formulario de registro de usuarios';
?>
<form action="<?php base_url_back?>/registro/registro" method="post">
    <label>Email</label>
    <input type="email" name="email">
    <label>Contraseña</label>
    <input type="password" name="password_usuario">
    <label>Contraseña Administrador</label>
    <input type="password" name="password_root">
    <input type="submit" value="registrat">
</form>
