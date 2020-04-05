<?php
require_once '../models/usuario.php';
require_once '../models/sesionesusuarios.php';
require_once '../config/paramtetros.php';
class usuarioController{

    public function index(){
        require_once 'views/usuario/index.php';
    }

    public function registro(){
        require_once 'views/usuario/registro.php';
    }

    public function save(){
        if(isset($_POST)){
            var_dump($_POST);
        }

    }
    public function login(){
        if($_POST){
            $usuario = new usuario();
            $usuario->setEmail($_POST['email']);
            $usuario = $usuario->getUserByEmail();
            $verificacion_password = password_verify($_POST['password'],$usuario['password_hash']);
            if($verificacion_password){
                unset($usuario['password_hash']);
                $_SESSION['usuario'] = $usuario;
                $this->registroLogIn($usuario);
                require_once 'views/usuario/index.php';
            }else{
                header('Location:'.base_url_back);
            }
        }else{
            header('Location:'.base_url_back);
        }
    }
    public function registroLogIn($usuario){
        $sesion = new sesionesusuarios();
        $sesion->setIdUsuario($usuario['id']);
        $sesion->setEmailUsuario($usuario['email']);
        $sesion->sesionRegister();
        $_SESSION['usuario']['id_sesion'] = $sesion->getId();
    }
    public function logOut(){
        $sesion = new sesionesusuarios();
        $sesion->setId($_SESSION['usuario']['id_sesion']);
        $sesion->sesionRegisterLogOut();
        header('Location:'.base_url_back);
    }
}