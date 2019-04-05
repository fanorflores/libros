<?php 
include_once 'metadatos.php';
include 'header.php';
include 'tblUsuarios.php';
include 'zone-admin.php';
$usuarios=new Usuarios();
if(isset($_POST['indicio']))
{
  $indicio=$_POST['indicio'];
  $tabla = $usuarios->listarUsuarios($indicio);

}
else
{
  $tabla = $usuarios->listarUsuarios("");
}
?>
    <section class="bs-docs-section container">
    <div class="">
    <form class="form-inline  my-4 my-lg-0" action="usuarios.php" method="POST" >
      <input class="form-control mx-4 mr-sm-10 col-7" type="text" placeholder="Buscar" name="indicio">
      <button class="btn btn-success my-2 mx-1 my-sm-0 col-2" type="submit">Buscar</button>
      <a class="btn btn-success my-2 mx-1 my-sm-0 col-2" href="addUsuarios.php">Agregar</a>
    </form>
    </div>
    <article class="row table-responsive my-1">
      <table class="table table-bordered table-hover " >
        <thead>
            <tr class="table-success">
            <th scope="col">Nombres y Apellidos</th>
            <th scope="col">Usuario</th>
            <th scope="col">Tipo de Usuario</th>
            <th scope="col">Estado</th>
            <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php 
          while ($fila=$tabla->fetch_assoc())
          {
        ?>
                <tr>
                <td><?php echo $fila['nombre']." ".$fila['apellido']; ?></td>
                <td><?php echo $fila['user']; ?></td>
                <td><?php echo $fila['descripcion']; ?></td>
                <td><?php echo $fila['suspendido'] ? "Suspendido":"Activo"; ?></td>
                <td><a href="#"><i class="fa fa-trash"></i></a> &nbsp &nbsp <a href="#"><i class="fa fa-pen-alt"></i></a></td>
                </tr>
          <?php 
            } 
          ?>
        </tbody>
       </table> 
    </article>
</section>
<?php
include 'pie.php'; 
?>