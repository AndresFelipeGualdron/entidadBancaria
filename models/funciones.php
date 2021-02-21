<?php
/***
 * 
 */
include("connection.php");
$connection = connect();

function add($connection ,$code ,$username){
    $var=1;
    $sql="insert into table tableName(code,username) values ('$code','$username')";
    odbc_exec($connection, $sql) or die($var=0);
    return($var);
}

function modify($connection,$code,$username){
    $var=1;
    $sql="update tableName set username='".$username."' where code='".$code."'";
    odbc_exec($connection, $sql) or die($var=0);
    return($var);
}

function delete($connection,$code){
    $var=1;
    $sql="delete from tableName where code='".$code."'";
    odbc_exec($connection, $sql) or die($var=0);
    return($var);
}

function listUsers($connetion){
    $sql="select * from tableName";
    $rs= odbc_exec($connection, $sql);
    while(odbc_fetch_row($rs)){
        $code= odbc_result($rs, 1);
        $username= odbc_result($rs, 2);
        echo "<br>-->".$code,"--->".$username."<br>";
    }   
}
