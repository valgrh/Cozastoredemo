<?php
$mysql= new mysqli ("localhost", "id13961301_val","Kaikai20728_","id13961301_bdtienda");
if ($mysql -> connect_error)
    die("No se conecto con la base de datos");

$registro = $mysql -> query("SELECT * FROM registrar WHERE correo_registrar = '$_REQUEST[update1]'") or
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
    <title>Actualizar usuario</title> 
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
<link type="text/css" href="css/estilos.css" rel="stylesheet">

    

</head>  
<body>
    <form class="formulario" action="actualizarusuario.php" class="cta" method="POST">
    
    <h1>Consulta el usuario</h1>
    <p>Para actualizar informacion, primero consulte al usuario</p>
     <div class="contenedor">
     
     
         
         <div class="input-contenedor">
         <input type="text" name="correo" value = "<?php echo $reg['correo_registrar'];?>" placeholder="Correo Electronico">
         
         </div>
         
         <div class="input-contenedor">
         <input type="text" name="nombres1" value = "<?php echo $reg['nombres'];?>" placeholder="Nombres">
         
         </div>
         <input type="submit" name="submit" value="Actualizar" class="button">
     </div>
    </form>
</body>
</html>