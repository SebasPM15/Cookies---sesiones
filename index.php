<?php
session_start();

$recordarme = false;
$nombre = $clave = "";

if (isset($_COOKIE["c_recordarme"]) && $_COOKIE["c_recordarme"] != "") {
    $recordarme = true;
    $nombre = isset($_COOKIE["c_nombre"])?$_COOKIE["c_nombre"] : "";
    $clave = isset($_COOKIE["c_clave"])?$_COOKIE["c_clave"] : "";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title>
</head>
<body>
    <h1>LOGIN</h1>   
    <form action="acceso.php" method="POST">
        <fieldset>
            <label for="nombre">Usuario:</label><br>
            <input type="text" id="nombre" name="nombre" value="<?php echo $nombre?>"><br>
            <label for="clave">Contraseña:</label><br>
            <input type="password" id="clave" name="clave" value="<?php echo $clave?>"><br>
            <input type="checkbox" id="recordarme" name="recordarme" <?php echo $recordarme ? "checked" : ""?>>
            <label for="recordarme">Recordarme</label><br><br>
            <!-- Boton de enviar. --> 
            <input type="submit" value="Enviar">
        </fieldset>
    </form>
</body>
</html>
