<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>producto</title>
 
 

  
</head>

 
<?php include '../../conexion.php'; ?>

<?php 


if (isset($_GET["codigo"])) {
  $codigo= $_GET["codigo"];
  $resultado = $bd->query("SELECT *  From vacunacion where   '$codigo' = codigo ");
  if(mysqli_num_rows($resultado)){
    $fila = mysqli_fetch_array($resultado);
    $Fecha = $fila['fecha']; 
    $Peso = $fila['peso'];
    $Vacuna = $fila['vacuna']; 
    $próximo = $fila['proxcontrol']; 
  }
}

if (isset($_POST["Actualizar"])) {
 
   
    $FechaA = $_POST['actualizarFecha']; 
    $PesoA = $_POST['actualizarPeso'];
    $VacunaA = $_POST['actualizarVacuna']; 
    $próximoA = $_POST['actualizarpróximo']; 
   
    
    $resultado = $bd->query("UPDATE vacunacion set fecha='$FechaA', peso='$PesoA' ,  vacuna= '$VacunaA',  proxcontrol = '$próximoA'  where    '$codigo' = codigo ");
    
    $resultado = $bd->query(" SELECT * FROM vacunacion, mascota  where '$codigo' = codigo and mascotacodigo = codigomascota  ");
    if(mysqli_num_rows($resultado)){
      $fila = mysqli_fetch_array($resultado);
      $clientecodigo = $fila['clientecodigo']; 
    }

 
 
    header('location: ../../../admin/mostrarregistro.php?codigocliente='. $clientecodigo );
  }



?>

<div class="card position-relative float-right  " style=" width: 900px; right:80px;bottom:65px;">
      
      <div class="card-header">control del paciente</div>
      <div class="card-body">  
      <form action="editvacunacion.php?codigo=<?= $_GET['codigo']?>" method="post" class="form-group" enctype="multipart/form-data">
      
        
        <h5 class="card-title">Fecha:</h5>
        <input type="date" class="form-control" style="margin-bottom:10px;" name="actualizarFecha"  VALUE="<?=$Fecha?>" required>
        <br>
        <h5 class="card-title">Peso:</h5>
        <input type="text" class="form-control" style="margin-bottom:10px;" name="actualizarPeso"  VALUE="<?=$Peso?>" required>
        <br>
        <h5 class="card-title">Vacuna:</h5>
        <input type="text" class="form-control" style="margin-bottom:10px;" name="actualizarVacuna"  VALUE="<?=$Vacuna?>" required>
        <br>
        <h5 class="card-title"> próximo control:</h5>
        <input type="date" class="form-control" style="margin-bottom:10px;" name="actualizarpróximo"  VALUE="<?=$próximo?>" required> 
        <button type="submit" name="Actualizar" class="btn btn-success  ">Actualizar</button>
    </form>
      </div>
      <div class="card-footer text-muted">
          <br>
      </div>
    </div>
