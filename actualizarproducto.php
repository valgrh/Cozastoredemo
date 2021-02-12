<?php
ob_start();
require_once("connection.php");

if (isset($_POST['submit'])) 

{
  $idprenda = $_POST['idprenda']; 
  $nomprenda = $_POST['nom_prenda1'];
  $descripcion = $_POST['descripcion1'];
  $idmarca = $_POST['id_marca1'];
  $idproveedor = $_POST['id_proveedor1'];
  $precio = $_POST['precio1'];
  $cantidad = $_POST['cantidad1'];
  $imagen = $_POST['imagen1'];

  $query = "CALL sp_updateprendas ('$idprenda','$nomprenda', '$descripcion', '$idmarca', '$idproveedor','$precio', '$cantidad', '$imagen');";

  //$query = "update prenda set nom_prenda = '".$nomprenda."', descripcion = '".$descripcion."', id_marca = '".$idmarca."', id_proveedor = '".$idproveedor."', precio = '".$precio."', cantidad = '".$cantidad."', imagen = '".$imagen."' where id_prenda = '".$idprenda."'"; 
  
  mysqli_query ($con,$query);

    header("Location:updateproducto.html"); 
    echo mysqli_error($con);
}
ob_end_flush();
?>