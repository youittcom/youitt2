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
        <label>Cantidad Recipiente</label>
        <input type="text" name="cantidad_recipiente">
        <input type="submit" name="guardar">
    </form>

</div>
