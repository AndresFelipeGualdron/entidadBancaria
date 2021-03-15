<?php


/**
 * Description of Usuario
 *
 * @author yeison
 */
class Usuario {
    //put your code here
    public $idUsuario;
    public $tipoIdentificacion;
    public $nombres;
    public $password;
    
    function __construct($id, $tipo, $nombres, $password) {
        $this->idUsuario=$id;
        $this->nombres=$nombres;
        $this->password=$password;
        $this->tipoIdentificacion = $tipo;
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
    function  setTipoIdentificacion($tipo){
        $this->tipoIdentificacion= $tipo;
    }
}
