
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
                    <h4 class="card-title mt-3 text-center">Dar de alta mi empresa</h4>
                    <p class="divider-text">
                    </p>
                    <form action="db/registroEmp.php" method="POST">
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <input name="nombre_emp" class="form-control" placeholder="Nombre de la empresa" type="text"
                                   value="<?php echo $_POST['nombre_emp']; ?>" required>
                        </div>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input name="rut_emp" class="form-control" placeholder="Rut empresa" type="text"
                                   value="<?php echo $_POST['rut_emp']; ?>" required>
                        </div>
                        <div class="form-group input-group">
                            <label>Rubros:</label>
                            <select class="form-control" name="rubro" id="rubro">
                                <option value="otro">Otros</option>
                                <option value="cocina">Cocina</option>
                                <option value="abastecimiento">Abastecimiento</option>
                                <option value="logistica">Logística</option>
                                <option value="tecnologia">Tecnología</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block"> Generar empresa</button>
                        </div>
                    </form>
                </article>
            </div>
        </div>
    </div>
</div>

<?php include_once('core/footer.php'); ?>
