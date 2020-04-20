<?php
session_start();
?>
<div id="cabecera_listado_productos">
    <h2>Alta Producto</h2>
</div>
<div id="botones_productos">
    <a class="boton" href="<? echo base_url_back;?>producto/index">Atrás</a>
</div>
<div>
    <!-- falta implementar por JS la comprobación de los campos del formulario -->
    <form action="<? echo base_url_back;?>producto/altaProducto" method="post">
        <label>Codigo Barras</label>
        <input type="text" name="codigo_barras">
        <label>Nombre</label>
        <input type="text" name="nombre_producto">
        <select name="categoria">
            <option value="aceite">Aceites</option>
            <option value="aperitivos">Aperitivos</option>
            <option value="arroces">Arroces</option>
            <option value="bebidas">Bebidas</option>
            <option value="caldos">Caldos</option>
            <option value="pastas">Pastas</option>
            <option value="salsas">Salsas</option>
        </select>
        <label>Cantidad Recipiente</label>
        <input type="text" name="cantidad_recipiente">
        <label>Medida</label>
        <select name="medida">
            <option value="l">litros</option>
            <option value="g">Gramos</option>
        </select>
        <input type="submit" name="guardar">
    </form>

</div>
