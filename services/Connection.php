<?php

class Connection {
    
    public static $host="db-bank.coyu3youhn6x.us-east-1.rds.amazonaws.com";
    public static $port=3306;
    public static $socket="";
    public static $user="masterUsername";
    public static $password="gualdrongualdron";
    
    public function connect3(){
        $mbd = new PDO($hos, $user, $password,
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        print_r($mbd);
        
        return $mbd;
    }
}