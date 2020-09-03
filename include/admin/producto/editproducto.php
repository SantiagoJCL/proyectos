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
    if (isset($_GET['codigo'])) {
        $codigo = $_GET['codigo'];
        $resultado= $bd->query("SELECT * FROM producto, seccion WHERE codigo = '$codigo' and  seccioncodigo =  codigoseccion");     
        if(mysqli_num_rows($resultado)){
            $row = mysqli_fetch_array($resultado);
            $nombre = $row['nombre'];
           $descripcion= $row['descripcion'];
           $seccion = $row['seccioncodigo'];
           $NombreSeccion =  $row['NombreSeccion'];
             
        }
    } 
    if (isset($_POST['actualizar'])) {
        if ($_FILES ["foto"]["name"] == '') {
        $nombre_actualizado = $_POST['nombre_actualizado'];
        $descripcion_actualizado=  $_POST['descripcion_actualizado'];
        $seccioncodigo_actualizado= $_POST['seccioncodigo_actualizado'];
         
       
        
        $resultado= $bd->query("UPDATE producto SET nombre = '$nombre_actualizado', descripcion ='$descripcion_actualizado', seccioncodigo='$seccioncodigo_actualizado' WHERE codigo = '$codigo'");     
        header('location: ../../../admin/editproductos.php');
    }else{
        $foto= $_FILES["foto"]["name"];
        $destino="../../../../proyecto/estilo/fotos/".$foto;
        $ruta=$_FILES["foto"]["tmp_name"];
        copy($ruta,$destino);
        
        $nombre_actualizado = $_POST['nombre_actualizado'];
        $descripcion_actualizado=  $_POST['descripcion_actualizado'];
        $seccioncodigo_actualizado= $_POST['seccioncodigo_actualizado'];
        $resultado= $bd->query("UPDATE producto SET nombre = '$nombre_actualizado', descripcion ='$descripcion_actualizado', seccioncodigo='$seccioncodigo_actualizado', foto = '$destino'  WHERE codigo = '$codigo'");     
    
        header('location: ../../../admin/editproductos.php');
    }
}
        ?>
    
    </head>
    <body style="background-color: #FFE787;">
        <div class="card  " style="margin: 200px; border:1px solid rgba(0,0,0,.125);">
            <div class="card-header">
                Edit
            </div>
            <div class="card-body">
                <form action="editproducto.php?codigo=<?= $_GET['codigo']?>" method="post" class="form-group" enctype="multipart/form-data">
                    <h5 class="card-title">Edite la imagen</h5>
                    <input type="file" name="foto" id="foto" >
                    <br><br>    
                    <h5 class="card-title">Edite la seccion </h5>
                    <select name="seccioncodigo_actualizado" id="codigoseccion" >
                        <option value="<?=$seccion?>"><?=$NombreSeccion?></option>
                        <?php
                            $resultado= $bd->query("select * from seccion where $seccion <> codigoseccion");
                            while($fila= mysqli_fetch_array($resultado)){          
                                echo '<option value="'.$fila["codigoseccion"].'">'.$fila["NombreSeccion"].'</option> ';
                            }
                        ?>
                    </select>
                    <br>    
                    <br>
                    <h5 class="card-title">Edite el nombre</h5>
                    <input type="text" class="form-control" style="margin-bottom:10px;" name="nombre_actualizado" value="<?= $nombre ?>" required>
                    <br>
                    <h5 class="card-title">Edite la descripcion</h5>
                    <input type="text" class="form-control" style="margin-bottom:10px;" name="descripcion_actualizado" value="<?= $descripcion ?>" required>
                    <button type="submit" name="actualizar" class="btn btn-success  ">Actualizar</button>
                </form>
            </div>
            <div class="card-footer text-muted">
                <br>
            </div>
        </div>
    </body>
  
    