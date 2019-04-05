<?php
include 'metadatos.php';
include 'zone-admin.php';
require 'tblUsuarios.php';
$mensaje="alert alert-dismissible alert-danger d-none";

if(isset($_POST['name']))
{
    $usuarios=new Usuarios();
    $usuarios->setNombre($_POST['name']);
    $usuarios->setApellido($_POST['lastname']);
    $usuarios->setUser($_POST['user']);
    $usuarios->setPwd($_POST['pwd']);
    $usuarios->setIdTipoUsuario($_POST['tipoUsuario']);
    if( $usuarios->agregarUsuarios()==1)
        header("Location:usuarios.php");
    else
    $mensaje="alert alert-dismissible alert-danger ";

}





include 'header.php';
?>
    <section class="container">
        <article class="row">
            <div class="col-lg-6 offset-3 my-4">
            <div class="text-lg-center">
            <h3> Agregar Nuevo Usuario</h2>
            </div>
            <form action="addUsuarios.php" method="POST" >
                <div class="form-group row">
                   <div class="col-lg-6">
                        <label for="name">Nombre:</label>
                        <input type="text" class="form-control " id="name" name="name" required>
                   </div>
                   <div class="col-lg-6">
                        <label for="lastname">Apellido:</label>
                        <input type="text" class="form-control " id="lastname" name="lastname" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="user">Usuario:</label>
                    <input type="text" class="form-control text-lowercase" id="user" name="user" required>
                </div>
                <div class="form-group">
                    <label for="pwd">Contraseña:</label>
                    <input type="password" class="form-control text-lowercase" id="pwd" name="pwd" required>
                </div>
                <div class="form-group">
                    <label for="tipoUsuario">Tipo de Usuario:</label>
                    <select class="custom-select" name="tipoUsuario" required>
                    <option selected value="">Seleccione un tipo</option>
                    <option value="1">Administrador</option>
                    <option value="2">Docente</option>
                    <option value="3">Estudiante</option>
                    <option value="4">Invitado</option>
                    </select>
                </div>
                <div class="form-group offset-4">
                    <input class="btn btn-primary col-6" type="submit" value="Guardar">
                </div>              
            </form>
            <div class="<?php echo $mensaje ?>">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Error al Guardar </strong> <br>Intente Nuevamente
            </div>

        </article>
    </section>
<?php
include 'pie.php';
?>