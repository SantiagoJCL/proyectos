<?php
 include '../../conexion.php'; 
if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'] ; 
    $resultado = $bd->query(" SELECT * FROM vacunacion, mascota  where '$codigo' = codigo and mascotacodigo = codigomascota  ");
    if(mysqli_num_rows($resultado)){
      $fila = mysqli_fetch_array($resultado);
      $clientecodigo = $fila['clientecodigo']; 
    }

    $resultado = $bd->query("DELETE from vacunacion where '$codigo' = codigo ");
    
  
 
 
    header('location: ../../../admin/mostrarregistro.php?codigocliente='. $clientecodigo );
 

}



?>