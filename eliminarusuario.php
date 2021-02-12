<?php
ob_start();
  require_once("connection.php");

if (isset($_POST['del'])) 

{
  $correologin= $_POST  ['correo0']; 
  $nombre= $_POST  ['nombres0'];

  $query = "delete from registrar where correo_registrar = '".$correologin."'"; 
  
  mysqli_query ($con,$query);
     header("Location:deleteusuario.html"); 
    echo mysqli_error($con);
}
ob_end_flush();
?>