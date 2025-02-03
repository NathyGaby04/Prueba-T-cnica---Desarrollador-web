<?php


$servidor= "localhost";
$usuario="root";
$clave="";
$baseDeDatos="ejemplo";

$enlace= new mysqli($servidor,$usuario,$clave,$baseDeDatos);

$username = '';
$email ='' ;
$password = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    do{ 
        if ($username === '' || $email === '' || $password === '') {
            echo json_encode('Llena todos los campos');
            break;

    }
    $insertarDatos = "INSERT INTO datos VALUES ('','$username','$email','$password')";
    $ejecutarInsertar = mysqli_query ($enlace,$insertarDatos);

    $username = '';
    $email = '';
    $password ='' ;
    
   echo json_encode('Nuevo registro exitoso'); 

   header('Location:/Prueba-T-cnica---Desarrollador-web/read.php');
   exit;
    
}while(false);{

}
    
};
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario nuevo</title>
    <style>
        body {
                font-family: 'Arial', sans-serif;
                background-color: #f7f9fc;
                margin: 0;
                padding: 0;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
    
            #container {
                width: 100%;
                max-width: 600px;
                background-color: #fff;
                padding: 20px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                border-radius: 10px;
                text-align: center;
            }
    
            h1 {
                color: #333;
                margin-bottom: 20px;
            }
    
            form {
                display: flex;
                flex-direction: column;
                gap: 15px;
            }
    
            input[type="text"], input[type="email"], input[type="password"] {
                padding: 10px;
                border: 1px solid #ddd;
                border-radius: 5px;
                font-size: 16px;
            }
    
            button {
                padding: 10px 20px;
                background-color: #007bff;
                color: #fff;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-size: 16px;
            }
    
            button:hover {
                background-color: #0056b3;
            }
    </style>
</head>
<body>
    <div class="container">
        <h2>Agrega un usuario</h2>
        <form method="post">
       
                    <label for="username">Usuario</label>  
                    <input type="text" placeholder="Nombre del usuario" name="username" value=<?php echo $username; ?>> 

                    <label for="email">Email</label>
                    <input type="email" placeholder=" example@gmail.com" name="email" value=<?php echo $email; ?>> 

                    <label for="password">Password</label>
                    <input type="password" placeholder="Minimo 8 caracteres, 1 Mayuscula, 1 caracter especial" name="password" value=<?php echo $password; ?>>   

                    <button type="submit" action="" id="save">Guardar</button>
                    <button type="button" onclick="window.location.href='read.php';">Cancelar</button>
        </form>
    </div>

</body>
</html>