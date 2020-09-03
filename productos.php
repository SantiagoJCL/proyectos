<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>producto</title>
 
  <link rel="stylesheet" href="estilo/css/headerFooter.css">
  <link rel="stylesheet" href="estilo/css/producto.css">
 

  
</head>

<?php include 'include/header.php'; ?>
<?php include 'include/conexion.php'; ?>

  <body style="margin-top: 170px;">
  
     
  <div id="menu"  >
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
      <?php 
       } 
      ?> 
    </div>
    <?php
      //La sentencia include_once incluye y evalúa el fichero especificado durante la
      // ejecución del script. Tiene un comportamiento similar al de la sentencia include, 
      //siendo la única diferencia de que si el código del fichero ya ha sido incluido,
      // no se volverá a incluir, e include_once devolverá TRUE. 
      //Como su nombre indica, el fichero será incluido solamente una vez.
      require_once 'include/conexion.php';
      //En PHP, justamente el símbolo -> sirve para acceder a información resguardada en la instancia de un objeto.
      //resultado es igual a (la conexion de la base de datos (db) que a la vez
      // por medio de la conexion accede a la consulta (query) utilizando lenguaje sql)
      $resultado= $bd->query("select * from producto");     
    ?>    
      
    <div class="container">
      <div class="row">
        <?php
          //while es una estructura cilica y ejecuta las sentencias anidadas (mientras).
          // mysqli_fetch_array = Obtiene una fila de resultados como un array asociativo,
          // numérico, o ambos
          // EJEUCION DE WHiLE= mientras guarde en una variable fila la funcion mysqli_fetch_array 
          //que obtiene el resultado de la consulta, va iterando la estructura 
        while($fila= mysqli_fetch_array($resultado)){               
          //echo imprime o muestra resultado
          //en la variable fila recorre los datos que contiene la columna llamada 
          //nombre de la base de datos
          // echo $fila["nombre"]."<br>";
          //echo imprime o muestra resultado
          //en la variable fila recorre los datos que contiene la columna llamada 
          //nombre de la base de datos
        ?> 
        <div class="col-3  ">           
          <div class="card    "  id= "tarjeta"    >  
              <?php $FOTO='<img class= imagen src="'.$fila["foto"].'"   >';
                echo $FOTO;
              ?> 
            <div class="card-body">
              <h5 class="card-title"> <?php echo $fila["nombre"]  ?> </h5>
              <p class="card-text"><?php echo $fila["descripcion"]  ?></p>                         
            </div>
          </div>
        </div>                        
        <?php 
          }
        ?> 
      </div>
    </div>   
  </body>

  <?php include 'include/footer.php'; ?>

</html>

 