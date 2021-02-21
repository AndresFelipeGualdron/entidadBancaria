<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cuenta
 *
 * @author yeison
 */
class Cuenta {
    //put your code here
    public $idCuenta;
    public $saldo;
    public $tipo;
    
    function __construct($idCuenta,$tipo) {
        $this->idCuenta=$idCuenta;
        $this->tipo=$tipo;
        $this->saldo = 0;
    }
    
    function addSaldo($saldo) {
       $this->saldo+=$saldo; 
    }
    function subSaldo($saldo) {
       $this->saldo-=$saldo; 
    }
}
