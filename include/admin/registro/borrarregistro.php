<?php  
  include '../../conexion.php'; 
    if (isset($_GET['codigocliente'])) {
        $codigocliente = $_GET['codigocliente'];
        $resultado = $bd->query("DELETE From cliente where codigocliente =  ' $codigocliente' ");
        header('location: ../../../admin/nuevoregistro.php');
    }

?>