<?php
session_start();
require_once '../models/cliente.php';
require_once '../config/paramtetros.php';
require_once '../models/sesionesclientes.php';
require_once '../models/productosclientes.php';
require_once '../models/producto.php';
class despensaController{

    public function index(){
        //buscamos todos los productos que tenga el cliente
        $productos = new productosclientes();
        $productos->setIdCliente($_SESSION['cliente']['id']);
        $productos_cliente = $productos->obtenerProductosDeUnCliente();
        for($i=0;$i<count($productos_cliente);$i++){
            $productos_cliente[$i]['cantidad_recipiente']=0;
        }
        $i=0;
        foreach ($productos_cliente as $producto_cliente){
            $producto = new producto();
            $producto->setCodigoBarras($producto_cliente['codigo_producto']);
            $producto = $producto->buscarProducto();
            $producto = $producto->fetch_assoc();
            $productos_cliente[$i]['cantidad_recipiente'] = $producto['cantidad_recipiente'];
            $i++;
            //array_push($producto_cliente,$producto['cantidad_recipiente']);
        }
        require_once 'views/despensa/index.php';
    }
}