<?php

class Connection {
    
    public $host="localhost";
    public $port=3306;
    public $socket="";
    public $user="root";
    public $password="12345";
    public $dbname="dbbank";
    
    function connect(){
        
        $con = new mysqli_connect($this->host, $this->user, $this->password, $this->dbname)
                or die ('Could not connect to the database server' . mysqli_connect_error());

        return $con;
    }
    
    function connect2(){
        $conn = oci_connect($this->user, $this->password,$this->host);
        return $conn;
    }
}