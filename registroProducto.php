<?php include_once('core/header.php'); ?>

<?php
if (!isset($_GET['empID']) || !isset($_SESSION['conectado'])) {
    header('Location: account.php');
} else {

    include_once('db/conexion.php');
    $correo = $_SESSION['conectado'];
    $rutEmpresa = $_GET['empID'];
    $verificador = "SELECT correo_dueno FROM empresas WHERE rut_empresa = '$rutEmpresa'";
    $result = $conexion->query($verificador);
    $query = mysqli_fetch_array($result);
    if ($correo === $query[0]) {
        //PARA SEGUIR CODEANDO ACÁ, HACERLO EN ESTE IF, IDK PROBLEMA DE CONDICIONAL.
        $info = "SELECT * FROM empresas_info WHERE rut_empresa = '$rutEmpresa'";
        $busqueda = $conexion->query($info);
        $fila = mysqli_fetch_array($busqueda);

    } else {
        die("Alto ahí cerebrito!");
    }
}
?>

<div class="container">
    <div class="form_register">
        <h1><i class="far fa_building"></i> Registro Producto </h1>
        <hr>
        <form action="db/registroProducto.php" class="form" method="POST" enctype="multipart/form-data">
            <div class="form-group input-group">
                <label for="producto">Producto</label>
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre del producto"
                       required>
            </div>
            <div class="form-group input-group">
                <label for="codigo">Codigo</label>
                <input type="text" class="form-control" name="codigo" id="codigo" placeholder="codigo del producto"
                       required>
            </div>
            <div class="form-group input-group">
                <label for="precio">Precio</label>
                <input type="number" class="form-control" name="precio" id="precio" placeholder="Precio del Producto"
                       required>
            </div>
            <div class="form-group input-group">
                <label for="cantidad">Cantidad</label>
                <input type="number" class="form-control" name="cantidad" id="cantidad"
                       placeholder="Cantidad de producto" required>
            </div>
            <div class="form-group input-group">
                <input type="hidden" class="form-control" name="empID" value="<?php echo $rutEmpresa; ?>" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn-save"><i class="far fa-save fa-lg "></i> Guardar Producto</button>
            </div>
        </form>
    </div>
</div>
<?php include_once('core/footer.php'); ?>
