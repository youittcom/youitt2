<?php
session_start();
require_once '../models/cliente.php';
require_once '../config/paramtetros.php';
require_once '../models/sesionesclientes.php';
class despensaController{

    public function index(){
        //require_once './lyouts/headercliente.html';
        //require_once './lyouts/lateralcliente.html';
        require_once 'views/despensa/index.php';
    }
}