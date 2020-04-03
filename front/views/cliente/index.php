<?php
session_start();
if(isset($_SESSION['cliente'])){?>
    <?php //print_r( $_SESSION['cliente']);?>
    <?php require_once './lyouts/headercliente.html';?>
    <div id="header_cliente">
        <div id="nombre_cliente">
        <p>BIENVENIDO <?PHP echo $_SESSION['cliente']['nombre']?></p>
        </div>
        <div id="cerrar_sesion_cliente">
            <a>cerrar sesion</a>
        </div>
    </div>
    <div class="clearFix"></div>
    <div id="lateral_cliente">
        <ul>
            <li>opcion1</li>
            <li>opcion2</li>
            <li>opcion3</li>
        </ul>
    </div>
    <div id="body_cliente">
        contenido cfbdbg dkfvh ñeiovñk d ñiñiod gñod ño dñ kdañf
    </div>
    <?php require_once './lyouts/footercliente.html';?>
<?php }else{
    header('Location:index.php');
}?>