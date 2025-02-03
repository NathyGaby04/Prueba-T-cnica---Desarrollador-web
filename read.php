<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>
    <style type="text/css">

        body {
                font-family: 'Arial', sans-serif;
                background-color: #f7f9fc;
                margin: 100px;
                padding: 10px;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }

            button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-align: left;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            transition: transform 0.3s ease-in-out; /* Transición suave */
        }
        
        table{
            border: 2px rgb(0, 0, 0);
            border-collapse: collapse;
            margin: auto;
            justify-content: center; 
            align-items: center;     
            height: 100vh;
        }

        th,h1{
            background-color:rgb(140, 182, 254);

        }

        td,th{
            border: solid 2px rgb(0, 0, 0);
            padding; 2px;
            text-align:center;
        }     

        a {
            background-color:rgb(2, 6, 125);
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            transition: transform 0.3s ease-in-out;
            }


    </style>
</head>
<body>
    
</body>
</html>


<?php

$servidor= "localhost";
$usuario="root";
$clave="";
$baseDeDatos="ejemplo";

$enlace=mysqli_connect($servidor,$usuario,$clave,$baseDeDatos);

$consulta = "SELECT * FROM datos";
    $result = mysqli_query($enlace,$consulta);
    if(!$result)
    {
        $response['error'] = 'No se logró hacer la consulta';
    }

    echo "<form action='cread.php' method='post'>";
    echo "<button type='submit' id='Created'>Añadir</button>";
    echo "</form>";


    echo "<table>";
    echo "<tr>";
    echo "<th><h1>id</h1></th>";
    echo "<th><h1>Usuario</h1></th>";
    echo "<th><h1>Email</h1></th>";
    echo "<th><h1>Contraseña</h1></th>";
    echo "<th><h1>Accion</h1></th>";
    echo "</tr>";
    
    while ($colum = mysqli_fetch_array($result))
    {
        echo "<tr>";
        echo "<td><h2>" . $colum['id'] . "</td></h2>";
        echo "<td><h2>" . $colum['nombre'] . "</td></h2>";
        echo "<td><h2>" . $colum['email'] . "</td></h2>";
        echo "<td><h2>" . $colum['contraseña'] . "</td></h2>";

        
        echo "<td>";

        echo "<form action='update.php' method='get' style='display:inline;'>";
        echo "<input type='hidden' name='id' value='" . $colum['id'] . "'>";
        echo "<button type='submit'>Editar</button>";
        echo "</form>";

        echo "<form action='delete.php' method='post' style='display:inline;'>";
        echo "<input type='hidden' name='id' value='" . $colum['id'] . "'>";
        echo "<button type='submit' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este registro?\");'>Eliminar</button>";
        echo "</form>";

        echo "</td>";

        echo "</tr>";
    }
    echo "</table>";
    
    mysqli_close( $enlace );
    
    //echo "Fuera " ;
    echo "<a href='home.html'> Cerrar sesión</a>";


?>