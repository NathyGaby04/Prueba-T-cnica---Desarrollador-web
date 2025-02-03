<?php

$servidor= "localhost";
$usuario="root";
$clave="";
$baseDeDatos="ejemplo";

$enlace= new mysqli($servidor,$usuario,$clave,$baseDeDatos);


$id= '';
$nombre = '';
$email ='' ;
$contraseña = '';


if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    


    if(!isset($_GET['id'])){
        header('Location: /Prueba-T-cnica---Desarrollador-web/read.php');
        exit;
    }

    $id = $_GET['id'];

    $sql= "SELECT * FROM datos WHERE id = $id";
    $result = $enlace->query($sql);
    $row = $result->fetch_assoc();

    if (!$row){
        header('Location: /Prueba-T-cnica---Desarrollador-web/read.php');
        exit;
    }

    $nombre = $row['nombre'];
    $email = $row['email'];
    $contraseña = $row['contraseña'];


}else{

    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $contraseña = isset($_POST['contraseña']) ? $_POST['contraseña'] : '';

    do{

        if (empty($id) || empty($nombre) || empty($email) || empty($contraseña)){
            echo json_encode('Llena todos los campos');
            break;
        }

        $sql = "UPDATE datos " . 
       "SET nombre = '$nombre', email = '$email', contraseña = '$contraseña' " . 
       "WHERE id = '$id'";

        $result = $enlace->query($sql);

        if (!$result){
            echo json_encode('No se logró actualizar los datos'); 
            break;
        }

        echo json_encode('Datos Actualizados correctamente'); 
        

       header("Location:/Prueba-T-cnica---Desarrollador-web/read.php");
       exit; 

    }while (false);

}
?>
        <!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Usuario nuevo</title>
                <style type="text/css">
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
        <h2>Editar Usuario</h2>
        <form method="post">
        <input type = "hidden" name= "id" value="<?php echo $id; ?>">   
                    <label for="username">Usuario</label>  
                    <input type="text" placeholder="Nombre del usuario" name="nombre" value=<?php echo $nombre; ?>> 

                    <label for="email">Email</label>
                    <input type="email" placeholder=" example@gmail.com" name="email" value=<?php echo $email; ?>> 

                    <label for="password">Password</label>
                    <input type="password" placeholder="Minimo 8 caracteres, 1 Mayuscula, 1 caracter especial" name="contraseña" value=<?php echo $contraseña; ?>>   

                    <button type="submit" action="" id="save">Guardar</button>
                    <button type="button" onclick="window.location.href='read.php';">Cancelar</button>
        </form>
    </div>

</body>
</html>