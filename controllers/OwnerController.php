<?php

namespace app\controllers;

use app\core\Request;
use app\core\Response;
use app\models\owner;

class OwnerController
{

    public function ownerFirstPage(Request $req, Response $res){
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="owner"){
            return $res->render("/admin/owner","owner-dashboard");
        }
        return $res->render("Home","home");
    }

    public function ownerProfile(Request $req, Response $res){
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="owner"){

            $ownerprofile = new owner();
            $ownerdetails  = $ownerprofile->owner_profile($req->session->get("user_id"));
            
            return $res->render("/admin/admin_profile","owner-dashboard",['owner_details'=>$ownerdetails]);
        }
        return $res->render("Home","home");

    }

    public function ownerVehicle(Request $req, Response $res){
        $vehicles = new VehicleController();
        $vehicle=[];
        $vehicle = $vehicles->ownerGetVehicle($req,$res);
//        print_r($vehicle);
         return $res->render("/admin/admin-vehicle","owner-dashboard",['result'=>$vehicle]);
    }

    public function ownerVehicleOwner(Request $req, Response $res){
        //         $vehicles = new VehicleController();
        //         $vehicle=[];
        //         $vehicle = $vehicles->ownerGetVehicle($req,$res);
        // //        print_r($vehicle);
        return $res->render("/admin/admin_VehicleOwner","owner-dashboard");
    }
        
    public function ownerDriver(Request $req, Response $res){
                //         $vehicles = new VehicleController();
                //         $vehicle=[];
                //         $vehicle = $vehicles->ownerGetVehicle($req,$res);
                // //        print_r($vehicle);
        return $res->render("/admin/admin_Driver","owner-dashboard");
    }


    


//    public function ownerLogout(){
//
//    }

}
