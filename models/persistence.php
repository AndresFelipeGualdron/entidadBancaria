<?php
/***
 * 
 */
inclide("Usuario.php");
class Persistence{
    //MAP Usuarios
    public $mapUsuarios;
    //MAP Cuenta
    public 

    
    function __construct(){
        $this->$mapUsuarios = new \Ds\Map();;
    }


    function add($usuario){
        $var=1;
        $this->$mapUsuarios->put($usuario->getIdUsuario,$usuario);
        return($var);
    }

    function modify($idUser,$username){
        $var=1;
        $xUser =  $this->$mapUsuarios->remove($idUser);
        $this->lista->put($xUser);
        return($var);
    }

    function delete($idUser){
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
}