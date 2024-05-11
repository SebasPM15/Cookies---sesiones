<?php 
session_start();

// Destruir la sesión
session_destroy();

// Verificar si el usuario no seleccionó "Recordarme" en el inicio de sesión
if (!isset($_COOKIE["c_recordarme"]) || $_COOKIE["c_recordarme"] != "on") 
{
    #Borro las cookies
    setcookie("c_nombre", "",1);
    setcookie("c_clave","",1);
    setcookie("c_recordarme","",1);
    header("Location: index.php");
}

// Redirigir al usuario a la página de inicio de sesión
header("Location: index.php");
?>
