<?php
/***
 * 
 */
inclide("Usuario.php");
class Persistence{
    public $map;

    
    function __construct(){
        $this->map = new \Ds\Map();;
    }


    function add($usuario){
        $var=1;
        $this->map->put($usuario->getIdUsuario,$usuario);
        return($var);
    }

    function modify($idUser,$username){
        $var=1;
        $xUser =  $this->map->remove($idUser);
        $this->lista->put($xUser);
        return($var);
    }

    function delete($idUser){
        $var=1;
        $this->map->remove($idUser);
        return($var);
    }

    function listUsers(){
        $var=1;
        foreach($this->map as &$value ){
            echo $value;
        }
        return($var);
    }
}