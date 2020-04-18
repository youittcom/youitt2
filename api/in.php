<?php
require_once '../models/productosclientes.php';
require_once '../models/producto.php';
if(isset($_POST)){
    //chequeamos cada uno de los parametros recibidos
    $id_despensa = $_POST['id_despensa'];
    $id_cliente = $_POST['id_cliente'];
    $codigo_producto = $_POST['codigo_producto'];
    $nombre_producto = $_POST['nombre_producto'];
    $peso_in = $_POST['peso_in'];

    $producto_cliente = new productosclientes();
    $producto_cliente->setIdCliente($id_cliente);
    $producto_cliente->setIdDespensa($id_despensa);
    $producto_cliente->setCodigoProducto($codigo_producto);
    $es_producto_cliente = $producto_cliente->esProductoCliente();
    //si el cliente ya tiene el producto en su despensa
    if($es_producto_cliente){
        $producto_cliente_array = $es_producto_cliente->fetch_assoc();
        if($producto_cliente_array['cantidad_actual'] >= 0){
            $producto_cliente_array['cantidad_actual'] = $producto_cliente_array['cantidad_actual'] + $peso_in;
        }else{
            $producto_cliente_array['cantidad_actual'] = 0 + $peso_in;
        }
        $id_cliente = $producto_cliente_array['id_cliente'];
        $codigo_producto = $producto_cliente_array['codigo_producto'];
        $cantidad_actual = $producto_cliente_array['cantidad_actual'];
        if($producto_cliente->actualizarPeso($cantidad_actual,$codigo_producto,$id_cliente)){
            echo "producto actualizado";
        }else{
            echo "error al actualizar";
        }
        //si no lo tiene miramos en la tabla de todos los productos y lo se lo añadimos a su despensa
        //con el peso introducido
    }else{
        $producto_existe = new producto();
        $producto_existe->setCodigoBarras($codigo_producto);
        $producto_existe = $producto_existe->buscarProducto();
        //si el producto esta en la tabla de todos los producto, se lo añadimos al cliente
        if($producto_existe){
            $producto_existe = $producto_existe->fetch_assoc();//lo convertimos en un array
            $producto_cliente->setNombreProducto($producto_existe['nombre']);
            $producto_cliente->setCantidadActual($peso_in);
            if($producto_cliente->aniadirProductoAunCliente()){
                echo "producto nuevo";
            }else{
                echo "error";
            }
        }
    }
}
else{
    echo "error";
}
