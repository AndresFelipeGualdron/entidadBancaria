<?php

class Connection {
    
    public $host="localhost";
    public $port=3306;
    public $socket="";
    public $user="root";
    public $password="";
    public $dbname="dbbank";
    
    function connect(){
        $con = new mysqli($this->host, $this->user, $this->password, $this->dbname, $this->port, $this->socket)
                or die ('Could not connect to the database server' . mysqli_connect_error());

        return $con;
    }
}