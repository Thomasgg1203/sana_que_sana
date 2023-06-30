<?php
//Traer datos de la conexion
require '../config/conn.php';

//Funcion para traer todos los datos
function obtenerEmpleados() {
    $conexion = conectarBD();

    try {
        $query = "SELECT * FROM empleados as e JOIN tipos_empleados as ti ON ti.tipo_id = e.emp_tipo_id;";
        $resultado = mysqli_query($conexion, $query);
        $registros = array();
        while ($row = mysqli_fetch_assoc($resultado)) {
            $registros[] = $row;
        }
        cerrarBD($conexion);

        return $registros;
    } catch (Exception $e) {
        cerrarBD($conexion);
        throw new Exception('Error al obtener los registros: ' . $e->getMessage());
    }
}
function obtenerTipoEmpleado(){
    $conexion = conectarBD();

    try {
        $query = "SELECT * FROM tipos_empleados;";
        $resultado = mysqli_query($conexion, $query);
        $registros = array();
        while ($row = mysqli_fetch_assoc($resultado)) {
            $registros[] = $row;
        }
        cerrarBD($conexion);

        return $registros;
    } catch (Exception $e) {
        cerrarBD($conexion);
        throw new Exception('Error al obtener los registros: ' . $e->getMessage());
    }
}

// Función para editar un registro en la base de datos
function editarEmpleado($id, $nom, $direccion, $numTelefon, $ciudad, $depart, $codiPostal, $cedula, $segu_social, $matricula, $tipo_emp) {
    $conexion = conectarBD();
    try {
        // Ejecutar la consulta de actualización
        $query = "UPDATE empleados SET emp_tipo_id='$tipo_emp',emp_nombre='$nom',emp_direccion='$direccion',emp_telefono='$numTelefon',emp_ciudad='$ciudad',emp_departamento='$depart',emp_codigo_postal='$codiPostal',emp_cedula='$cedula',emp_seguridad_social='$segu_social',emp_matricula_profesional='$matricula' WHERE emp_id = '$id';";
        mysqli_query($conexion, $query);

        // Verificar si hubo algún error
        if (mysqli_errno($conexion)) {
            throw new Exception('Error al editar el registro: ' . mysqli_error($conexion));
        }

        // Realizar otras operaciones necesarias...

        cerrarBD($conexion);
        return true;
    } catch (Exception $e) {
        cerrarBD($conexion);
        throw new Exception('Error en la edición del registro: ' . $e->getMessage());
    }
    return false;
}

// Función para eliminar un registro en la base de datos
function eliminarEmpleado($id) {
    $conexion = conectarBD();

    try {
        // Ejecutar la consulta de eliminación
        $query = "DELETE FROM empleados WHERE emp_id = '$id';";
        mysqli_query($conexion, $query);

        if (mysqli_errno($conexion)) {
            throw new Exception('Error al eliminar el registro: ' . mysqli_error($conexion));
        }
        cerrarBD($conexion);
        return true;
    } catch (Exception $e) {
        cerrarBD($conexion);
        throw new Exception('Error en la eliminación del registro: ' . $e->getMessage());
    }
    return false;
}

// Función para crear un nuevo registro en la base de datos
function crearEmpleado($nom="", $direccion="", $numTelefon="", $ciudad="", $depart="", $codiPostal="", $cedula="", $segu_social="", $matricula="", $tipo_emp="") {
    $conexion = conectarBD();
    try {
        $query = "INSERT INTO empleados (emp_tipo_id, emp_nombre, emp_direccion, emp_telefono, emp_ciudad, emp_departamento, emp_codigo_postal, emp_cedula, emp_seguridad_social, emp_matricula_profesional) VALUES('$tipo_emp', '$nom', '$direccion', '$numTelefon', '$ciudad', '$depart', '$codiPostal', '$cedula', '$segu_social', '$matricula')";
        if (mysqli_errno($conexion)) {
            throw new Exception('Error al crear el registro: ' . mysqli_error($conexion));
        }

        mysqli_query($conexion, $query);
        cerrarBD($conexion);
        return true;
    } catch (Exception $e) {
        cerrarBD($conexion);
        throw new Exception('Error en la creación del registro: ' . $e->getMessage());
    }
    return false;
}
?>