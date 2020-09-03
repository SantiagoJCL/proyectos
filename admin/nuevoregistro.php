





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

<?php include '../include/headerAdmin.php'; ?>
<?php include '../include/conexion.php'; ?>

<body style="background-color: #FFE787;">
<div class="container">
      <div class="row justify-content-between">
      <div class="col-4  ">  
  <div class="card bg-light mb-3  " style="max-width: 21rem; top:15px; right: 130px;">
       <?php $resultado=$bd->query("select nombre, propietario, codigocliente from mascota, cliente where `codigocliente` = `clientecodigo`"); 
            while ($fila= mysqli_fetch_array($resultado)) {
            ?>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Paciente: <?=$fila["nombre"] ?> <br> Propietario: <?=$fila["propietario"] ?> <br> 
          <a href="../include/admin/registro/editregistro.php?codigocliente= <?= $fila["codigocliente"]?> " class="btn btn-secondary btn-sm"  > Editar</a> 
          <a href="../include/admin/registro/borrarregistro.php?codigocliente= <?= $fila["codigocliente"]?>"   class="btn btn-danger btn-sm " > Borrar</a> 
          <a href="mostrarregistro.php?codigocliente= <?= $fila["codigocliente"]?>"   class="btn btn-primary btn-sm " > visualizar</a>
                       
        </li>
      </ul>
      <?php
    }
      ?>
  </div>
  </div>
   
  <?php
    if (isset($_POST['agregar'])) {
     $Propietario = $_POST['Propietario'];
     $Direccion = $_POST['Direccion']; 
     $Telefono = $_POST['Telefono'];
     $Uruario = $_POST['Usuario'];
     $Contraseña = $_POST['Contrasena'];

     $Paciente = $_POST['Paciente'];
     $Raza = $_POST['Raza'];
     $sexo = $_POST['Sexo'];
     $Nacimiento = $_POST['Nacimiento']; 
     
     $Fecha = $_POST['Fecha']; 
     $Peso = $_POST['Peso'];
     $Vacuna = $_POST['Vacuna']; 
     $próximo = $_POST['próximo']; 
     
      $resultado= $bd->query("INSERT INTO cliente (propietario, direccion , telefono, contrasenac, usuarioc) 
      values('$Propietario','$Direccion', '$Telefono',  '$Contraseña', '$Uruario') ");
      
      $resultado= $bd->query("INSERT INTO mascota (nombre, raza , sexo, fechanacimiento) 
      values('$Paciente','$Raza', '$sexo', '$Nacimiento')  ") ;
      

      $resultado= $bd->query("SELECT MAX(codigocliente) AS mayor from cliente  ");
      
      if(mysqli_num_rows($resultado)){
        $row = mysqli_fetch_array($resultado);
        $mayorvalor = $row['mayor'];
      }
      $resultado= $bd->query("UPDATE mascota SET clientecodigo = $mayorvalor where clientecodigo is NULL  ");
    
      $resultado= $bd->query("INSERT INTO vacunacion (fecha, peso , vacuna, proxcontrol) 
      values('$Fecha','$Peso', '$Vacuna', '$próximo')  ") ;
    
    
      $resultado= $bd->query("SELECT MAX(codigomascota) AS mayorM from mascota  ");
      if(mysqli_num_rows($resultado)){
        $row = mysqli_fetch_array($resultado);
        $mayorvalorM = $row['mayorM'];
      }
      $resultado= $bd->query("UPDATE vacunacion SET mascotacodigo = $mayorvalorM where mascotacodigo is NULL  ");

      header('location: nuevoregistro.php');
    }
  ?>

      <div class="col-4  ">           
      <div style="  position:relative;   left:110px;  ">
  <form action="nuevoregistro.php" method="post" class="form-group" > 
    <div class="card position-relative float-right  " style=" width: 900px; ">
      <div class="card-header">Carnet de vacuna</div>
      <div class="card-body">
        
      <h5 class="card-title">Propietario:</h5>
        <input type="text" class="form-control" style="margin-bottom:10px;" name="Propietario"  required>
        <br>
        <h5 class="card-title">Direccion:</h5>
        <input type="text" class="form-control" style="margin-bottom:10px;" name="Direccion"  required>
        <br>
        <h5 class="card-title">Telefono:</h5>
        <input type="text" class="form-control" style="margin-bottom:10px;" name="Telefono"  required>
        <br>
        <h5 class="card-title">usuacuio</h5>
        <input type="text" class="form-control" style="margin-bottom:10px;" name="Usuario"  required>
        <br>
        <h5 class="card-title">contraseña</h5>
        <input type="text" class="form-control" style="margin-bottom:10px;" name="Contrasena"  required>
        <br>
      </div>
    </div>        
    <div class="card position-relative float-right  " style=" width: 900px;   ;">
      <div class="card-header"> Informacion de la mascota</div>
      <div class="card-body">  
        <h5 class="card-title">Paciente</h5>
        <input type="text" class="form-control" style="margin-bottom:10px;" name="Paciente"  required>
        <br>
        <h5 class="card-title">Raza:</h5>
        <input type="text" class="form-control" style="margin-bottom:10px;" name="Raza"  required>
        <br>
        <h5 class="card-title">Sexo:</h5>
        <input type="text" class="form-control" style="margin-bottom:10px;" name="Sexo"  required>
        <br>
        <h5 class="card-title">Fecha de nacimiento:</h5>
        <input type="date" class="form-control" style="margin-bottom:10px;" name="Nacimiento"  required>
        <br>
      </div>
    </div>   
    <div class="card position-relative float-right  " style=" width: 900px;  ;">
      <div class="card-header">control del paciente</div>
      <div class="card-body">  
        <h5 class="card-title">Fecha:</h5>
        <input type="date" class="form-control" style="margin-bottom:10px;" name="Fecha"  required>
        <br>
        <h5 class="card-title">Peso:</h5>
        <input type="text" class="form-control" style="margin-bottom:10px;" name="Peso"  required>
        <br>
        <h5 class="card-title">Vacuna:</h5>
        <input type="text" class="form-control" style="margin-bottom:10px;" name="Vacuna"  required>
        <br>
        <h5 class="card-title"> próximo control:</h5>
        <input type="date" class="form-control" style="margin-bottom:10px;" name="próximo"  required> 
        <button type="submit" name="agregar" class="btn btn-success  ">Actualizar</button>
      </div>
      <div class="card-footer text-muted">
          <br>
      </div>
    </div>
    </div>
</div> 
</div>     
</div>
  </form>
</body>
  

</html>

 