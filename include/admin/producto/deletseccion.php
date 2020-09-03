<?php
 include '../../conexion.php';
    if (isset($_GET['codigoseccion'])) {
        $codigoseccion = $_GET['codigoseccion'];
        $resultado= $bd->query("delete FROM seccion WHERE codigoseccion = '$codigoseccion'");     
        header('location: ../../../admin/editproductos.php');
        
    }   