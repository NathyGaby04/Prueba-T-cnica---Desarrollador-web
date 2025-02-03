<?php
if (isset($_POST["id"])){
    $id=$_POST["id"];

    $servidor= "localhost";
    $usuario="root";
    $clave="";
    $baseDeDatos="ejemplo";

    $enlace= new mysqli($servidor,$usuario,$clave,$baseDeDatos);

    $sql = "DELETE FROM datos WHERE id=$id";
    $enlace->query($sql);

}

header("Location:/Prueba-T-cnica---Desarrollador-web/read.php");
exit;

?>