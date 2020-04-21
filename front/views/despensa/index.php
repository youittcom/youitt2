<?php
session_start();
echo "index de la despensa del cliente";?>
<div>
    <table id="tabla_productos">
        <tr id="fila_tabla_productos">
            <th id="columna_0" scope="col">Nombre Producto</th>
            <th id="columna_1" scope="col">Codigo del Producto </th>
            <th id="columna_2" scope="col">Cantidad actual</th>
            <th id="columna_3" scope="col">Cantidad Recipiente</th>
            <th id="columna_3" scope="col">Cuanto me Queda</th>
        </tr>
        <?php for($i=0;$i<count($productos_cliente);$i++){
            echo '<tr id="fila_tabla_productos">';
                    echo '<td id="columna_0">'.$productos_cliente[$i]['nombre_producto'].'</td>';
                    echo '<td id="columna_1">'.$productos_cliente[$i]['codigo_producto'].'</td>';
                    echo '<td id="columna_2">'.$productos_cliente[$i]['cantidad_actual'].'</td>';
                    echo '<td id="columna_3">'.$productos_cliente[$i]['cantidad_recipiente'].'</td>';
                    echo '<td id="columna_3">'.($productos_cliente[$i]['cantidad_actual']*100)/$productos_cliente[$i]['cantidad_recipiente'].' %</td>';
                    echo '<td><meter min="0" max='.$productos_cliente[$i]['cantidad_recipiente'].' 
                                     low='.(($productos_cliente[$i]['cantidad_recipiente']*25)/100).'
                                     high='.(($productos_cliente[$i]['cantidad_recipiente']*75)/100).'
                                     optimum='.$productos_cliente[$i]['cantidad_recipiente'].' 
                                     value='.$productos_cliente[$i]['cantidad_actual'].'></td>';
            echo '</tr>';
        }?>

    </table>
</div>