<?php
class Conexion
{
    private $server;
    private $user;
    private $pwd;
    private $db;
    private $conexion;

    function __construct()
    {
        $this->server="127.0.0.1";
        $this->user="root";
        $this->pwd="";
        $this->db="libros";
        $this->conexion=null;
    }

    public function openConection()
    {
        $this->conexion=new mysqli($this->server, $this->user, $this->pwd, $this->db);
    }
    public function getConection()
    {
       return $this->conexion;
    }

    public function closeConection()
    {
        $this->conexion->close();
    }

}
    /* $con = new Conexion();
    $con->openConection();
    if($con->getConexion()->connect_error)
    {
        echo 'Error de conexion';
    }
    else
    {
        echo 'Todo OK';
        $con->closeConection();
    } */

?>