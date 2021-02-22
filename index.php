<?php
    session_start();
    include "services/route.service.php";
    include "controllers/user.controller.php";
    $route = new Route();
    $route -> initRoute();
    UserController::init();
