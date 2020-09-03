<?php
    session_start();
    include 'conexion.php';
    
    if (isset($_POST['enviar'])) {
        $usuario = $_POST['usuario'];
        $contra = $_POST['contra'];
 
        $queryA = "SELECT usuario, contrasena FROM admin WHERE usuario = '$usuario' and contrasena = '$contra' ";
      
        $queryC = "SELECT usuarioc, contrasenac FROM cliente WHERE usuarioc = '$usuario' and contrasenac = '$contra' ";
   
        $resultA = mysqli_query($bd, $queryA);
        $resultC = mysqli_query($bd, $queryC);
        $nroA = mysqli_num_rows($resultA);
        $nroC = mysqli_num_rows($resultC);
   
        
        if ($nroA == 1) {
            header('location: ../admin/InicioAdmin.php');
        }elseif ($nroC == 1) {
            header('location: ../usuario/iniciousuario.php');
        }else{
            $_SESSION['message'] = 'Usuario o contraseña incorrectos!';
            $_SESSION['type'] = 'danger';
            header('location: ../sesion.php');

        }
      
    }
?>