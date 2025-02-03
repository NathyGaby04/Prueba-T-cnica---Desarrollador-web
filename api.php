<?php
    header('Content-Type: application/json; charset=utf-8');
    
    $servidor= "localhost";
    $usuario="root";
    $clave="";
    $baseDeDatos="ejemplo";
    
    $enlace=mysqli_connect($servidor,$usuario,$clave,$baseDeDatos);

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    if ($username === '' || $email === '' || $password === '') {
        echo json_encode('Llena todos los campos');
    }else{
       echo json_encode('Correcto');
       $insertarDatos = "INSERT INTO datos VALUES ('','$username','$email','$password')";
       $ejecutarInsertar = mysqli_query ($enlace,$insertarDatos);

    }

    ?>
