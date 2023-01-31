<?php

use app\core\Application;
use app\controllers\AuthenticationController;
use app\controllers\OwnerController;
use app\controllers\VehicleController;
use app\controllers\VehicleOwnerController;

require_once dirname(__DIR__) . '/vendor/autoload.php';


// loading the .env file
$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();


// Instantiate the application object
$app = new Application(dirname(__DIR__));

// registering the routes
$app->router->get("/", [AuthenticationController::class, "gethome"]);
$app->router->get("/register", [AuthenticationController::class, "getCustomerSignupform"]);
$app->router->post("/register", [AuthenticationController::class, "registerCustomer"]);
$app->router->get("/login", [AuthenticationController::class, "login_form"]);
$app->router->post("/login", [AuthenticationController::class, "login"]);
$app->router->get("/owner", [OwnerController::class, "ownerFirstPage"]);

$app->router->get("/admin-vehicle", [OwnerController::class, "ownerVehicle"]);

$app->router->get("/logout", [AuthenticationController::class, "adminLogout"]);
$app->router->post("/logout", [AuthenticationController::class, "adminLogout"]);

$app->router->get("/add-vehicle", [VehicleController::class, "add_VehiclePage"]);
$app->router->post("/add-vehicle", [VehicleController::class, "owneraddVehicle"]);

$app->router->get("/viewVehicleProfile", [OwnerController::class, "ownerVehicleProfile"]);
$app->router->post("/viewVehicleProfile", [OwnerController::class, "ownerVehicleProfile"]);

$app->router->get("/viewVehicleowner", [OwnerController::class, "ownerVehicleOwner"]);

$app->router->get("/viewownerDriver", [OwnerController::class, "ownerDriver"]);


$app->router->get("/vehicleowner_vehicle", [VehicleOwnerController::class, "VehicleOwnerVehicle"]);

$app->router->get("/ownerProfile", [OwnerController::class, "ownerProfile"]);

$app->router->get("/adminViewVehicleOwner", [OwnerController::class, "ViewVehicleOwnerProfile"]);

// run the application
$app->run();

