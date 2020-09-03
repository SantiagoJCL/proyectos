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
        if (isset($_POST['Agregar'])) {
            $foto= $_FILES["foto"]["name"];
            $destino="../../../../proyecto/estilo/fotos/".$foto;
            $ruta=$_FILES["foto"]["tmp_name"];
            copy($ruta,$destino);

            $nombre_nuevo=  $_POST['nombre_nuevo'] ;
            $descripcion_nuevo=  $_POST['descripcion_nuevo'] ;
            $seccioncodigo_nuevo = $_POST['seccioncodigo_nuevo'];
            $resultado= $bd->query("INSERT INTO `producto` (nombre, descripcion, foto, seccioncodigo ) values(' $nombre_nuevo','$descripcion_nuevo', '$destino', '$seccioncodigo_nuevo' )");
            header('location: ../../../admin/editproductos.php');
        }
        
        
        
      
 
?>
        <div class="card  " style="margin: 90px; border:1px solid rgba(0,0,0,.125);">
            <div class="card-header">
                Agregar
            </div>
            <div class="card-body">
                <form action="nuevoproducto.php" method="post" class="form-group " enctype="multipart/form-data">
                <h5 class="card-title">ingrese imagen</h5>
                    <input type="file" name="foto" id="foto">
                    <br><br>    
                    <h5 class="card-title">ingrese seccion </h5>
                    <select name="seccioncodigo_nuevo" id="codigoseccion">
                        <option value="0"> ingrese categoria </option>
                        <?php
                            $resultado= $bd->query("select * from seccion");
                            while($fila= mysqli_fetch_array($resultado)){               
                                echo '<option value="' .$fila["codigoseccion"]. '">'.$fila["NombreSeccion"].' </option> ';
                               
                            }
                        ?>
                    </select>
                    <br>    
                    <br>
                    <h5 class="card-title">escriba nombre</h5>
                    <input type="text" class="form-control" style="margin-bottom:10px;" name="nombre_nuevo"   required>
                    <br>
                    <h5 class="card-title">escriba descripcion</h5>
                    <input type="text" class="form-control" style="margin-bottom:10px;" name="descripcion_nuevo"   required>
                    <button type="submit" name="Agregar" class="btn btn-success  ">Actualizar</button>
                </form>
            </div>
            <div class="card-footer text-muted">
                <br>
            </div>
        </div>
    </body>
  




 

 

        
     