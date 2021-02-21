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
        
        include ("connection.php");
        include ("models/funciones.php");

        $connection = new Connection();
        $con = $connection->connect();
        $persistence  = new Persistence();
        $persistence->add($con, $code, $username)
        
        
  
        ?>
        <h1>chocoBank</h1>
    </body>
</html>
