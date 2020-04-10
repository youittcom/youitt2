<?php
session_start();
?>
<div id="cabecera_listado_productos">
    <h2>Productos cargados en el Sistema</h2>

</div>
<div id="botones_productos">
    <a class="boton" href="<? echo base_url_back;?>producto/altaProducto">Alta Producto</a>
    <a class="boton" href="http://laweb.com" target="_blank">Baja Producto</a>
</div>
<div>
    <table id="tabla_productos">
        <tr id="fila_tabla_productos">
            <th id="columna_0" scope="col">Id Producto</th>
            <th id="columna_1" scope="col">Codigo Barras</th>
            <th id="columna_2" scope="col">Nombre Producto</th>
            <th id="columna_3" scope="col">Cantidad Recipiente</th>
        </tr>
        <?php
        for($i=0;$i<count($productos_youitt);$i++){
            echo '<tr id="fila_tabla_productos">';
                    echo '<td id="columna_0">'.$productos_youitt[$i]['id'].'</td>';
                    echo '<td id="columna_1">'.$productos_youitt[$i]['codigo_barras'].'</td>';
                    echo '<td id="columna_2">'.$productos_youitt[$i]['nombre'].'</td>';
                    echo '<td id="columna_3">'.$productos_youitt[$i]['cantidad_recipiente'].'</td>';
            echo '</tr>';
        }?>

    </table>

</div>