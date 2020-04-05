<?php
require_once '../config/paramtetros.php';
?>
<h1>
    REGISTRO backend
</h1>
<form action="<?php base_url_back;?>save" method="post">
    <label for="email">Email</label>
    <input type="email" name="email" required/>

    <label for="password">Password</label>
    <input type="password" name="password" required/>

    <input type="submit" name="registro" value="registrarse">
</form>
