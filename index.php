<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
    session_start();
    include "services/route.service.php";
    $route = new Route();
    $route -> initRoute();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Bank App</title>
    </head>
    <body>
        <?php
        
        #include ("connect/connection.php");
        #include ("funciones.php");
        #$connection = connectDBc();
  
        ?>
        <h1>chocoBank</h1>
    </body>
</html>
