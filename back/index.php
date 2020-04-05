<?php
require_once '../autoload.php';
if(isset($_SESSION['usuario'])){
    require_once './lyouts/headerusuario.html';
    require_once './lyouts/lateralcliente.html';
}
if(isset($_GET['controller'])){
    $name_controller = $_GET['controller'].'Controller';
    if(class_exists($name_controller)){
        $controller = new $name_controller();
        if(isset($_GET['action']) && method_exists($controller,$_GET['action'])){
            if($name_controller != 'registro'){
                require_once './lyouts/headerusuario.html';
                require_once './lyouts/lateralusuario.html';
                $action = $_GET['action'];
                $controller->$action();
                require_once './lyouts/footerusuario.html';
            }else{
                $action = $_GET['action'];
                $controller->$action();
            }
        }else{
            require_once 'login.php';
        }
    }else{
        require_once 'login.php';
    }
}else{
    require_once 'login.php';
}
