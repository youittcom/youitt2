<?php
class clienteController{

    public function index(){
        require_once 'views/cliente/index.php';
    }

    public function registro(){
        if(isset($_POST)){
            var_dump($_POST);
        }
    }

    public function save(){
        if(isset($_POST)){
            var_dump($_POST);
        }

    }
}
