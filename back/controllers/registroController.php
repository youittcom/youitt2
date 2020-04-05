<?php
require_once '../config/paramtetros.php';
require_once '../models/usuario.php';
class registroController{

    public function index(){
        require_once 'views/registro/index.php';
    }

    public function registro(){
        if($_POST){
            $registro = new usuario();
            $admin = $registro->getAdmin();
            if(password_verify($_POST['password_root'],$admin['password_hash'])){
                //registramos al usuario

                $usuario = new usuario();
                $usuario->setEmail($_POST['email']);
                $usuario->setPasswordHash($_POST['password_usuario']);
                if($usuario->save()){
                    header('Location:'.base_url_back);
                }
            }
        }else{
            header('Location:'.base_url_back);
        }
    }
}