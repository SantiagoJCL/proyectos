
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


  
    if (isset($_GET['codigocliente'])) {
        $codigocliente = $_GET['codigocliente'];
        

        $resultado= $bd->query("SELECT codigomascota,clientecodigo  from mascota where  $codigocliente = clientecodigo  ");
        if(mysqli_num_rows($resultado)){
          $row = mysqli_fetch_array($resultado);
          $codigomascota = $row['codigomascota'];
          
          
        }


      }

     

        if (isset($_POST['agregar'])) {

        $Fecha = $_POST['Fecha']; 
        $Peso = $_POST['Peso'];
        $Vacuna = $_POST['Vacuna']; 
        $próximo = $_POST['proximo']; 
        
       
        
        
       $resultado= $bd->query("INSERT INTO vacunacion (fecha, peso , vacuna, proxcontrol, mascotacodigo) 
        values('$Fecha','$Peso', '$Vacuna', '$próximo', '$codigomascota') ") ;
        
       
 
 
    
     
        echo($clientecodigo) ;
        header('location: ../../../admin/mostrarregistro.php?codigocliente='.$codigocliente);
 
}
 

?>


 



<body style="background-color: #FFE787;">
<div style="margin:40px ;"> 
  <form action="agregarvacuna.php?codigocliente=<?= $_GET['codigocliente']?>" method="post" class="form-group" name="" > 
    <div class="card position-relative float-right  " style=" width: 900px; right:80px; ">
      <div class="card-header">control del paciente</div>
      <div class="card-body">  
        <input  type="hidden"  name="codigomascota" value="<?=$codigomascota?>"  >
         
        <h5 class="card-title">Fecha:</h5>
        <input type="date" class="form-control" style="margin-bottom:10px;" name="Fecha"   >
        <br>
        <h5 class="card-title">Peso:</h5>
        <input type="text" class="form-control" style="margin-bottom:10px;" name="Peso"   >
        <br>
        <h5 class="card-title">Vacuna:</h5>
        <input type="text" class="form-control" style="margin-bottom:10px;" name="Vacuna"   >
        <br>
        <h5 class="card-title"> próximo control:</h5>
        <input type="date" class="form-control" style="margin-bottom:10px;" name="proximo"   > 
        <button type="submit" name="agregar" class="btn btn-success  ">Actualizar</button>
      </div>
      <div class="card-footer text-muted">
          <br>
      </div>
    </div>
  </form>
  </div>
  
  </body>