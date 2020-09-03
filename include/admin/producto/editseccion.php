
    <head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>producto</title>
 
  <link rel="stylesheet" href=" ../estilo/css/headerFooter.css">
  <link rel="stylesheet" href="../estilo/css/producto.css">
<?php
include '../../conexion.php';
    if (isset($_GET['codigoseccion'])) {
        $codigoseccion = $_GET['codigoseccion'];
        $resultado= $bd->query("SELECT * FROM seccion WHERE codigoseccion = '$codigoseccion'");     
        if(mysqli_num_rows($resultado)){
            $row = mysqli_fetch_array($resultado);
            $nombre = $row['NombreSeccion'];
        }
    }
    if (isset($_POST['actualizar'])) {
        $nombre_actualizado = $_POST['nombre_actualizado'];
        $resultado= $bd->query("UPDATE seccion SET NombreSeccion = ' $nombre_actualizado' WHERE codigoseccion = '$codigoseccion'");     
        header('location: ../../../admin/editproductos.php');
    }
        ?>
    
    </head>
    <body style="background-color: #FFE787;">
        

        <div class="card  " style="margin: 200px; border:1px solid rgba(0,0,0,.125);">
            <div class="card-header">
                Edit
            </div>
            <div class="card-body">
                <form action="editseccion.php?codigoseccion=<?= $_GET['codigoseccion']?>" method="post" class="form-group">
                    <h5 class="card-title">Edite el nombre</h5>
                    <input type="text" class="form-control" style="margin-bottom:10px;" name="nombre_actualizado" value="<?=$nombre ?>" required>
                    <button type="submit" name="actualizar" class="btn btn-success  ">Actualizar</button>
                </form>
            </div>
            <div class="card-footer text-muted">
                <br>
            </div>
        </div>
    </body>
  