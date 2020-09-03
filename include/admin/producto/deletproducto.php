<?php
include '../../conexion.php';
    if (isset($_GET['codigo'])) {
        $codigo = $_GET['codigo'];
        $resultado= $bd->query("delete  FROM producto WHERE codigo = '$codigo'");     
        header('location: ../../../admin/editproductos.php');
        
    }