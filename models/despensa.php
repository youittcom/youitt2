<?php
require_once '../config/db.php';

class despensa{
    private $id;
    private $id_cliente;
    private $estado;
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

    public function getIdCliente()
    {
        return $this->id_cliente;
    }

    public function getEstado()
    {
        return $this->estado;
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

    public function setIdCliente($id_cliente): void
    {
        $this->id_cliente = $id_cliente;
    }

    public function setEstado($estado): void
    {
        $this->estado = $estado;
    }

    public function setFechaAlta($fecha_alta): void
    {
        $this->fecha_alta = $fecha_alta;
    }

    public function setFechaBaja($fecha_baja): void
    {
        $this->fecha_baja = $fecha_baja;
    }

    public function save(){
        $sql = "INSERT INTO despensas VALUES (null,'{$this->getIdCliente()}',0,CURRENT_TIMESTAMP (),null);";
        $query = $this->db->query($sql);
        if($query){
            return true;
        }else{
            return false;
        }
    }

    public function getDespensaByIdCliente(){
        $sql = "SELECT * FROM despensas WHERE id_cliente='{$this->getIdCliente()}';";
        $query = $this->db->query($sql);
        if($query->num_rows == 1){
            return $query;
        }else{
            return false;
        }
    }
}