<?php 
#Siempre poner en primer lugar lo siguiente para iniciar el motor de sesiones
include_once("./controlAcceso.php");

    #Validar
    $nombre=$_POST["nombre"];
    $clave=$_POST["clave"];

    if ($nombre== "Usuario" && $clave== "1234")
    {
        $_SESSION["nombre"] = $_POST["nombre"];
        $_SESSION["clave"] = $_POST["clave"];
        $_SESSION["recordarme"] = $_POST["recordarme"];
        header("Location: miPanel.php");
    } else 
    {
        header("Location: index.php");
    }

?>