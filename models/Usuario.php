<?php


/**
 * Description of Usuario
 *
 * @author yeison
 */
class Usuario {
    //put your code here
    public $idUsuario;
    public $nombres;
    public $password;
    
    function __construct($id, $nombres, $password) {
        $this->idUsuario=$id;
        $this->nombres=$nombres;
        $this->password=$password;
    }
    
    function setIdUsuario($id){
        $this->idUsuario = $id;
    }
    function setNombres($nombres){
        $this->nombres = $nombres;
    }
    function setPassword($password){
        $this->password=$password;
    }
}
