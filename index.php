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
        include_once("models/Usuario.php");
        include_once("services/connection.php");
        include("models/persistence.php");
        #Conexion a db
        #$conn = new Connection();
        #$con = $conn->connect3()->prepare("SELECT * FROM dbBank.usuario");
        #$con->execute();
        #$value = $con->query("SELECT * FROM dbBank.usuario");
        #print_r($con->fetchAll());
        $persistence  = new Persistence();
        $persistence->deleteUser("123");
        $persistence->listUsers();
        
        ?>
        <h1>chocoBank</h1>
    </body>
</html>
