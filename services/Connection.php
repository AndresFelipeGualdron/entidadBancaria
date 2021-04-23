<?php

class Connection {
    public  function connect3(){
        $mbd = new PDO("mysql:dbname=dbbank;host=dbbank.coyu3youhn6x.us-east-1.rds.amazonaws.com", "gualdronAdmin", "entidadbancaria",
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        print_r($mbd);
        
        return $mbd;
    }
}