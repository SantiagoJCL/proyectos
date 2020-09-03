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
    <?php include '../include/headerusu.php'; ?>
    <?php include '../include/conexion.php';?>
 
 
  <body style="background-color: #FFE787;">
 
    
    <?php 
    $resultado= $bd->query("select * from vacunacion, cliente, mascota ");    
        if(mysqli_num_rows($resultado)){
            $row = mysqli_fetch_array($resultado);
            //vacunacion
            $fecha = $row['fecha'];
            $peso = $row['peso'];
            $vacuna = $row['vacuna'];
            $proxcontrol = $row['proxcontrol'];
            // mascota 
            $nombre = $row['nombre'];
            $raza = $row['raza'];
            $sexo = $row['sexo'];
            $fechanacimiento = $row['fechanacimiento'];
            //cliente
            $propietario = $row['propietario'];
            $direccion = $row['direccion'];
            $telefono = $row['telefono'];
        } 
    ?>
  </body>
  <table class="table table-bordered position-relative " style="width: 60%; top:33px;">
  <thead>
    <tr class="table-light"> 
      <th scope="col">Fecha</th>
      <th scope="col">Peso</th>
      <th scope="col">Vacuna</th>
      <th scope="col">prox. control</th>
    </tr>
  </thead>
  <tbody>
    <tr class="table-light"> 
      <td ><?= $fecha ?></td>
      <td ><?= $peso  ?></td>
      <td ><?= $vacuna ?></td>
      <td ><?= $proxcontrol?></td>
    </tr>
  </tbody>
</table>

<div class="card bg-light mb-3 position-relative float-right" style="max-width: 20rem; right:95px; bottom:80px;">
  <div class="card-header">Carnet de vacuna</div>
  <ul class="list-group list-group-flush">
  <li class="list-group-item">Paciente:  <?=$nombre?> </li>
  <li class="list-group-item">Raza: <?=$raza?></li>
  <li class="list-group-item">Sexo: <?=$sexo?></li>
  <li class="list-group-item">Fecha de nacimiento: <?=$fechanacimiento?></li>
  <li class="list-group-item">Propietario: <?=$propietario?></li>
  <li class="list-group-item">Direccion: <?=$direccion?></li>
  <li class="list-group-item">Telefono: <?=$telefono?></li>
</ul>
</div>

  <?php include '../include/footer.php'; ?>
</html>

 