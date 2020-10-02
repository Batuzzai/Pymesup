<?php

if (isset($_SESSION['conectado'])) {
    header('Location: account.php');
}
?>

<?php include_once('core/header.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-5">
        </div>
        <div class="col-2 color2">
            <img src="assets/img/pymesup.png" class="img-fluid" alt="Responsive image">
        </div>
        <div class="col-5">
        </div>
        <div class="container">
            <div class="card bg-light">
                <article class="card-body mx-auto" style="max-width: 400px;">
                    <h4 class="card-title mt-3 text-center">Crea tu cuenta en Pymesup</h4>
                    <p class="text-center">Únete...</p>
                    <p class="divider-text">
                    </p>
                    <form action="db/register.php" method="POST">
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                            </div>
                            <input name="correo" class="form-control" placeholder="Correo electrónico" type="email"
                                   value="<?php echo $_POST['correo']; ?>" required>
                        </div>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input name="contrasena" class="form-control" placeholder="Crear contraseña" type="password"
                                   required>
                        </div>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input class="form-control" name="contrasena2" placeholder="Repetir contraseña"
                                   type="password" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block"> Crear Cuenta</button>
                        </div>
                        <p class="text-center">¿Ya tienes cuenta? <a href="login.php">Ingresar</a></p>
                    </form>
                </article>
            </div>
        </div>
    </div>
</div>
<?php include_once('core/footer.php'); ?>
