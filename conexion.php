<?php
$conexion = new mysqli("localhost", "dev_user", "Cesar22!", "Truper_14");

if ($conexion->connect_error) {
    die("Error de conexión");
}
?>
