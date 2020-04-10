<?php
require_once '../config/db.php';
class producto{

    private $id;
    private $codigo_barras;
    private $nombre;
    private $cantidad_recipiente;
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
        $sql = "INSERT INTO productos VALUES (null,'{$this->getCodigoBarras()}','{$this->getNombre()}','{$this->getCantidadRecipiente()}',CURRENT_TIMESTAMP());";
        $query = $this->db->query($sql);
        if($query){
            return true;
        }else{
            return false;
        }
    }

}
