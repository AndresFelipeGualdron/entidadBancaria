<?php
    session_start();
    include ('services/Connection.php');
    include ('models/Cuenta.php');
    include ('models/Usuario.php');
    include ('models/Empleado.php');
    include 'models/Persistence.php';

    include "services/route.service.php";
    include "services/login.service.php";


//------
    $route = new Route();
    $route -> initRoute();
    
    //------------------------------------------------
