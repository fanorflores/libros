<?php
include 'metadatos.php';
$mensaje="alert alert-dismissible alert-danger d-none";

if(isset($_POST['user']))
{
    require 'tblUsuarios.php';
    $usuarios=new Usuarios();
    $usuarios->setUser($_POST['user']);
    $usuarios->setPwd($_POST['pwd']);
    if($usuarios->login())
    {
        $session->add('user',$_POST['user']);
         header("Location: index.php");
    }
    else
    {
        $mensaje="alert alert-dismissible alert-danger";
        $session->close();
    }
}
else
{
    if(!empty($session->get('user')))
    {
        header("Location: index.php");
    }
}
include 'header.php';

?>
    <section class="container">
        <article class="row">
            <div class="col-lg-6 offset-3 my-4">
            <div class="text-lg-center">
            <h3> Iniciar Sesión</h2>
            </div>
            <form action="login.php" method="POST" >
                <div class="form-group">
                    <label for="user">Usuario:</label>
                    <input type="text" class="form-control text-lowercase" id="user" name="user" required>
                </div>
                <div class="form-group">
                    <label for="pwd">Contraseña:</label>
                    <input type="password" class="form-control text-lowercase" id="pwd" name="pwd" required>
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Entrar">
                </div>              
            </form>
            <div class="<?php echo $mensaje ?>">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Error al Iniciar Sesión </strong> <br>Intente Nuevamente
            </div>

        </article>
    </section>
<?php
include 'pie.php';
?>