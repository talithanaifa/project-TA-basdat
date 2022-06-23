<?php

require_once __DIR__ . "/../vendor/autoload.php";

use BasisData\Project\App\Router;
use BasisData\Project\config\Database;
use BasisData\Project\Controller\AdminController;

Database::getConnection("prod");

Router::add("GET", "/", AdminController::class, "login");
Router::add("POST", "/", AdminController::class, "postLogin");

Router::add("GET", "/dashboard", AdminController::class, "dashboard");
Router::add("POST", "/dashboard", AdminController::class, "postDashboard");

Router::add("GET", "/customer", AdminController::class, "customers");
Router::add("POST", "/customer", AdminController::class, "postCustomers");

Router::add("GET", "/transaksi/([0-9]*)", AdminController::class, "transaksi");
Router::add("POST", "/transaksi/([0-9]*)", AdminController::class, "postTransaksi");


Router::run();