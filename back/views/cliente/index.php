<?php
session_start();
if(isset($_SESSION['usuario'])):?>
<div><form action="<?php base_url_back;?>/cliente/buscarCliente" method="post">
        <label>email</label>
        <input type="email" name="email">
        <label>Telefono</label>
        <input type="text" name="telefono">
        <label>Número de Cliente</label>
        <input type="text" name="id_cliente">
        <label>Identificador Despensa</label>
        <input type="text" name="id_despensa">
        <input type="submit" value="Buscar">
    </form></div>
<?php else:?>
    <div> error </div>
 <?php endif;?>