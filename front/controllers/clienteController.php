<?php
session_start();
require_once '../models/cliente.php';
require_once '../config/paramtetros.php';
require_once '../models/sesionesclientes.php';
class clienteController{

    public function index(){
        require_once 'views/cliente/index.php';
    }

    public function save(){
        if(isset($_POST)){
            $cliente = new cliente();
            $cliente->setNombre($_POST['nombre']);
            $cliente->setEmail($_POST['email']);
            $cliente->setPasswordHash($_POST['password']);
            //guardamos los datos
            $save = $cliente->save();
            if($save){
                header('Location:'.base_url_front);
            }else{
                echo "error en el registro";
            }
        }

    }
    public function login(){
        if(isset($_POST)){
            $cliente = new cliente();
            $cliente->setEmail($_POST['email']);
            $cliente_ok = $cliente->findClientByEmail($cliente->getEmail());
            if($cliente_ok){
                $cliente_ok = mysqli_fetch_assoc($cliente_ok);
                $password_hash = $cliente_ok['password_hash'];
                $password_ok = password_verify($_POST['password'],$password_hash);
                if($password_ok){
                    //iniciamos sesion
                    unset($cliente_ok['password_hash']);
                    $_SESSION['cliente'] = $cliente_ok;
                    $this->registroLogIn($cliente_ok);
                    require_once 'views/cliente/index.php';
                }else{
                    //devolver error de password
                }
            }else{
                //devolver error de email
                header('Location:'.base_url_front);
            }
        }
    }
    public function registroLogIn($cliente_ok){
        $sesion = new sesionesclientes();
        $sesion->setIdCliente($cliente_ok['id']);
        $sesion->setEmailCliente($cliente_ok['email']);
        $sesion->sesionRegister();
        $_SESSION['cliente']['id_sesion'] = $sesion->getId();
    }
    public function logOut(){
        $sesion = new sesionesclientes();
        $sesion->setId($_SESSION['cliente']['id_sesion']);
        $sesion->sesionRegisterLogOut();
        header('Location:'.base_url_front);
    }
}
