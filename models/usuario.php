<?php
require_once '../config/db.php';

class  usuario{

    private $id;
    private $email;
    private $rol_id;
    private $password_hash;
    private $date_register;
    private $date_out;
    private $estado;
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getRolId()
    {
        return $this->rol_id;
    }

    public function getPasswordHash()
    {
        return $this->password_hash;
    }

    public function getDateRegister()
    {
        return $this->date_register;
    }

    public function getDateOut()
    {
        return $this->date_out;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function setRolId($rol_id): void
    {
        $this->rol_id = $rol_id;
    }

    public function setPasswordHash($password_hash): void
    {
        $this->password_hash = password_hash($this->db->real_escape_string($password_hash),PASSWORD_BCRYPT,['cost'=>4]);
    }

    public function setDateRegister($date_register): void
    {
        $this->date_register = $date_register;
    }

    public function setDateOut($date_out): void
    {
        $this->date_out = $date_out;
    }

    public function setEstado($estado): void
    {
        $this->estado = $estado;
    }

    public function getAdmin(){
        $sql = "SELECT * FROM usuarios WHERE rol_id= '1'";
        $query = $this->db->query($sql);
        if($query != null && $query->num_rows == 1){
            $admin = mysqli_fetch_assoc($query);
            return $admin;
        }else{
            return false;
        }
    }
    public function resgistro(){
        $admin = $this->getAdmin();

        $sql = 0;
    }

    public function save(){
        $sql = "INSERT INTO usuarios VALUES(null,'{$this->getEmail()}','{$this->getPasswordHash()}','2',CURRENT_TIMESTAMP(),'null','1')";
        $query = $this->db->query($sql);
        if($query){
            return true;
        }else{
            return false;
        }
    }
    public function getUserByEmail(){
        $sql = "SELECT * FROM usuarios WHERE email = '{$this->getEmail()}';";
        $query = $this->db->query($sql);
        if($query != null && $query->num_rows == 1){
            $usuario = mysqli_fetch_assoc($query);
            return $usuario;
        }else{
            return false;
        }
    }
}