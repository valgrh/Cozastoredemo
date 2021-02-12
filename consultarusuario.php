<?php
$mysql= new mysqli ("localhost", "id13961301_val","Kaikai20728_","id13961301_bdtienda");
if ($mysql -> connect_error)
    die("No se conecto con la base de datos");

$registro = $mysql -> query("SELECT * FROM registrar WHERE correo_registrar = '$_REQUEST[correologin]'") or
die($mysql -> error);

if ($reg = $registro -> fetch_array()) 
{
    $strprenda = $reg['correo_registrar'];
    $strnombre = $reg['nombres'];
}
else
echo 'No existe el usuario';

$mysql ->close();

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Consultar usuario</title> 
	<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
<link type="text/css" href="css/estilos.css" rel="stylesheet">

	

</head>  
<body>
    <form class="formulario" action="consultarusuario.html" class="cta" method="POST">
    
    <h1>Consultar usuario</h1>
     <div class="contenedor">
     
     
         
         <div class="input-contenedor">
         <input type="text" name="correo" value = "<?php echo $reg['correo_registrar'];?>" placeholder="Correo Electronico">
         
         </div>
         
         <div class="input-contenedor">
         <input type="text" name="nombres" value = "<?php echo $reg['nombres'];?>" placeholder="Nombres" disabled="disabled">
         
         </div>
         <input type="submit" value="Consultar" class="button">
     </div>
    </form>
</body>
</html>