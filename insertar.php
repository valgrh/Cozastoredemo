<?php
    if( isset($_POST["correo"]) ){
        echo $_POST["correo"];
        require("connection.php");
        $nombres = $_POST["nombres"];
        $correo = $_POST["correo"];
        $contrasena = $_POST["contrasena"];
        $accion = "INSERT INTO registrar (nombres, correo_registrar, contrasena) VALUES ('$nombres', '$correo', '$contrasena')";
        mysqli_query($con, $accion);
        echo mysqli_errno($con);
    }
?>