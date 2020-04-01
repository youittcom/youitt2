<?php
require_once '../autoload.php';
if(isset($_GET['controller'])){
    $name_controller = $_GET['controller'].'Controller';
}else{
    require_once 'login.php';
}
if(class_exists($name_controller)){
    $controller = new $name_controller();
    if(isset($_GET['action']) && method_exists($controller,$_GET['action'])){
        $action = $_GET['action'];
        $controller->$action();
    }else{
        require_once 'login.php';
    }
}else{
    require_once 'login.php';
}

