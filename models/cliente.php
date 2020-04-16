<?php
require_once '../config/db.php';
class cliente{

    private $id;
    private $nombre;
    private $telefono;
    private $email;
    private $password_hash;
    private $date_register;
    private $date_out;
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function getEmail()
    {
        return $this->email;
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
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNombre($nombre){

        $this->nombre = $this->db->real_escape_string($nombre);
    }

    public function setTelefono($telefono): void
    {
        $this->telefono = $telefono;
    }

    public function setEmail($email)
    {
        $this->email = $this->db->real_escape_string($email);
    }

    public function setPasswordHash($password_hash)
    {
        $this->password_hash = password_hash($this->db->real_escape_string($password_hash),PASSWORD_BCRYPT,['cost'=>4]);;
    }

    public function setDateRegister($date_register)
    {
        $this->date_register = $date_register;
    }

    public function setDateOut($date_out)
    {
        $this->date_out = $date_out;
    }

    public function save(){

        $sql = "INSERT INTO clientes VALUES(null,'{$this->getNombre()}','{$this->getTelefono()}','{$this->getEmail()}','{$this->getPasswordHash()}',CURRENT_TIMESTAMP(),null,null)";
        $save = $this->db->query($sql);
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

    public function login(){

        //primero verificamos el email

    }
    /*
     * busqueda del cliente por email
     */
    public function findClientByEmail($email){

        $sql = "SELECT * FROM clientes WHERE email='{$email}';";
        $query = $this->db->query($sql);
        if($query->num_rows == 1){
            return $query;
        }else{
            return false;
        }
    }
    /*
     * actualizamos el id_despensa de un cliente
     */
    public function updateIdDespensa($despensa_id,$id_cliente){
        $sql = "UPDATE clientes SET id_despensa= '$despensa_id' WHERE id = '$id_cliente';";
        $query = $this->db->query($sql);
        if($query){
            return true;
        }else{
            return false;
        }
    }
}
