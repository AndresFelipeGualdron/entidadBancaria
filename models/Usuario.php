<?php


/**
 * Description of Usuario
 *
 * @author yeison
 */
class Usuario {
    //put your code here

    public $tipoIdentificacion;
    public $nombres;
    public $password;
    
    function __construct( $tipo, $nombres, $password) {
        $this->nombres=$nombres;
        $this->password=$password;
        $this->tipoIdentificacion = $tipo;
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
