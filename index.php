<?php
    session_start();
    include "services/route.service.php";
    include "controllers/user.controller.php";
    include 'models/Persistence.php';
    include_once('models/Cuenta.php');
    $route = new Route();
    $route -> initRoute();
    UserController::init();
    $persistence = new Persistence();
    $cuenta = new Cuenta("01","Ahorros");
    $cuenta->addSaldo(500000);
    $persistence->createAccountUsuario($cuenta, "2");
