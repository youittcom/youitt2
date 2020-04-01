<?php
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
}