<?php
/***
 * 
 */

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
        $con=null;

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
        $con = $this->conn->connect3()->prepare("delete from dbbank.Persona where idusuario='".$idUser."'");
        $con->execute();
        $con=null;
        return($var);
    }
    
    function listUsers(){
        $var=1;
        $con = $this->conn->connect3()->prepare("select * from dbbank.Persona");
        $con->execute();
        print_r($con->fetchAll());
        $con=null;
        return($var);
    }
    
    function createAccountUsuario($cuenta, $idUsuario){
        $var=1;
        $con = $this->conn->connect3()->prepare("insert into dbbank.Cuenta (idcuenta,saldo,tipo,idusuario) values (
               '".$cuenta->idCuenta."','".$cuenta->saldo."','".$cuenta->tipo."','".$idUsuario."')");
        $con->execute();
        $con=null;
        return($var);
    }
    
    function consultarSaldo($idcuenta){
        $var=1;
        $con = $this->conn->connect3()->prepare("select saldo from dbbank.Cuenta where idcuenta='".$idcuenta."'");
        $con->execute();
        $saldo = $con->fetch();
        return $saldo[0];
    }
    
    function  addSaldoCuenta($idcuenta,$valor){
        $var=1;
        $valorAnterior = $this->consultarSaldo($idcuenta); 
        
        $valorFinal = $valorAnterior + ($valor);
        $con = $this->conn->connect3()->prepare("update dbbank.Cuenta set saldo='".$valorFinal."' where idcuenta='".$idcuenta."'");
        $con->execute();
        $con=null;
        return $var;
    }
    function  subSaldoCuenta($idcuenta,$valor){
        $var=1;
        $valorFinal = $this->consultarSaldo($idcuenta) - ($valor);
        $con = $this->conn->connect3()->prepare("update dbbank.Cuenta set saldo='".$valorFinal."' where idcuenta='".$idcuenta."'");
        $con->execute();
        $con=null;
        return $var;
    }    
    /**
     * 
     * @param type $cuenta1
     * @param type $cuenta2
     * Transferir dinero de la cuenta1 a la cuenta2
     */
    function transacction($idcuenta1,$idcuenta2,$valor){
        $var=1;
        if( $this->consultarSaldo($idcuenta1)>=$valor){
            $this->subSaldoCuenta($idcuenta1,$valor);
            $this->addSaldoCuenta($idcuenta2,$valor);
            $con = $this->conn->connect3()->prepare("INSERT INTO dbbank.Transaccion (valor,cuentaOrigen,cuentaDestino) VALUES (
               '".$valor."','".$idcuenta1."','".$idcuenta2."')");
            $con->execute();
            $con=null;
        } else {
            #echo "transaccion fallida";
            
        }
        #print_r("transaccion realizada!!!");
        $con=null;
        return $var;
    }
    function consultarMovimientosCuenta($accountId){
        $listaMovimientos= array();
        $con = $this->conn->connect3()->prepare("SELECT valor,fechaHora,cuentaOrigen,cuentaDestino FROM dbbank.Transaccion WHERE (cuentaOrigen='".$accountId."' or cuentaDestino='".$accountId."')");
        $con->execute();
        while ($fila = $con->fetch()) {
            array_push($listaMovimientos,$fila);
        }
        
        return $listaMovimientos;
        
    }
    function todosLosMovimientos(){
        $listaMovimientos= array();
        $con = $this->conn->connect3()->prepare("SELECT valor,fechaHora,cuentaOrigen,cuentaDestino FROM dbbank.Transaccion");
        $con->execute();
        while ($fila = $con->fetch()) {
            array_push($listaMovimientos,$fila);
        }
        return $listaMovimientos;
    }
    function totalDeTransferencias(){
        $fila=1;
        $con = $this->conn->connect3()->prepare("SELECT COUNT(valor) as NumeroDeTransacciones,SUM(valor) as MontoTotalDeTransacciones FROM dbbank.Transaccion");
        $con->execute();
        $fila = $con->fetch();
        return $fila;
    }
}