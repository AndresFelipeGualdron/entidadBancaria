<?php

function connect(){
    
    $user="root";
    $pass="12345";
    $server="localhost";
    $db="bdBank";
    $con=mysql_connect($server,$user,$pass) or die ("Error");
    mysql_select_db($db,$con);
    
    return $con;
}