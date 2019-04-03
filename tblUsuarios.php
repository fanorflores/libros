<?php 
include 'conexion.php';
class Usuarios
{
    private $id;
    private $nombre; 
    private $apellido; 
    private $user; 
    private $pwd; 
    private $suspendido; 
    private $picture; 
    private $idTipoUsuario;
    private $con;

    function __construct()
    {
        $this->id=0;
        $this->nombre=""; 
        $this->apellido=""; 
        $this->user=""; 
        $this->pwd=""; 
        $this->suspendido=false; 
        $this->picture=""; 
        $this->idTipoUsuario=0;
        $this->con= new Conexion();
    }

    public function setUser($user)
    {
        $this->user=$user;
    }

    public function setPwd($pwd)
    {
        $this->pwd=$pwd;
    }

    public function usuarioExiste()
    {
        $this->con->openConection();
        $resultados=mysqli_query($this->con->getConection(),
                                "SELECT * FROM libros.usuarios
                                 where usuarios.user='$this->user';");
        $this->con->closeConection();
        return $resultados->num_rows;
    }

    public function login()
    {
        if(self::usuarioExiste()!=0)
        {
            $this->con->openConection();
            $resultados=mysqli_query($this->con->getConection(),
                                "SELECT * FROM libros.usuarios
                                 where usuarios.user='$this->user' 
                                 and usuarios.pwd='$this->pwd' and not suspendido;");
             $this->con->closeConection();
            return $resultados->num_rows;
        }
        return 0;
    }

    public function listarUsuarios($indicio)
    {
        $this->con->openConection();
        $resultados=mysqli_query($this->con->getConection(),"SELECT u.id,u.nombre,u.apellido,u.user,t.descripcion,u.suspendido FROM usuarios u inner join tipousuario t on u.idTipoUsuario=t.idTipoUsuario  where u.nombre like '%$indicio%' or u.user like '%$indicio%';");
        $this->con->closeConection();
        return $resultados;
    }

}
/*$usuarios=new Usuarios();
$usuarios->setUser('dcacers');
$usuarios->setPwd('321hacked');
echo $usuarios->login() ? "LOGIN EXITOSO" :"FALLÓ LOGIN";
*/
?>