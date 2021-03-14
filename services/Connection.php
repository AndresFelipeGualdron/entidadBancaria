<?php

class Connection {
    
    public  $host="db-bank.coyu3youhn6x.us-east-1.rds.amazonaws.com";
    public  $port=3306;
    public  $socket="";
    public  $user="masterUsername";
    public  $password="gualdrongualdron";
    
    
    public  function connect3(){
        $mbd = new PDO("mysql:dbname=dbbank;host=db-bank.coyu3youhn6x.us-east-1.rds.amazonaws.com", "masterUsername", "gualdrongualdron",
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        print_r($mbd);
        
        return $mbd;
    }
}