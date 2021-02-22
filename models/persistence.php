<?php
/***
 * 
 */
include_once("Usuario.php");
include_once("Empleado.php");
include_once("Cuenta.php");
include_once("services/Connection.php");
class Persistence{
    public $conn;
   
    function __construct(){
        $this->conn =  new Connection();
    }

    /**
     * 
     * @param Class Usuario, 
     * @param type Connection
     * @return type
     */
    function addUser($usuario){
        $var=1;
        $con = $this->conn->connect3()->prepare("insert into usuario (idusuario,nombres) values ('$usuario->idUsuario','$usuario->nombres')");
        $con->execute();

        return($var);
    }
    /**
    function modifyUser($idUser,$username){
        $var=1;
        $xUser =  $this->$mapUsuarios->remove($idUser);
        $this->lista->put($xUser);
        return($var);
    }**/

    function deleteUser($idUser){
        $var=1;
        $con = $this->conn->connect3()->prepare("delete from dbBank.usuario where idusuario='".$idUser."'");
        $con->execute();
        return($var);
    }
    
    function listUsers(){
        $var=1;
        $con = $this->conn->connect3()->prepare("select * from dbBank.usuario");
        $con->execute();
        print_r($con->fetchAll());
        return($var);
    }
    
    function createAccountUsuario($cuenta, $idUsuario){
        $var=1;
        $con = $this->conn->connect3()->prepare("insert into dbbank.cuenta (idcuenta,saldo,tipo,idusuario) values (
               '".$cuenta->idCuenta."','".$cuenta->saldo."','".$cuenta->tipo."','".$idUsuario."')");
        $con->execute();
        print_r("inserted!!!");
        return($var);
    }
   
}