<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/estilosfront.css">
    <title>Title</title>
</head>
<body id="body1_cliente">
<div id="header_cliente">
    <div id="nombre_cliente">
        <p>BIENVENIDO</p>
        <p><?php print_r($_SESSION['cliente']['id'])?></p>
    </div>
    <div id="cerrar_sesion_cliente">
        <a href="<? echo base_url_front;?>cliente/logOut">cerrar sesion</a>
    </div>
</div>
