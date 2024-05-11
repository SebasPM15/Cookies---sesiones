<?php 
include_once("./controlAcceso.php");
include_once("./crearCookie.php"); // incluye el archivo que contiene la clase

#Variables para las cookies
$nombre=$_SESSION["nombre"];
$clave=$_SESSION["clave"];
$recordarme = isset($_SESSION["recordarme"])?$_SESSION["recordarme"] :"";

#Llamamos a la clase que crea las cookies
crearCookie::crearCookies($nombre, $clave, $recordarme);

// Establecer idioma predeterminado y obtener idioma seleccionado si existe
$idioma = isset($_COOKIE["c_idioma"])?$_COOKIE["c_idioma"] : "es";
$archivo_categorias = $idioma == "en" ? "categorias_en.txt" : "categorias_es.txt";
$titulo = $idioma == "en" ? "Product List" : "Lista de Productos";

// Crear cookie de idioma si se ha seleccionado uno
if (isset($_GET['lang'])) {
    $idioma = $_GET['lang'];
    setcookie("c_idioma", $idioma, time() + (86400 * 30), "/");
    $archivo_categorias = $idioma == "en" ? "categorias_en.txt" : "categorias_es.txt";
    $titulo = $idioma == "en" ? "Product List" : "Lista de Productos";
}

$contenido = file_get_contents($archivo_categorias);
$lineas = explode("\n", $contenido);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi panel</title>
</head>
<body>
    <h1> <b> PANEL PRINCIPAL </b> </h1>
    <h2> Bienvenido Usuario: <?php echo $nombre?> </h2> <br>
    <!-- Enlaces para cambiar el idioma -->
    <a href="?lang=es">ES (Español) |</a>
    <a href="?lang=en">EN (English)</a><br><br>
    <a href="cerrarSesion.php"> Cerrar Sesion</a>
    <br><br>
    <h3><?php echo $titulo?></h3>
    <ul>
        <?php
        // Iterar sobre cada línea e imprimir como elemento de lista
        foreach ($lineas as $linea) {
            echo "<li>$linea</li>";
        }
        ?>
    </ul>
</body>
</html>