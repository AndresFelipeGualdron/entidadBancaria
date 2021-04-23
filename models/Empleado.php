<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Empleado
 *
 * @author yeison Gualdron
 */
class Empleado {
    //put your code here
    
    private $is_nombre;
    private $is_cargo;
    private $is_password;
    private $is_tipoIdentificacion;
    function __construct($as_nombre,$as_cargo, $as_password,$as_tipoIdentificacion) {
        $this->is_nombre =$as_nombre;
        $this->is_cargo =$as_cargo;
        $this->is_password =$as_password;
        $this->is_tipoIdentificacion = $as_tipoIdentificacion;
    }
    function getCargo(){
        return $this->is_cargo;
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
