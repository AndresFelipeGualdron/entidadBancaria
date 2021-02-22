<?php
    session_start();
    include "services/route.service.php";
    include "controllers/user.controller.php";
    include 'models/Persistence.php';
    include_once('models/Cuenta.php');
    
    $persistence = new Persistence();
    $cuenta = new Cuenta("09","Ahorros");
    $cuenta->addSaldo(500000);
    $persistence->createAccountUsuario($cuenta, "2");

//------
    $route = new Route();
    $route -> initRoute();
    UserController::init();
    //------------------------------------------------
