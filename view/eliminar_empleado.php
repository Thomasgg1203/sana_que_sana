<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require '../Controllers/Controlerempleado.php';
if(isset($_POST['eliminarEmpleado'])){
    $id = $_POST['eliminarEmpleado'];
    $entro2 = eliminarEmpleado($id);
    if ($entro2 == true) {
        echo "<script>alert('Se elimino con exito')</script>";
        echo "<script>window.location.href = 'empleado.php'</script>";
    } else {
        echo "<script>alert('No se elimino con exito')</script>";
        echo "<script>window.location.href = 'empleado.php'</script>";
    }
}
?>