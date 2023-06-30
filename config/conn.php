<?php
function conectarBD() {
    $host = 'localhost';
    $usuario = 'root';
    $password = '';
    $nombreBD = 'sana_que_sana';

    $conexion = mysqli_connect($host, $usuario, $password, $nombreBD);
    if (!$conexion) {
        die('Error al conectar a la base de datos: ' . mysqli_connect_error());
    }
    return $conexion;
}
//Cerrar conexion
function cerrarBD($conexion) {
    mysqli_close($conexion);
}
?>