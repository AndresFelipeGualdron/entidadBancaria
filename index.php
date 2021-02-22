<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Bank App</title>
    </head>
    <body>
        <?php
        include_once("models/Usuario.php");
        include_once("models/connection.php");
        include("models/persistence.php");
        #Conexion a db
        $conn = new Connection();
        $conn->connect();
        ###
        $persistence  = new Persistence();
        $user= new Usuario(123,"Michael Perez");
        $persistence->addUser($user,$conn);
        
  
        ?>
        <h1>chocoBank</h1>
    </body>
</html>
