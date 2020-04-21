<?php
require_once '../config/db.php';
class productosclientes{

    private $id;
    private $id_cliente;
    private $id_despensa;
    private $codigo_producto;
    private $cantidad_actual;
    private $nombre_producto;
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }
    public function getId()
    {
        return $this->id;
    }
    public function getIdCliente()
    {
        return $this->id_cliente;
    }

    public function getIdDespensa()
    {
        return $this->id_despensa;
    }

    public function getCodigoProducto()
    {
        return $this->codigo_producto;
    }

    public function getCantidadActual()
    {
        return $this->cantidad_actual;
    }

    public function getNombreProducto()
    {
        return $this->nombre_producto;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setIdCliente($id_cliente): void
    {
        $this->id_cliente = $id_cliente;
    }

    public function setIdDespensa($id_despensa): void
    {
        $this->id_despensa = $id_despensa;
    }

    public function setCodigoProducto($codigo_producto): void
    {
        $this->codigo_producto = $codigo_producto;
    }

    public function setCantidadActual($cantidad_actual): void
    {
        $this->cantidad_actual = $cantidad_actual;
    }

    public function setNombreProducto($nombre_producto): void
    {
        $this->nombre_producto = $nombre_producto;
    }

    //buscamos si un cliente tiene asociado un producto con ese codigo de barras
    public function esProductoCliente(){
        $sql = "SELECT * FROM productos_clientes WHERE id_cliente = '{$this->getIdCliente()}' AND codigo_producto = '{$this->getCodigoProducto()}';";
        $query = $this->db->query($sql);
        if($query != null && $query->num_rows == 1){
            return $query;
        }else{
            return false;
        }
    }

    //añadimos un producto a un cliente que antes no tenía ese producto en su despensa
    public function aniadirProductoAunCliente(){
        $sql = "INSERT INTO productos_clientes VALUES (null,'{$this->getIdCliente()}','{$this->getIdDespensa()}','{$this->getCodigoProducto()}','{$this->getCantidadActual()}','{$this->getNombreProducto()}');";
        $query = $this->db->query($sql);
        if($query){
            return true;
        }else{
            return false;
        }
    }

    //actualizamos el peso de un producto
    public function actualizarPeso($cantidad_actual,$codigo_producto,$id_cliente){
        $sql = "UPDATE productos_clientes SET cantidad_actual = '$cantidad_actual' WHERE id_cliente = '$id_cliente' AND codigo_producto = '$codigo_producto'";
        $query = $this->db->query($sql);
        if($query){
            return true;
        }else{
            return false;
        }
    }

    public function obtenerProductosDeUnCliente(){
        $sql = "SELECT * FROM productos_clientes WHERE id_cliente = '{$this->getIdCliente()}';";
        $query = $this->db->query($sql);
        $productos = array();
        $contador = 0;
        if($query->num_rows > 0){
            while ($fila = $query->fetch_assoc()) {
                $productos[$contador] = $fila;
                $contador++;
            }
            return $productos;
        }
        return false;
    }
}
