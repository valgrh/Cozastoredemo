<?php
require("connection.php");
if(isset($_POST["nom_prenda"])){

echo $_POST["nom_prenda"];

}

$idprenda = $_POST["id_prenda"];
$nombreprenda = $_POST["nom_prenda"];
$descripcion = $_POST["descripcion"];
$idmarca = $_POST["id_marca"];
$idproveedor = $_POST["id_proveedor"];
$precio = $_POST["precio"];
$cantidad = $_POST["cantidad"];
$imagen = $_POST["imagen"];

$accion = "CALL `sp_insertarprendas` ('$idprenda', '$nombreprenda', '$descripcion', '$idmarca', '$idproveedor', '$precio', '$cantidad', '$imagen');";
//$accion = "INSERT INTO prenda (id_prenda, nom_prenda, descripcion, id_marca, id_proveedor, precio, cantidad, imagen) VALUES ('$idprenda', '$nombreprenda', '$descripcion', '$idmarca', '$idproveedor', '$precio', '$cantidad', '$imagen')";//
mysqli_query($con, $accion);
?>