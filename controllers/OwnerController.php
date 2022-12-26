<?php

namespace app\controllers;

use app\core\Request;
use app\core\Response;

class OwnerController
{

    public function ownerFirstPage(Request $req, Response $res){

         return $res->render("/admin/owner","owner-dashboard");
    }

    public function ownerVehicle(Request $req, Response $res){
        $vehicles = new VehicleController();
        $vehicle=[];
        $vehicle = $vehicles->ownerGetVehicle($req,$res);
//        print_r($vehicle);
         return $res->render("/admin/admin-vehicle","owner-dashboard",['result'=>$vehicle]);
    }


//    public function ownerLogout(){
//
//    }

}
