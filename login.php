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
            <img src="assets/img/pymesup.png" class="img-fluid" alt="logo">
        </div>
        <div class="col-5">
        </div>
    </div>
    <div class="container">
        <div class="card bg-light">
            <article class="card-body mx-auto" style="max-width: 400px;">
                <h4 class="card-title mt-3 text-center">Inicia sesión en Monkapp</h4>
                <p class="text-center">Descubre...</p>
                <p class="divider-text">
                </p>
                <form action="db/login.php" method="POST">
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                        </div>
                        <input class="form-control" name="correo" placeholder="Correo electrónico" type="text"
                               required>
                    </div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input name="contrasena" class="form-control" placeholder="Contraseña" type="password"
                               required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block"> Ingresar</button>
                    </div>
                    <p class="text-center">¿No tienes cuenta? <a href="register.php">Registrarse</a></p>
                </form>
            </article>
        </div>
    </div>


<?php include_once('core/footer.php'); ?>