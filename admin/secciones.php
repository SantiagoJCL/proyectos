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
    <?php include '../include/conexion.php';?>
    
 
  <body style="background-color: #FFE787;">
  
   
  <div id="menu"  >
  <a href="../include/admin/producto/nuevaseccion.php" class="btn btn-success" role="button">Añadir</a>
      <?php   
        $resultado= $bd->query("select * from seccion");    
        while($fila= mysqli_fetch_array($resultado)){
      ?>
        <div  id="div1">  
          <ul>
            <li>
              <?php echo'<form action="secciones.php" method="get">
                          <input class="list-group-item list-group-item-action" type="submit" value="'. $fila["NombreSeccion"] .'" name= "'. $fila["codigoseccion"] .'">     
                        </form>'; 
              ?> 
            </li>
          </ul>
        </div>   
        <a href="../include/admin/producto/editseccion.php?codigoseccion= <?= $fila["codigoseccion"]?> " class="btn btn-secondary"  > Editar</a> 
        <a href="../include/admin/producto/deletseccion.php?codigoseccion= <?= $fila["codigoseccion"]?>"   class="btn btn-danger" > Borrar</a>       
      <?php 
      
    } 
      ?> 
    </div>
    <a href="../include/admin/producto/nuevoproducto.php" class="btn btn-success" role="button">Añadir</a>
<?php  
 $resultado1= $bd->query("select codigoseccion from seccion");    
    while($fila1= mysqli_fetch_array($resultado1)){   
        $variable = $fila1["codigoseccion"] ;
        if(isset($_GET[ $variable])){
            $resultado= $bd->query("select * from producto where   $variable = seccioncodigo");  
            echo "<div class=container>
                    <div class=row> ";
            while($fila= mysqli_fetch_array($resultado)){  
                echo"   <div class=col-3 >           
                            <div class=card  id=tarjeta>  "; 
                                $FOTO='<img class= imagen src="'.$fila["foto"].'"   >';
                                echo $FOTO;
                                echo"<div class=card-body>
                                        <h5 class=card-title> ".$fila["nombre"]."  </h5>
                                            <p class=card-text> ".$fila["descripcion"]." </p> " ;                       
                                            ?>
                                           <a href="../include/admin/producto/editproducto.php?codigo=  <?= $fila["codigo"]?> " class="btn btn-secondary"  > Editar</a> 
              <a href="../include/admin/producto/deletproducto.php?codigo= <?= $fila["codigo"]?>"   class="btn btn-danger" > Borrar</a> 
                                            <?php
                                           echo" </div>
                                    </div>
                            </div>";
            }
                    echo"</div>
                </div>  ";

        }
        
          

    }
?> 
   
     
      
    
  </body>

 
</html>

 