<?php
include('db.php');
$username=$_POST['username'];
$password=$_POST['password'];
session_start();
$_SESSION["username"]=$username;


$consulta="SELECT nivel FROM usuarios where username ='$username' and password='$password'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);
$obj = $resultado->fetch_object();
/*print($obj->nivel);*/
if($filas){
  switch($obj->nivel) {
      case 1: 
        header("location:nivel1.html");
        break;
      case 2:
        header("location:nivel2.html");
        break;
      case 3: 
        header("location:nivel3.html");
        break;
      case 4:
        header("location:nivel4.html");
        break;
      case 5:
        header("location:nivel5.html");
        break;
      case 6:
        header("location:nivel6.html");
        break;
      default:
        header("location:nivel1.html");
        break;
  }

}
else{
     header("location:contraseniaIncorrecta.html");
};
  

  mysqli_free_result($resultado);
  mysqli_close($conexion);
  
  ?>