<?php

if (!isset($_GET['empID']) && !isset($_GET['prod']) || !isset($_SESSION['conectado'])) {
    header('Location: inventario.php');
} else {

    include_once('db/conexion.php');
    $correo = $_SESSION['conectado'];
    $rutEmpresa = $_GET['empID'];
    $codProd = $_GET['prod'];
    $verificador = "SELECT correo_dueno FROM empresas WHERE rut_empresa = '$rutEmpresa'";
    $result = $conexion->query($verificador);
    $query = mysqli_fetch_array($result);
    if ($correo === $query[0]) {
        //PARA SEGUIR CODEANDO ACÁ, HACERLO EN ESTE IF, IDK PROBLEMA DE CONDICIONAL.
        //PRODUCTO
        $producto = "SELECT * FROM productos WHERE rut_empresa = '$rutEmpresa' AND codigo = '$codProd'";
        $detalle = $conexion->query($producto);
        $lista = array();
        while ($row = mysqli_fetch_array($detalle)) {
            $lista[] = array($row['nombre'], $row['precio'], $row['stock']);
        }

    } else {
        die("Alto ahí cerebrito!");
    }
}
?>

<?php include_once('core/header.php'); ?>


<div class="container">
    <h2>Editando producto:
        <div style="text-align: center;"><?php echo $lista[0][0]; ?></div>
    </h2>
    <form action="db/editarProducto.php" class="form" method="POST" enctype="multipart/form-data">
        <div class="form-group input-group">
            <label for="codigo">Codigo:<br>
                <input type="text" class="form-control" name="codigo" value="<?php echo $codProd; ?>" id="codigo"
                       placeholder="codigo del producto" required>
            </label>
        </div>
        <div class="form-group input-group">
            <label for="nombre">Nombre:<br>
                <input type="text" class="form-control" name="nombre" value="<?php echo $lista[0][0]; ?>" id="nombre"
                       placeholder="Nombre del producto" required>
            </label>
        </div>
        <div class="form-group input-group">
            <label for="precio">Precio:<br>
                <input type="number" class="form-control" name="precio" value="<?php echo $lista[0][1]; ?>" id="precio"
                       placeholder="Precio del Producto" required>
            </label>
        </div>
        <div class="form-group input-group">
            <label for="cantidad">Cantidad:<br>
                <input type="number" class="form-control" name="cantidad" value="<?php echo $lista[0][2]; ?>"
                       id="cantidad" placeholder="Cantidad de producto" required>
            </label>
        </div>
        <div class="form-group input-group">
            <input type="hidden" class="form-control" name="prod" value="<?php echo $codProd; ?>" required>
        </div>
        <div class="form-group input-group">
            <input type="hidden" class="form-control" name="empID" value="<?php echo $rutEmpresa; ?>" required>
        </div>
        <br>
        <div class="form-group">
            <button type="submit" class="btn-save"><i class="far fa-save fa-lg "></i> Guardar cambios</button>
        </div>
    </form>
    <hr>
    <a href="db/editarProducto.php?del=<?php echo $codProd; ?>&empID=<?php echo $rutEmpresa ?>">
        <button type="submit" class="btn btn-danger"> ELIMINAR PRODUCTO</button>
    </a>
</div>


<?php include_once('core/footer.php'); ?>
