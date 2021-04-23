<?php
class Persistence{
    public $ic_connectionDataBase;
   
    function __construct(){
        $this->ic_connectionDataBase =  new Connection();
    }
    /**
     * 
     * @param Class Usuario, 
     * @param type Connection
     * @return type
     */
    function addUser($usuario){
        $lmsp_statement = $this->ic_connectionDataBase->connect3()->prepare("insert into dbbank.Persona (tipoIdentificacion,nombre,password) values ('$usuario->tipoIdentificacion','$usuario->nombres','$usuario->password')");
        $lmsp_statement->execute();
    }
    function addAdministrator($usuario){
        
        print_r($usuario->tipoIdentificacion);
        $lmsp_statement = $this->ic_connectionDataBase->connect3()->prepare("insert into dbbank.Empleado (password,tipoIdentificacion,nombre,cargo) "
                . "values ('$usuario->password','$usuario->tipoIdentificacion','$usuario->nombres','Administrator')");
        $lmsp_statement->execute();
    }
    function addAuditor($usuario){
        $lmsp_statement = $this->ic_connectionDataBase->connect3()->prepare("insert into dbbank.Empleado (password,tipoIdentificacion,nombre,cargo) "
                ."values ($usuario->password','$usuario->tipoIdentificacion','$usuario->nombres','Auditor')");
        $lmsp_statement->execute();
    }
    /**
    function modifyUser($idUser,$username){
        $var=1;
        $xUser =  $this->$mapUsuarios->remove($idUser);
        $this->lista->put($xUser);
        return($var);
    }**/
    function deleteUser($idUser){
        $lmsp_statement = $this->ic_connectionDataBase->connect3()->prepare("delete from dbbank.Persona where identificacion='".$idUser."'");
        $lmsp_statement->execute(); 
    }
    function listUsers(){
        
        $lmsp_statement = $this->ic_connectionDataBase->connect3()->prepare("select * from dbbank.Persona");
        $lmsp_statement->execute();
        print_r($lmsp_statement->fetchAll());
    }
    function createAccountUsuario($cuenta, $idUsuario){

        $lmsp_statement = $this->ic_connectionDataBase->connect3()->prepare("insert into dbbank.Cuenta (idCuenta,saldo,tipo,persona) values (
               '".$cuenta->idCuenta."','".$cuenta->saldo."','".$cuenta->tipo."','".$idUsuario."')");
        $lmsp_statement->execute();
    } 
    function consultarSaldo($idcuenta){
       
        $lmsp_statement = $this->ic_connectionDataBase->connect3()->prepare("select saldo from dbbank.Cuenta where idCuenta='".$idcuenta."'");
        $lmsp_statement->execute();
        $saldo = $lmsp_statement->fetch();
        return $saldo[0];
    }  
    function  addSaldoCuenta($idcuenta,$valor){
        $valorAnterior = $this->consultarSaldo($idcuenta); 
        $valorFinal = $valorAnterior + ($valor);
        $lmsp_statement = $this->ic_connectionDataBase->connect3()->prepare("update dbbank.Cuenta set saldo='".$valorFinal."' where idCuenta='".$idcuenta."'");
        $lmsp_statement->execute();
    }
    function  subSaldoCuenta($idcuenta,$valor){
        $valorFinal = $this->consultarSaldo($idcuenta) - ($valor);
        $lmsp_statement = $this->ic_connectionDataBase->connect3()->prepare("update dbbank.Cuenta set saldo='".$valorFinal."' where idcuenta='".$idcuenta."'");
        $lmsp_statement->execute();
    }    
    /**
     * 
     * @param type $cuenta1
     * @param type $cuenta2
     * Transferir dinero de la cuenta1 a la cuenta2
     */
    function transacction($idcuenta1,$idcuenta2,$valor){
        if( $this->consultarSaldo($idcuenta1)>=$valor){
            $this->subSaldoCuenta($idcuenta1,$valor);
            $this->addSaldoCuenta($idcuenta2,$valor);
            $lmsp_statement = $this->ic_connectionDataBase->connect3()->prepare("INSERT INTO dbbank.Transaccion (valor,cuentaOrigen,cuentaDestino) VALUES (
               '".$valor."','".$idcuenta1."','".$idcuenta2."')");
            $lmsp_statement->execute();
        }
    }
    function consultarMovimientosCuenta($accountId){
        $listaMovimientos= array();
        $lmsp_statement = $this->ic_connectionDataBase->connect3()->prepare("SELECT valor,fechaTransaccion,cuentaOrigen,cuentaDestino FROM dbbank.Transaccion WHERE (cuentaOrigen='".$accountId."' or cuentaDestino='".$accountId."')");
        $lmsp_statement->execute();
        while ($fila = $lmsp_statement->fetch()) {
            array_push($listaMovimientos,$fila);
        }
        return $listaMovimientos;
    }
    function todosLosMovimientos(){
        $listaMovimientos= array();
        $lmsp_statement = $this->ic_connectionDataBase->connect3()->prepare("SELECT valor,fechaTransaccion,cuentaOrigen,cuentaDestino FROM dbbank.Transaccion");
        $lmsp_statement->execute();
        while ($fila = $lmsp_statement->fetch()) {
            array_push($listaMovimientos,$fila);
        }
        return $listaMovimientos;
    }
    function totalDeTransferencias(){
        $lmsp_statement = $this->ic_connectionDataBase->connect3()->prepare("SELECT COUNT(valor) as NumeroDeTransacciones,SUM(valor) as MontoTotalDeTransacciones FROM dbbank.Transaccion");
        $lmsp_statement->execute();
        $ld_valorTotal = $lmsp_statement->fetch();
        return $ld_valorTotal;
    }
    function getUserById($user){
        $lmsp_statement = $this->ic_connectionDataBase->connect3()->prepare("select * from dbbank.User where (id = $user->idUsuario)");
        $lmsp_statement->execute();
        $lo_user = $lmsp_statement->fetch();
        return($lo_user);
    }
    function getAdministratorById($empleado){
        $lmsp_statement = $this->ic_connectionDataBase->connect3()->prepare("select * from dbbank.Administrator where (id = $empleado->idEmpleado)");
        $lmsp_statement->execute();
        $lo_adminEmpleado = $lmsp_statement->fetch();
        return($lo_adminEmpleado);
    }
    function getAuditorById($auditor){
        $lmsp_statement = $this->ic_connectionDataBase->connect3()->prepare("select * from dbbank.Auditor where (id = $auditor->idEmpleado)");
        $lmsp_statement->execute();
        $lo_auditorEmpleado = $lmsp_statement->fetch();
        return($lo_auditorEmpleado);
    }
}