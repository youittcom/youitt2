<?php
session_start();
require_once '../config/paramtetros.php';
require_once '../autoload.php';
require_once '../config/db.php';
require_once '../autoload.php';

if(isset($_GET['controller'])){
    $name_controller = $_GET['controller'].'Controller';
    if(class_exists($name_controller)){
        $controller = new $name_controller();
        if(isset($_GET['action']) && method_exists($controller,$_GET['action'])){
            $action = $_GET['action'];
            if($name_controller != 'registro' && $action != 'logOut'){
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
