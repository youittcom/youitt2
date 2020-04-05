<?php
require_once '../config/db.php';
class sesionesusuarios{

    private $id;
    private $id_usuario;
    private $email_usuario;
    private $log_in;
    private $log_out;
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    public function getEmailUsuario()
    {
        return $this->email_usuario;
    }

    public function getLogIn()
    {
        return $this->log_in;
    }

    public function getLogOut()
    {
        return $this->log_out;
    }

    public function getDb(): mysqli
    {
        return $this->db;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setIdUsuario($id_usuario): void
    {
        $this->id_usuario = $id_usuario;
    }

    public function setEmailUsuario($email_usuario): void
    {
        $this->email_usuario = $email_usuario;
    }

    public function setLogIn($log_in): void
    {
        $this->log_in = $log_in;
    }

    public function setLogOut($log_out): void
    {
        $this->log_out = $log_out;
    }

    public function setDb(mysqli $db): void
    {
        $this->db = $db;
    }

    public function sesionRegister(){

        $sql = "INSERT INTO sesiones_usuarios VALUES (null,'{$this->id_usuario}','{$this->email_usuario}',CURRENT_TIMESTAMP(),NULL);";
        $query = $this->db->query($sql);
        if($query){
            $this->getIdSession();
            if($this->id != null){
                return true;
            }
        }
        return false;
    }

    public function sesionRegisterLogOut(){
        $sql = "UPDATE sesiones_usuarios SET log_out = CURRENT_TIMESTAMP () WHERE id = '{$this->id}'";
        $query = $this->db->query($sql);
        unset($_SESSION['usuario']);
        session_destroy();
    }

    public function getIdSession(){
        $slq = "SELECT * FROM sesiones_usuarios WHERE id_usuario = '{$this->id_usuario}' AND email_usuario = '{$this->email_usuario}' order by id DESC limit 1;";
        $query = $this->db->query($slq);
        if($query != null && $query->num_rows == 1) {
            $sesion = mysqli_fetch_assoc($query);
            $this->setId($sesion['id']);
        }else{
            $this->id = null;
        }
    }
}
