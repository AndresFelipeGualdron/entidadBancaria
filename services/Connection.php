<?php

class Connection {
    
    public static $host="localhost";
    public static $port=3306;
    public static $socket="";
    public static $user="root";
    public static $password="12345";
    public static $dbname="dbbank";
    
    function connect(){
        
        $con = new mysqli_connect($this->host, $this->user, $this->password, $this->dbname)
                or die ('Could not connect to the database server' . mysqli_connect_error());

        return $con;
    }
    
    function connect2(){
        $conn = oci_connect($this->user, $this->password,$this->host);
        return $conn;
    }
    
    public function connect3(){
        $mbd = new PDO('mysql:host=localhost;dbname=dbBank', "root", "12345",
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        print_r($mbd);
        
        return $mbd;
    }
}