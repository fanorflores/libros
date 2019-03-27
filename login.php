<?php
include 'metadatos.php';
include 'header.php';
?>
    <section class="container">
        <article class="row">
            <div class="col-lg-6 offset-3 my-4">
            <div class="text-lg-center">
            <h3> Iniciar Sesión</h2>
            </div>
            <form action="login.php">
                <div class="form-group">
                    <label for="user">Usuario:</label>
                    <input type="text" class="form-control" id="user" name="user" required>
                </div>
                <div class="form-group">
                    <label for="pwd">Contraseña:</label>
                    <input type="password" class="form-control" id="pwd" name="pwd" required>
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Entrar">
                </div>
            </form>
            </div>
        </article>
    </section>
<?php
include 'pie.php';
?>