<?php
 
$Host = 'localhost';
$Username = 'root';
$Password = '';
$dbName = 'Proyecto';

//Crear conexion mysql
//new mysqli es una clase? orientada a objeto que conecta a la bd 
//hay dos formas de conectar con la bd con mew mysqli, y con mysqli_conect
//
$bd =  new mysqli($Host, $Username, $Password, $dbName);

//revisar conexion
if($bd->connect_error){
   die("Connection failed: " . $bd->connect_error);
}

?>
