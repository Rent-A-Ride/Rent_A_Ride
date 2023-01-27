<?php

namespace app\controllers;

use app\core\Request;
use app\core\Response;

class VehicleOwnerController
{

    // public function VehicleOwnerProfile(Request $req, Response $res){

    //      return $res->render("/admin/owner","owner-dashboard");
    // }

    public function VehicleOwnerVehicle(Request $req, Response $res){
        $vehicles = new VehicleController();
        $vehicle=[];
        $vehicle = $vehicles->vehicleownerGetVehicle($req,$res);
        
//        print_r($vehicle);
         return $res->render("/VehicleOwner/vehicleOwner_vehicle","vehicleOwner-dashboard",['result'=>$vehicle]);
    }

    

    
        
    


    




}
