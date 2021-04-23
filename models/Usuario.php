<?php


/**
 * Description of Usuario
 *
 * @author yeison
 */
class Usuario {
    private $is_tipoIdentificacion;
    private $is_nombre;
    private $is_password;
    
    function __construct( $as_tipoIdentificacion, $as_nombre, $as_password) 
    {
        $this->is_nombre=$as_nombre;
        $this->is_password=$as_password;
        $this->is_tipoIdentificacion = $as_tipoIdentificacion;
    }    
    function setNombres($as_nombre)
    {
        $this->is_nombre = $as_nombre;
    }
    function setPassword($as_password)
    {
        $this->is_password=$as_password;
    }
    function  setTipoIdentificacion($as_tipoIdentificacion)
    {
        $this->is_tipoIdentificacion= $as_tipoIdentificacion;
    }
    function getNombre()
    {
        return $this->is_nombre;
    }
        function getPassword()
    {
        return $this->is_password;
    }
        function getTipoIdentificacion()
    {
        return $this->is_tipoIdentificacion;
    }
}
