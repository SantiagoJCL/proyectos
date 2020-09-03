<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>producto</title>
 
   

  <body style="background-color: #FFE787;">
        
  <?php
           include '../../conexion.php';
        if (isset($_POST['actualizar'])) {
          
          $Agregarnombre=  $_POST['Agregarnombre'] ;
   
            $resultado= $bd->query("INSERT INTO `seccion` (`NombreSeccion`) values(' $Agregarnombre' )");
            header('location: ../../../admin/editproductos.php');
        }
        
        
      
 
?>
        <div class="card  " style="margin: 200px; border:1px solid rgba(0,0,0,.125);">
            <div class="card-header">
                Agregar
            </div>
            <div class="card-body">
                <form action="nuevaseccion.php" method="post" class="form-group">
                    <h5 class="card-title">Agregue una nueva seccion</h5>
                    <input type="text" class="form-control" style="margin-bottom:10px;" name="Agregarnombre"  required>
                    <button type="submit" name="actualizar" class="btn btn-success  ">Agregar</button>
                </form>
            </div>
            <div class="card-footer text-muted">
                <br>
            </div>
        </div>
    </body>
  




 

 

        
     