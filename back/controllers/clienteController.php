<?php
session_start();
require_once '../models/cliente.php';
class clienteController{

    public function index(){
        require_once './views/cliente/index.php';
    }
    /*
     * busqueda de un cliente desde el panel
     * de administración (por email,telefono,id_cliente o id_despensa
     */
    public function buscarCliente(){
        if(isset($_POST)){
            $encontrado = false;
            $email = $_POST['email'];
            $telefono = $_POST['telefono'];
            $id_cliente = $_POST['id_cliente'];
            $id_despensa = $_POST['id_despensa'];
            $cliente =new cliente();
            if($email != ''){
                $cliente->setEmail($email);
                $datos_cliente= $cliente->findClientByEmail($email);
                if($datos_cliente){
                    $encontrado = true;
                    $datos_cliente = mysqli_fetch_assoc($datos_cliente);
                    $this->index();
                    $this->vistaCliente($datos_cliente);
                }
            }elseif($telefono != '' && $encontrado != true){

            }elseif($id_cliente != '' && $encontrado != true){

            }elseif($id_despensa != '' && $encontrado != true){

            }else{
                $this->index();
            }
        }
        //$this->index();
    }
    public function vistaCliente($datos_cliente){
        $datos_cliente = $datos_cliente;
        require_once './views/cliente/infocliente.php';
    }
}