<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require '../Controllers/Controlerempleado.php';
echo "entro";
if(isset($_POST['insertarEmpleado'])){
$nom = $_POST['nombre'];
$direccion = $_POST['direccion'];
$numTelefon = $_POST['telefono'];
$ciudad = $_POST['ciudad'];
$depart = $_POST['departamento'];
$codiPostal = $_POST['codigo_postal'];
$cedula = $_POST['cedula'];
$segu_social = $_POST['seguridad_social'];
$matricula = $_POST['matricula_profecional'];
$tipo_emp = $_POST['tipo_empleado'];
$entro = crearEmpleado($nom, $direccion, $numTelefon, $ciudad, $depart, $codiPostal, $cedula, $segu_social, $matricula, $tipo_emp);
if ($entro == true) {
    echo "<script>alert('Se ingresaron con exito')</script>";
    echo "<script>window.location.href = 'empleado.php'</script>";
} else {
    echo "<script>alert('No se insertaron los datos')</script>";
    echo "<script>window.location.href = 'empleado.php'</script>";
}
}else{
    echo "no entro";
}
?>