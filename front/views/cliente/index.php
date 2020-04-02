<?php
session_start();
if(isset($_SESSION['cliente'])){
    print_r( $_SESSION['cliente']);
}else{
    header('Location:index.php');
}