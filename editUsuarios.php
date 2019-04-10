<?php
include 'metadatos.php';
include 'zone-admin.php';
require 'tblUsuarios.php';
$mensaje="alert alert-dismissible alert-danger d-none";

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





include 'header.php';
?>
    <section class="container">
        <article class="row">
            <div class="col-lg-6 offset-3 my-4">
            <div class="text-lg-center">
            <h3> Editando Datos de usuarios

            </h3>
            </div>
            <form action="editUsuarios.php" method="POST" >
                <div class="form-group row">
                   <div class="col-lg-6">
                        <label for="name">Nombre:</label>
                        <input  type="text" class="form-control " id="namefrm" name="namefrm" value="<?php echo $_POST['name'];?>" required>
                   </div>
                   <div class="col-lg-6">
                        <label for="lastname">Apellido:</label>
                        <input type="text" class="form-control " id="lastname" name="lastname"  value="<?php echo $_POST['lastname'];?>"  required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="user">Usuario:</label>
                    <input type="text" class="form-control text-lowercase" id="user" name="user" value="<?php echo $_POST['user'];?>" required>
                </div>
                <div class="form-group">
                    <label for="pwd">Contraseña:</label>
                    <input type="password" class="form-control text-lowercase" id="pwd" name="pwd" >
                </div>
                <div class="form-group">
                    <label for="tipoUsuario">Tipo de Usuario:</label>
                    <select class="custom-select" name="idTipoUsuario" required>
                    <option <?php echo ($_POST['idTipoUsuario']==='1') ? "selected":""; ?> value="1">Administrador</option>
                    <option <?php echo ($_POST['idTipoUsuario']==='2') ? "selected":""; ?> value="2">Docente</option>
                    <option <?php echo ($_POST['idTipoUsuario']==='3') ? "selected":""; ?> value="3">Estudiante</option>
                    <option <?php echo ($_POST['idTipoUsuario']==='4') ? "selected":""; ?> value="4">Invitado</option>
                    </select>
                </div>
                <div class="form-group offset-1">
                     <input type="hidden" name="idusuario" value="<?php echo $_POST['idusuario'];?>">
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