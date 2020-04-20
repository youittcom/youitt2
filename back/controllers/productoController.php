<?php
session_start();
require_once '../models/producto.php';
require_once '../config/paramtetros.php';
class productoController{

    public function index(){
        $productos_youitt = false;
        $productos = new producto();
        $productos_youitt = $productos->getAllProducts();
        require_once './views/producto/index.php';
    }
    /*
     * Damos de alta un producto via formulario desde
     * el panel de administración en BBDD.Si ha hido bien
     * redirigimos al index de productos, si no, de nuevo
     * al formulario
     */
    public function altaProducto(){
        if(isset($_POST)){
            if($_POST != null){
                $codigo_barras = $_POST['codigo_barras'];
                $nombre = $_POST['nombre_producto'];
                $cantidad = $_POST['cantidad_recipiente'];
                $medida = $_POST['medida'];
                $categoria = $_POST['categoria'];
                $producto = new producto();
                $producto->setCodigoBarras($codigo_barras);
                $producto->setNombre($nombre);
                $producto->setCantidadRecipiente($cantidad);
                $producto->setMedida($medida);
                $producto->setCategoria($categoria);
                if(!$producto->buscarProductoPorCodigoBarras()){
                    $producto->save();
                    $this->index();
                }else{
                    echo "el producto ya existe";
                }
            }
        }
        require_once './views/producto/altaProducto.php';

    }


}