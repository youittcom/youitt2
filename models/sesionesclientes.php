<?php
require_once '../config/db.php';
class sesionesclientes{

    private $id;
    private $id_cliente;
    private $email_cliente;
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

    public function getIdCliente()
    {
        return $this->id_cliente;
    }

    public function getEmailCliente()
    {
        return $this->email_cliente;
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

    public function setIdCliente($id_cliente): void
    {
        $this->id_cliente = $id_cliente;
    }

    public function setEmailCliente($email_cliente): void
    {
        $this->email_cliente = $email_cliente;
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

        $sql = "INSERT INTO sesiones_clientes VALUES (null,'{$this->id_cliente}','{$this->email_cliente}',CURRENT_TIMESTAMP(),NULL);";
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
        $sql = "UPDATE sesiones_clientes SET log_out = CURRENT_TIMESTAMP () WHERE id = '{$this->id}'";
        $query = $this->db->query($sql);
        unset($_SESSION['cliente']);
        session_destroy();
    }

    public function getIdSession(){
        $slq = "SELECT * FROM sesiones_clientes WHERE id_cliente = '{$this->id_cliente}' AND email_cliente = '{$this->email_cliente}' order by id DESC limit 1;";
        $query = $this->db->query($slq);
        if($query != null && $query->num_rows == 1) {
            $sesion = mysqli_fetch_assoc($query);
            $this->setId($sesion['id']);
        }else{
            $this->id = null;
        }
    }
}
