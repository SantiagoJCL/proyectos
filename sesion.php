<?php
  include 'include/conexion.php';
 session_start();
?>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     
      <link rel="stylesheet" href="estilo/css/headerFooter.css">
    <title>Sesion</title>
  </head>
 
  <?php include 'include/header.php'; ?>
 <body> 
    <div class="row">
      <div class="col-md-5 mt-5 mb-5" style="margin-left:380px">
      <?php if (isset($_SESSION['message'])) { ?>
            <div class="alert alert-<?= $_SESSION['type']; ?> alert-dismissible fade show" role="alert">

             <?= $_SESSION['message']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>

          <?php session_unset(); } ?>
        <div class="card">
          <div class="card-header">
            <h2 class="card-title center">
              Inicia Sesion
            </h1>
          </div>
          <div class="card-body">
            <form action="include/procesosesion.php" method="post">
              <div class="form-group">
                <label for="">Usuario</label>
                <input type="text" name="usuario" id="" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Contraseña</label>
                <input type="password" name="contra" id="" class="form-control">
              </div>
              <input type="submit" value="Iniciar" name='enviar' class="btn btn-outline-warning">
            </form>
          </div>
        </div>
      </div> 
    </div>
 </body>
  <?php include 'include/footer.php'; ?>
</html>
