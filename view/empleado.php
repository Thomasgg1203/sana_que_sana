<!-- Controlador: -->
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require '../Controllers/Controlerempleado.php';
$empleados = obtenerEmpleados();
$tipo_empleos = obtenerTipoEmpleado();
?>
<?php include 'includes/header.php'; ?>
<!-- Contenido -->
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <br><br>
        <h1 class="header center blue-text">Empleados</h1>
        <div class="row center">
            <table>
                <thead>
                    <tr>
                        <th>Identificador</th>
                        <th>Nombre</th>
                        <th>Tipo Trabajador</th>
                        <th>Opciones</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($empleados as $e) { ?>
                        <tr>
                            <td>
                                <?php echo $e['emp_id']; ?>
                            </td>
                            <td>
                                <?php echo $e['emp_nombre']; ?>
                            </td>
                            <td>
                                <?php echo $e['tipo_empleado']; ?>
                            </td>
                            <td>
                                <!-- Modal Editar -->
                                <a class="waves-effect waves-light btn modal-trigger"
                                    href="<?php echo "#1" . $e['emp_id']; ?>"><i class="material-icons">edit</i></a>

                                <!-- Modal Structure -->
                                <div id="<?php echo "1" . $e['emp_id']; ?>" class="modal">
                                    <div class="modal-content">
                                        <h4>Editar Empleado:
                                            <?php echo $e['emp_id']; ?>
                                        </h4>
                                        <div class="row">
                                            <form class="col s12" method="post" action="actualizar_empleados.php">
                                                <div class="row">
                                                    <div class="input-field col s6">
                                                        <input id="last_name" type="text" class="validate" name="nombre"
                                                            value="<?php echo $e['emp_nombre']; ?>">
                                                        <label for="last_name">Nombre</label>
                                                    </div>
                                                    <div class="input-field col s6">
                                                        <input id="last_name" type="text" class="validate" name="direccion"
                                                            value="<?php echo $e['emp_direccion']; ?>">
                                                        <label for="last_name">Dirección</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="input-field col s6">
                                                        <input id="last_name" type="text" class="validate" name="telefono"
                                                            value="<?php echo $e['emp_telefono']; ?>">
                                                        <label for="last_name">Telefono</label>
                                                    </div>
                                                    <div class="input-field col s6">
                                                        <input id="last_name" type="text" class="validate" name="ciudad"
                                                            value="<?php echo $e['emp_ciudad']; ?>">
                                                        <label for="last_name">Ciudad</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="input-field col s6">
                                                        <select name="departamento">
                                                            <option value="" selected>
                                                                <?php echo $e['emp_departamento']; ?>
                                                            </option>
                                                        </select>
                                                        <label>Departamento</label>
                                                    </div>
                                                    <div class="input-field col s6">
                                                        <input id="last_name" type="text" class="validate"
                                                            name="codigo_postal"
                                                            value="<?php echo $e['emp_codigo_postal']; ?>">
                                                        <label for="last_name">Codigo Postal</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="input-field col s6">
                                                        <input id="last_name" type="text" class="validate" name="cedula"
                                                            value="<?php echo $e['emp_cedula']; ?>">
                                                        <label for="last_name">Cedula</label>
                                                    </div>
                                                    <div class="input-field col s6">
                                                        <input id="last_name" type="text" class="validate"
                                                            name="seguridad_social"
                                                            value="<?php echo $e['emp_seguridad_social']; ?>">
                                                        <label for="last_name">Seguridad social</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="input-field col s6">
                                                        <input id="last_name" type="text" class="validate"
                                                            name="matricula_profecional"
                                                            value="<?php echo $e['emp_matricula_profesional']; ?>">
                                                        <label for="last_name">Matricula Profesional</label>
                                                    </div>
                                                    <div class="input-field col s6">
                                                        <select name="tipo_empleado">
                                                            <option value="<?php echo $e['tipo_id']; ?>"
                                                                selected><?php echo $e['tipo_empleado']; ?></option>
                                                        </select>
                                                        <label>Tipo empleado</label>
                                                    </div>
                                                </div>
                                                <div class="row center">
                                                    <button class="btn waves-effect waves-light" type="submit"
                                                        name="editarEmpleado" value=" <?php echo $e['emp_id']; ?>">Editar
                                                        <i class="material-icons right">edit</i>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
                                    </div>
                                </div>
                                <!-- Modal Eliminar -->
                                <a class="waves-effect waves-light btn modal-trigger red"
                                    href="<?php echo "#2" . $e['emp_id']; ?>"><i class="material-icons">delete</i></a>
                                <!-- Modal Structure -->
                                <div id="<?php echo "2" . $e['emp_id']; ?>" class="modal">
                                    <div class="modal-content">
                                        <h4>Eliminar Empleado</h4>
                                        <p>
                                            ¿Esta seguro que desea eliminar este usuario?
                                        </p>
                                        <form action="eliminar_empleado.php" method="post">
                                            <div class="row center">
                                                <button class="btn waves-effect waves-light red" type="submit" name="eliminarEmpleado" value=" <?php echo $e['emp_id']; ?>">Eliminar
                                                        <i class="material-icons right">edit</i>
                                                    </button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Regresar</a>
                                    </div>
                                </div>

                                <!-- Modal Detalles -->
                                <a class="waves-effect waves-light btn modal-trigger green"
                                    href="<?php echo "#3" . $e['emp_id']; ?>"><i
                                        class="material-icons">library_books</i></a>
                                <!-- Modal Detalles -->
                                <div id="<?php echo "3" . $e['emp_id']; ?>" class="modal">
                                    <div class="modal-content">
                                        <h4>Detalles Empleado:
                                            <?php echo $e['emp_id']; ?>
                                        </h4>
                                        <div class="row">
                                            <form class="col s12" method="post" action="ingreso_empleados.php">
                                                <div class="row">
                                                    <div class="input-field col s6">
                                                        <input id="last_name" type="text" class="validate" name="nombre"
                                                            disabled value="<?php echo $e['emp_nombre']; ?>">
                                                        <label for="last_name">Nombre</label>
                                                    </div>
                                                    <div class="input-field col s6">
                                                        <input id="last_name" type="text" class="validate" name="direccion"
                                                            disabled value="<?php echo $e['emp_direccion']; ?>">
                                                        <label for="last_name">Dirección</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="input-field col s6">
                                                        <input id="last_name" type="text" class="validate" name="telefono"
                                                            disabled value="<?php echo $e['emp_telefono']; ?>">
                                                        <label for="last_name">Telefono</label>
                                                    </div>
                                                    <div class="input-field col s6">
                                                        <input id="last_name" type="text" class="validate" name="ciudad"
                                                            disabled value="<?php echo $e['emp_ciudad']; ?>">
                                                        <label for="last_name">Ciudad</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="input-field col s6">
                                                        <select name="departamento">
                                                            <option value="" disabled selected>
                                                                <?php echo $e['emp_departamento']; ?>
                                                            </option>
                                                        </select>
                                                        <label>Departamento</label>
                                                    </div>
                                                    <div class="input-field col s6">
                                                        <input id="last_name" type="text" class="validate"
                                                            name="codigo_postal" disabled
                                                            value="<?php echo $e['emp_codigo_postal']; ?>">
                                                        <label for="last_name">Codigo Postal</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="input-field col s6">
                                                        <input id="last_name" type="text" class="validate" name="cedula"
                                                            disabled value="<?php echo $e['emp_cedula']; ?>">
                                                        <label for="last_name">Cedula</label>
                                                    </div>
                                                    <div class="input-field col s6">
                                                        <input id="last_name" type="text" class="validate"
                                                            name="seguridad_social" disabled
                                                            value="<?php echo $e['emp_seguridad_social']; ?>">
                                                        <label for="last_name">Seguridad social</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="input-field col s6">
                                                        <input id="last_name" type="text" class="validate"
                                                            name="matricula_profecional" disabled
                                                            value="<?php echo $e['emp_matricula_profesional']; ?>">
                                                        <label for="last_name">Matricula Profesional</label>
                                                    </div>
                                                    <div class="input-field col s6">
                                                        <select name="tipo_empleado">
                                                            <option value="<?php echo $e['tipo_empleado']; ?>" disabled
                                                                selected><?php echo $e['tipo_empleado']; ?></option>
                                                        </select>
                                                        <label>Tipo empleado</label>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Regresar</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- Crear empleado -->
        <div class="row center">

            <!-- Modal Trigger -->
            <a class="waves-effect waves-light btn modal-trigger" href="#modal1"><i
                    class="large material-icons">add</i></a>

            <!-- Modal ingresar datos -->
            <div id="modal1" class="modal">
                <div class="modal-content">
                    <i class="medium material-icons prefix">account_circle</i>
                    <h4>Insertar Datos Empleado</h4>
                    <div class="row">
                        <form class="col s12" method="post" action="ingreso_empleados.php">
                            <div class="row">
                                <div class="input-field col s6">
                                    <input id="last_name" type="text" class="validate" name="nombre">
                                    <label for="last_name">Nombre</label>
                                </div>
                                <div class="input-field col s6">
                                    <input id="last_name" type="text" class="validate" name="direccion">
                                    <label for="last_name">Dirección</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <input id="last_name" type="text" class="validate" name="telefono">
                                    <label for="last_name">Numero de Telefono</label>
                                </div>
                                <div class="input-field col s6">
                                    <input id="last_name" type="text" class="validate" name="ciudad">
                                    <label for="last_name">Ciudad</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <select name="departamento">
                                        <option value="" disabled selected>Seleccione un departamento</option>
                                        <option value="Caldas">Caldas</option>
                                        <option value="Amazonas">Amazonas</option>
                                        <option value="Antioquia">Antioquia</option>
                                        <option value="Arauca">Arauca</option>
                                        <option value="Cauca">Cauca</option>
                                        <option value="Huila">Huila</option>
                                    </select>
                                    <label>Departamento</label>
                                </div>
                                <div class="input-field col s6">
                                    <input id="last_name" type="text" class="validate" name="codigo_postal">
                                    <label for="last_name">Codigo Postal</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <input id="last_name" type="text" class="validate" name="cedula">
                                    <label for="last_name">Cedula</label>
                                </div>
                                <div class="input-field col s6">
                                    <input id="last_name" type="text" class="validate" name="seguridad_social">
                                    <label for="last_name">Numero de seguridad social</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <input id="last_name" type="text" class="validate" name="matricula_profecional">
                                    <label for="last_name">Matricula Profesional</label>
                                </div>
                                <div class="input-field col s6">
                                    <select name="tipo_empleado">
                                        <option value="" disabled selected>Tipo de cargo</option>
                                        <?php
                                        foreach ($tipo_empleos as $t) { ?>
                                            <option value="<?php echo $t['tipo_id'] ?>"><?php echo $t['tipo_empleado'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                    <label>Tipo empleado</label>
                                </div>
                            </div>
                            <div class="row center">
                                <button class="btn waves-effect waves-light" type="submit"
                                    name="insertarEmpleado">Insertar
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#!" class="modal-close waves-effect waves-light text-light btn-flat red">Cancelar</a>
                </div>
            </div>
        </div>
        <!-- Crear empleado -->
    </div>
</div>
<br><br>

<script>

    $(document).ready(function () {
        $('.modal').modal();
    });

    $(document).ready(function () {
        $('select').formSelect();
    });
</script>
<!-- Fin contenido -->
<?php include 'includes/footer.php'; ?>