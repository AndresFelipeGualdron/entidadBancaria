<?php
/***
 * 
 */
include_once("Usuario.php");
include_once("Connection.php");
class Persistence{
   
    function __construct(){
 
    }

    /**
     * 
     * @param Class Usuario, 
     * @param type Connection
     * @return type
     */
    function addUser($usuario, $conn){
        $var=1;
        $sql="insert into usuario (idusuario,nombres) values ('$usuario->idUsuario','$usuario->nombres')";
        $stmp = oci_parse($conn, $sql);
        oci_execute($stmp);

        return($var);
    }
    /*
    function modifyUser($idUser,$username){
        $var=1;
        $xUser =  $this->$mapUsuarios->remove($idUser);
        $this->lista->put($xUser);
        return($var);
    }

    function deleteUser($idUser){
        $var=1;
        $this->$mapUsuarios->remove($idUser);
        return($var);
    }

    function listUsers(){
        $var=1;
        foreach($this->$mapUsuarios as &$value ){
            echo $value;
        }
        return($var);
    }
    ***/
    
   
}