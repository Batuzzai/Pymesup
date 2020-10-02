<?php


if (!isset($_SESSION['conectado'])) {
    header('Location: login.php');
}

include_once('db/conexion.php');

$correo = $_SESSION['conectado'];
$empresasNum = "SELECT * FROM empresas WHERE correo_dueno = '$correo' ";
$resultado = $conexion->query($empresasNum);
$count = mysqli_num_rows($resultado);

if ($count != 0) {
    $empresas = "SELECT nombre_emp, rut_empresa FROM empresas_info WHERE rut_empresa in (SELECT rut_empresa FROM empresas WHERE correo_dueno = '$correo') ";
    $busqueda = $conexion->query($empresas);
    $lista = array();
    while ($row = mysqli_fetch_array($busqueda)) {
        $lista[] = array($row['rut_empresa'], $row['nombre_emp']);
    }
}

?>


<?php include_once('core/header.php'); ?>
<div class="container">
    <br>
    <h2>Numero de empresas: <?php echo $count; ?></h2>
    <?php if ($count == 0) { ?>
        <a class="btn btn-primary" href="registroEmp.php" role="button">Registra tu empresa gratis</a>
    <?php } else { ?>
        <a class="btn btn-warning" href="registroEmp.php" role="button">Registra una nueva empresa a $4.990</a>
    <?php } ?>
</div>
<div class="container-sm">
    <div class="card border-primary float-md-right" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Mis empresas:</h5>
            <h6 class="card-subtitle mb-2 text-muted"> <?php echo $correo; ?></h6>
            <ul class="card-text list-group">
                <?php for ($i = 0; $i <= $count - 1; $i++) { ?>
                    <a href="inventario.php?empID=<?php echo $lista[$i][0]; ?>" class="link-success">
                        <li class="list-group-item"><?php echo $lista[$i][1]; ?></li>
                    </a>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
<div class="container">
    <div class="container-sm">
        <div class="container-sm">
            <h2>Modificar mis datos:</h2>
            <form class="form" action="db/actualizarCorreo.php" method="POST">
                <label>Actualizar correo:
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-envelope"></i></span>
                        </div>
                        <div class="col-xs-4">
                            <input name="correoNuevo" class="form-control" placeholder="Correo electrónico" type="email"
                                   value="<?php echo $_POST['correo']; ?>" required>
                        </div>
                    </div>
                </label>
                <div class="form-group">
                    <br>
                    <button type="submit" class="btn btn-primary btn-sm"> Cambiar email</button>
                </div>
            </form>
            <br>
        </div>
        <div class="container-sm">
            <form class="form" action="db/actualizarContra.php" method="POST">
                <label>Actualizar contraseña:<br>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <div class="col-xs-4">
                            <input name="contrasenaNueva" class="form-control" placeholder="Nueva contraseña"
                                   type="password" required><br>
                        </div>
                    </div>
                    <div class="form-group input-group col-xs-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <div class="col-xs-4">
                            <input class="form-control" name="contrasena2Nueva" placeholder="Repetir contraseña"
                                   type="password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <br>
                        <button type="submit" class="btn btn-primary btn-sm"> Cambiar contraseña</button>
                    </div>
                </label>
            </form>
        </div>
    </div>
</div>
<?php include_once('core/footer.php'); ?>
        
