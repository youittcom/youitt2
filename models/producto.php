<?php
require_once '../config/db.php';
class producto{

    private $id;
    private $codigo_barras;
    private $nombre;
    private $cantidad_recipiente;
    private $medida;
    private $categoria;
    private $fecha_alta;
    private $fecha_baja;
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCodigoBarras()
    {
        return $this->codigo_barras;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getCantidadRecipiente()
    {
        return $this->cantidad_recipiente;
    }

    public function getMedida(){
        return $this->medida;
    }

    public function getCategoria(){
        return $this->categoria;
    }

    public function getFechaAlta()
    {
        return $this->fecha_alta;
    }

    public function getFechaBaja()
    {
        return $this->fecha_baja;
    }
    
    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setCodigoBarras($codigo_barras): void
    {
        $this->codigo_barras = $codigo_barras;
    }

    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    public function setCantidadRecipiente($cantidad_recipiente): void
    {
        $this->cantidad_recipiente = $cantidad_recipiente;
    }

    public function setMedida($medida){
        $this->medida = $medida;
    }
    public function setCategoria($categoria){
        $this->categoria = $categoria;
    }
    public function setFechaAlta($fecha_alta): void
    {
        $this->fecha_alta = $fecha_alta;
    }

    public function setFechaBaja($fecha_baja): void
    {
        $this->fecha_baja = $fecha_baja;
    }

    public function getAllProducts(){
        $sql = "SELECT * FROM productos";
        $query = $this->db->query($sql);
        $productos = array();
        $contador = 0;
        if($query->num_rows>0){
            while ($fila = $query->fetch_assoc()) {
                $productos[$contador] = $fila;
                $contador++;
            }
            return $productos;
        }
        return false;
    }

    public function save(){
        $sql = "INSERT INTO productos VALUES (null,'{$this->getCodigoBarras()}','{$this->getNombre()}','{$this->getCategoria()}','{$this->getCantidadRecipiente()}','{$this->getMedida()}',CURRENT_TIMESTAMP());";
        $query = $this->db->query($sql);
        if($query){
            return true;
        }else{
            return false;
        }
    }

    //query de un producto en concreto
    public function buscarProducto(){
        $sql = "SELECT * FROM productos WHERE codigo_barras = '{$this->getCodigoBarras()}';";
        $query = $this->db->query($sql);
        if($query != null && $query->num_rows == 1){
            return $query;
        }else{
            return false;
        }
    }

    public function buscarProductoPorCodigoBarras(){
        $sql = "SELECT * FROM productos WHERE codigo_barras = '{$this->getCodigoBarras()}';";
        $query = $this->db->query($sql);
        if($query != null && $query->num_rows == 1){
            return true;
        }else{
            return false;
        }
    }

}
