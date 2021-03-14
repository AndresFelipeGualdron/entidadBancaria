<?php

class Connection {
    
<<<<<<< HEAD
    public static $host="db-bank.coyu3youhn6x.us-east-1.rds.amazonaws.com";
    public static $port=3306;
    public static $socket="";
    public static $user="masterUsername";
    public static $password="gualdrongualdron";
=======
    public  $host="db-bank.coyu3youhn6x.us-east-1.rds.amazonaws.com";
    public  $port=3306;
    public  $socket="";
    public  $user="masterUsername";
    public  $password="gualdrongualdron";
>>>>>>> ed26ab9f6517aaa091b00d5ab6ebde9402406719
    
    
    public  function connect3(){
        $mbd = new PDO("mysql:dbname=dbbank;host=db-bank.coyu3youhn6x.us-east-1.rds.amazonaws.com", "masterUsername", "gualdrongualdron",
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        print_r($mbd);
        
        return $mbd;
    }
}