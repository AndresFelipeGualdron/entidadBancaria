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
    
    function __construct($id, $nombres) {
        $this->idUsuario=$id;
        $this->nombres=$nombres;
    }
    
    function setIdUsuario($id){
        $this->idUsuario = $id;
    }
    function setNombres($nombres){
        $this->nombres = $nombres;
    }
}
