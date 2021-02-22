<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Empleado
 *
 * @author yeiso
 */
class Empleado {
    //put your code here
    public $idEmpleado;
    public $nombres;
    public $cargo;

    function __construct($idEmpleado,$nombres,$cargo) {
        $this->idEmpleado = $idEmpleado;
        $this->nombres =$nombres;
        $this->cargo =$cargo;
    }
    function getCargo(){
        return $this->cargo;
    }
}
