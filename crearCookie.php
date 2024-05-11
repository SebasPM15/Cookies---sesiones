<?php
class crearCookie 
{
    // Método estático para crear cookies
    public static function crearCookies($nombre, $clave, $recordarme) {
        // Verificar si se debe recordar al usuario
        if ($recordarme != "") {
            // Crear cookies para el nombre, clave y recordarme
            setcookie("c_nombre", $nombre, 0);
            setcookie("c_clave", $clave, 0);
            setcookie("c_recordarme", $recordarme, 0);
        } else {
            // Si no se debe recordar, borrar todas las cookies
            self::borrarCookies();
        }
    }

    // Método estático para borrar todas las cookies
    public static function borrarCookies() {
        // Verificar si hay cookies existentes
        if (isset($_COOKIE)) {
            foreach ($_COOKIE as $clave => $valor) {
                setcookie($clave, '', 1);
            }
        }
    }
}
?>
