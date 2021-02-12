<?php
ob_start();
  require_once("connection.php");

if (isset($_POST['submit'])) 

{
  $correologin   = $_POST  ['correo']; 
  $nombre   = $_POST  ['nombres1'];

  $query = "update registrar set correo_registrar = '".$correologin."', nombres = '".$nombre."' where correo_registrar = '".$correologin."'"; 
  
  mysqli_query ($con,$query);


    header("Location:updateusuario.html"); 
    echo mysqli_error($con);
}
ob_end_flush();
?> 