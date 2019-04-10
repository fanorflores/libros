<?php
include 'metadatos.php';
include 'zone-admin.php';
require 'tblUsuarios.php';
$mensaje="alert alert-dismissible alert-danger d-none";

if(isset($_POST['idusuario']))
{
   /* echo("ME piden eliminar ".$_POST['idusuario']);
    $usuarios=new Usuarios();
    $usuarios->setNombre($_POST['name']);
    $usuarios->setApellido($_POST['lastname']);
    $usuarios->setUser($_POST['user']);
    $usuarios->setPwd($_POST['pwd']);
    $usuarios->setIdTipoUsuario($_POST['tipoUsuario']);
    if( $usuarios->agregarUsuarios()==1)
        header("Location:usuarios.php");
    else
    $mensaje="alert alert-dismissible alert-danger ";*/

}





include 'header.php';
?>
    <section class="container">
        <article class="row">
            <div class="col-lg-6 offset-3 my-4">
            <div class="text-lg-center">
            <h3> Editando Datos de usuarios <?php echo $_POST['idTipoUsuario'];?>

            </h3>
            </div>
            <form action="editUsuarios.php" method="POST" >
                <div class="form-group row">
                   <div class="col-lg-6">
                        <label for="name">Nombre:</label>
                        <input  type="text" class="form-control " id="name" name="name" value="<?php echo $_POST['name'];?>" required>
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
                    <input type="password" class="form-control text-lowercase" id="pwd" name="pwd" required>
                </div>
                <div class="form-group">
                    <label for="tipoUsuario">Tipo de Usuario:</label>
                    <select class="custom-select" name="tipoUsuario" required>
                    <option <?php echo ($_POST['idTipoUsuario']==='1') ? "selected":""; ?> value="1">Administrador</option>
                    <option <?php echo ($_POST['idTipoUsuario']==='2') ? "selected":""; ?> value="2">Docente</option>
                    <option <?php echo ($_POST['idTipoUsuario']==='3') ? "selected":""; ?> value="3">Estudiante</option>
                    <option <?php echo ($_POST['idTipoUsuario']==='4') ? "selected":""; ?> value="4">Invitado</option>
                    </select>
                </div>
                <div class="form-group offset-1">
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