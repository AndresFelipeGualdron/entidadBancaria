<?php
/***
 * 
 */
inclide("Usuario.php");
class Persistence{
    //MAP Usuarios
    public $mapUsuarios;
    //MAP Cuenta
    public $mapCuentas;
    //MAP Empleados
    public $mapEmpleados;

    
    function __construct(){
        $this->$mapUsuarios = new \Ds\Map();
        $this->$mapCuentas = new \Ds\Map();
        $this->$mapEmpleados = new \Ds\Map();
    }


    function addUser($usuario){
        $var=1;
        $this->$mapUsuarios->put($usuario->getIdUsuario,$usuario);
        return($var);
    }

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
}