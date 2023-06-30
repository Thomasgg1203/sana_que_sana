<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require '../Controllers/Controlerempleado.php';
echo "entro";
if(isset($_POST['editarEmpleado'])){
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
$id = $_POST['editarEmpleado'];
$entro1 = editarEmpleado($id, $nom, $direccion, $numTelefon, $ciudad, $depart, $codiPostal, $cedula, $segu_social, $matricula, $tipo_emp);
if ($entro1 == true) {
    echo "<script>alert('Se edito con exito')</script>";
    echo "<script>window.location.href = 'empleado.php'</script>";
} else {
    echo "<script>alert('No se edito')</script>";
    echo "<script>window.location.href = 'empleado.php'</script>";
}
}else{
    echo "no entro";
}
?>