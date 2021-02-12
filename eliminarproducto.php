<?php
ob_start();
  require_once("connection.php");

if (isset($_POST['del'])) 

{
  $idprenda = $_POST  ['idprenda0']; 
  $nomprenda = $_POST  ['nom_prenda0'];
  $descripcion = $_POST  ['descripcion0'];
  $idmarca = $_POST  ['id_marca0'];
  $idproveedor = $_POST  ['id_proveedor0'];
  $precio = $_POST  ['precio0'];
  $cantidad = $_POST  ['cantidad0'];
  $imagen = $_POST  ['imagen0'];

  $query = "delete from prenda where id_prenda = '".$idprenda."'"; 
  
  mysqli_query ($con,$query);
    header("Location:deleteproducto.html"); 
    echo mysqli_error($con);
}
ob_end_flush();
?>