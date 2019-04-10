function editarUsuario(idusuario,name,lastname,user,idtipousuario)
{
    document.getElementById("idusuario").value=idusuario;
    document.getElementById("name").value=name;
    document.getElementById("lastname").value=lastname;
    document.getElementById("user").value=user;
    document.getElementById("idTipoUsuario").value=idtipousuario;
    document.getElementById("frmEdit").submit();
}