<?php
    session_start();
    include ('services/Connection.php');
    include ('models/Cuenta.php');
    include ('models/Usuario.php');
    include 'models/Persistence.php';
    include "controllers/user.controller.php";
    include "services/route.service.php";


//------
    $route = new Route();
    $route -> initRoute();
    UserController::init();
    //------------------------------------------------
