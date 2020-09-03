<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>producto</title>
 
  <link rel="stylesheet" href="../estilo/css/headerFooter.css">
  <link rel="stylesheet" href="../estilo/css/producto.css">
 

  
</head>

 
<?php include '../../conexion.php';  ?>


<?php  
 
    if (isset($_GET['codigocliente'])) {
        $codigocliente = $_GET['codigocliente'];
        $resultado = $bd->query("SELECT *  From cliente where codigocliente =  '$codigocliente' ");
        if(mysqli_num_rows($resultado)){
          $fila = mysqli_fetch_array($resultado);
          $Propietario = $fila['propietario'];
          $Direccion = $fila['direccion']; 
          $Telefono = $fila['telefono'];
          $Usuario = $fila['usuarioc']; 
          $Contrasena = $fila['contrasenac'];
        }
       
      
         
        $resultado = $bd->query("SELECT *  From  mascota where   clientecodigo = '$codigocliente'  ");
        if(mysqli_num_rows($resultado)){
          $fila = mysqli_fetch_array($resultado);
          $Paciente = $fila['nombre'];
          $Raza = $fila['raza'];
          $sexo = $fila['sexo'];
          $Nacimiento = $fila['fechanacimiento']; 
          $codigomascota =  $fila['codigomascota'];
        }
      
       
    }

    if (isset($_POST['Actualizar'])) {
      $actualizarPropietario = $_POST['actualizarPropietario'];
      $actualizarDireccion = $_POST['actualizarDireccion']; 
      $actualizarTelefono = $_POST['actualizarTelefono'];
      $actualizarUsuario = $_POST['actualizarUsuario']; 
      $actualizarContrasena = $_POST['actualizarContrasena']; 
      
      $actualizarPaciente = $_POST['actualizarPaciente'];
      $actualizarRaza = $_POST['actualizarRaza'];
      $actualizarsexo = $_POST['actualizarSexo'];
      $actualizarNacimiento = $_POST['actualizarNacimiento']; 
      
     
    
      $resultado= $bd->query("UPDATE cliente set propietario = ' $actualizarPropietario', direccion ='$actualizarDireccion', telefono=' $actualizarTelefono', usuarioc ='$actualizarUsuario', contrasenac = ' $actualizarContrasena' where  codigocliente = '$codigocliente' ") ;
         
      $resultado= $bd->query("UPDATE mascota set nombre = '$actualizarPaciente', raza ='$actualizarRaza', sexo=' $actualizarsexo', fechanacimiento='$actualizarNacimiento' where    '$codigocliente' = clientecodigo ") ;
            
   
      header('location: ../../../admin/nuevoregistro.php');
    }

?>

  <body style="background-color: #FFE787;">
   
        
  <form action="editregistro.php?codigocliente=<?= $_GET['codigocliente']?>" method="post" class="form-group" > 
    <div class="card position-relative float-right  " style=" width: 900px; right:80px;bottom:65px;">
      <div class="card-header">Carnet de vacuna</div>
      <div class="card-body">
        <h5 class="card-title">Propietario:</h5>
        <input type="text" class="form-control" style="margin-bottom:10px;" name="actualizarPropietario"  VALUE="<?=$Propietario?>" required>
        <br>
        <h5 class="card-title">Direccion:</h5>
        <input type="text" class="form-control" style="margin-bottom:10px;" name="actualizarDireccion"  VALUE="<?=$Direccion?>" required>
        <br>
        <h5 class="card-title">Telefono:</h5>
        <input type="text" class="form-control" style="margin-bottom:10px;" name="actualizarTelefono"  VALUE="<?=$Telefono?>" required>
        <br>
        <h5 class="card-title">usuacuio</h5>
        <input type="text" class="form-control" style="margin-bottom:10px;" name="actualizarUsuario"  VALUE="<?=$Usuario?>" required>
        <br>
        <h5 class="card-title">contraseña</h5>
        <input type="text" class="form-control" style="margin-bottom:10px;" name="actualizarContrasena" VALUE="<?=$Contrasena?>" required>
        <br>
      
      </div>
    </div>        
    <div class="card position-relative float-right  " style=" width: 900px; right:80px;bottom:65px;">
      <div class="card-header"> Informacion de la mascota</div>
      <div class="card-body">  
        <h5 class="card-title">Paciente</h5>
        <input type="text" class="form-control" style="margin-bottom:10px;" name="actualizarPaciente"  VALUE="<?=$Paciente?>" required>
        <br>
        <h5 class="card-title">Raza:</h5>
        <input type="text" class="form-control" style="margin-bottom:10px;" name="actualizarRaza"  VALUE="<?=$Raza?>" required>
        <br>
        <h5 class="card-title">Sexo:</h5>
        <input type="text" class="form-control" style="margin-bottom:10px;" name="actualizarSexo"  VALUE="<?=$sexo?>" required>
        <br>
        <h5 class="card-title">Fecha de nacimiento:</h5>
        <input type="date" class="form-control" style="margin-bottom:10px;" name="actualizarNacimiento"  VALUE="<?=$Nacimiento?>" required>
        <button type="submit" name="Actualizar" class="btn btn-success  ">Actualizar</button>
        <br>
      </div>
    </div>   
    
  </form>
  </body>

 

</html>

 