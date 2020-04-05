<?php
session_start();
require_once '../autoload.php';
require_once '../config/db.php';
function showError(){
    $error = new errorController();
    $error->index();
}

if(isset($_GET['controller'])){
    $name_controller = $_GET['controller'].'Controller';
    if(class_exists($name_controller)){
        $controller = new $name_controller();
        if(isset($_GET['action']) && method_exists($controller,$_GET['action'])){
            if($_GET['action'] != 'logout'){
                require_once './lyouts/headercliente.html';
                require_once './lyouts/lateralcliente.html';
            }
            $action = $_GET['action'];
            $controller->$action();
        }else{
            showError();
        }
    }else{
        showError();
    }
    require_once './lyouts/footercliente.html';
}else{
    require_once 'login.php';
}


