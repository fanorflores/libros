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

    public function setId($id)
    {
        $this->id=$id;
    }
    public function setNombre($nombre)
    {
        $this->nombre=$nombre;
    }
    public function setApellido($apellido)
    {
        $this->apellido=$apellido;
    }
    
    public function setUser($user)
    {
        $this->user=$user;
    }

    public function setPwd($pwd)
    {
        $this->pwd=$pwd;
    }
    public function setIdTipoUsuario($idTipoUsuario)
    {
        $this->idTipoUsuario=$idTipoUsuario;
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
            $resultados=mysqli_query($this->con->getConection(),"call login('$this->user', '$this->pwd');");
             $this->con->closeConection();
            return $resultados->num_rows;
        }
        return 0;
    }

    public function getIdBd()
    {
        $this->con->openConection();
        $resultados=mysqli_query($this->con->getConection(),"SELECT  id FROM libros.usuarios order by id desc limit 1;");
        $this->con->closeConection();
        $id= $resultados->fetch_assoc(); 
        self::setId($id['id']+1);
        //return $id['id']+1;
    }

    public function listarUsuarios($indicio)
    {
        $this->con->openConection();
        $resultados=mysqli_query($this->con->getConection(),"SELECT u.id,u.nombre,u.apellido,u.user,t.idTipoUsuario,t.descripcion,u.suspendido FROM usuarios u inner join tipousuario t on u.idTipoUsuario=t.idTipoUsuario  where u.nombre like '%$indicio%' or u.user like '%$indicio%' order by id desc;");
        $this->con->closeConection();
        return $resultados;
    }
    public function agregarUsuarios()
    {
        self::getIdBd();
        $this->con->openConection();
        $resultados=mysqli_query($this->con->getConection(),"INSERT INTO usuarios (id, nombre, apellido, user, pwd, suspendido, idTipoUsuario) 
                                                                VALUES ('$this->id', '$this->nombre', '$this->apellido', '$this->user', '$this->pwd', '0', '$this->idTipoUsuario');");
        $registros=$this->con->getConection()->affected_rows;
        $this->con->closeConection();
        return $registros;
    }

}
/*$usuarios=new Usuarios();
$usuarios->setNombre('Marcos');
$usuarios->setApellido('Aguirre');
$usuarios->setUser('marcos');
$usuarios->setPwd('0000');
$usuarios->setIdTipoUsuario(3);
echo $usuarios->agregarUsuarios();*/



?>