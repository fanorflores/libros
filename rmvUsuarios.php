<?php
include 'metadatos.php';
include 'zone-admin.php';
require 'tblUsuarios.php';
$mensaje="alert alert-dismissible alert-danger d-none";
 /*
if(isset($_POST['idusuario']))
{
    if(isset($_POST['namefrm']))
    {
       $usuarios=new Usuarios();
        $usuarios->setId($_POST['idusuario']);
        $usuarios->setNombre($_POST['namefrm']);
        $usuarios->setApellido($_POST['lastname']);
        $usuarios->setUser($_POST['user']);
        $usuarios->setPwd($_POST['pwd']);
        $usuarios->setIdTipoUsuario($_POST['idTipoUsuario']);
        if( $usuarios->editarUsuarios()==1)
            header("Location:usuarios.php");
        else
        $mensaje="alert alert-dismissible alert-danger ";
        }

}
else{
    header("Location:usuarios.php");
}

*/



include 'header.php';
?>
    <section class="container">
        <article class="row">
            <div class="col-lg-6 offset-3 my-4">
            <div class="text-lg-center">
            <h3> Elimar  Datos de usuarios

            </h3>
            </div>
            <form action="rmvUsuarios.php" method="POST" >
            <div class="alert alert-danger" role="alert">
                Seguro que desea Elimar al Usuario ********
            </div>
                <div class="form-group offset-1">
                     <input type="hidden" name="idusuario" value="">
                    <a href="usuarios.php" class="btn btn-secondary col-4 offset-1"  >Cancelar</a>
                    <input class="btn btn-primary col-4 offset-1" type="submit" value="Guardar">
                </div>
            </form>
            <div class="<?php echo $mensaje ?>">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Error al Actualizar </strong> <br>Intente Nuevamente
            </div>

        </article>
    </section>
<?php
include 'pie.php';
?>