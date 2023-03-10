<?php

namespace app\controllers;

use app\core\Request;
use app\core\Response;
use app\models\customer;
use app\models\driver;
use app\models\owner;
use app\models\vehicle_Owner;

class OwnerController
{

    public function ownerFirstPage(Request $req, Response $res){
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="owner"){
            $ownerprofile = new owner();
            $owner_img  = $ownerprofile->owner_img($req->session->get("user_id"));
            return $res->render("/admin/owner","owner-dashboard",layoutParams:['profile_img'=>$owner_img]);
        }
        return $res->render("Home","home");
    }

    public function ownerProfile(Request $req, Response $res){
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="owner"){

            $ownerprofile = new owner();
            $ownerdetails  = $ownerprofile->owner_profile($req->session->get("user_id"));
            $owner_img  = $ownerprofile->owner_img($req->session->get("user_id"));
            
            
            return $res->render("/admin/admin_profile",layout:"owner-dashboard",pageParams:['owner_details'=>$ownerdetails],layoutParams:['profile_img'=>$owner_img]);
        }
        return $res->render("Home","home");

    }

    public function ownerVehicle(Request $req, Response $res){
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="owner"){    
            $vehicles = new VehicleController();
            $vehicle=[];
            $vehicle = $vehicles->ownerGetVehicle($req,$res);
            $ownerprofile = new owner();
            $owner_img  = $ownerprofile->owner_img($req->session->get("user_id"));
//        print_r($vehicle);
             return $res->render("/admin/admin-vehicle","owner-dashboard",['result'=>$vehicle],layoutParams:['profile_img'=>$owner_img]);
        }
        return $res->render("Home","home");
    }
    public function ownerVehicleProfile(Request $req, Response $res){
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="owner"){ 
             
            $vehicles = new VehicleController();
            $vehicle=[];
            $vehicle = $vehicles->viewVehicleProfile($req,$res);
            $ownerprofile = new owner();
            $owner_img  = $ownerprofile->owner_img($req->session->get("user_id"));
//        print_r($vehicle);
             return $res->render("/admin/ownerViewVehicleProfile","owner-dashboard",['result'=>$vehicle],layoutParams:['profile_img'=>$owner_img]);
        }
        return $res->render("Home","home");
    }

    public function ownerVehicleOwner(Request $req, Response $res){
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="owner"){    
            $ownerprofile = new owner();
            $owner_img  = $ownerprofile->owner_img($req->session->get("user_id"));
            $vehicleowner = new vehicle_Owner();
            $vehicleownerdetails = $vehicleowner->getVehicleowner();
            
            return $res->render("/admin/admin_VehicleOwner","owner-dashboard",pageParams:['vehicleowner'=>$vehicleownerdetails], layoutParams:['profile_img'=>$owner_img]);
        }
        return $res->render("Home","home");
    }
        
    public function ownerDriver(Request $req, Response $res){
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="owner"){
            $ownerprofile = new owner();
            $owner_img  = $ownerprofile->owner_img($req->session->get("user_id"));
            $driver = new driver();
            $driverdetails = $driver->getDriver();  
             
            return $res->render("/admin/admin_Driver","owner-dashboard",pageParams:['driver'=>$driverdetails],layoutParams:['profile_img'=>$owner_img]);
        }
        return $res->render("Home","home");
    }

    public function ViewVehicleOwnerProfile(Request $req, Response $res){
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="owner"){

            $Vehicleownerprofile = new VehicleOwnerController();
            $Vehicleownerdetails  = $Vehicleownerprofile->viewVehicleownerProfile($req,$res);
            $owner = new owner();
            $owner_img  = $owner->owner_img($req->session->get("user_id"));
            
            
            return $res->render("/admin/adminViewVehicleOwnerProfile",layout:"owner-dashboard",pageParams:['owner_details'=>$Vehicleownerdetails],layoutParams:['profile_img'=>$owner_img]);
        }
        return $res->render("Home","home");

    }

    public function admin_Customer(Request $req, Response $res){
        if ($req->session->get("authenticated")&&$req->session->get("user_role")==="owner"){
            $ownerprofile = new owner();
            $owner_img  = $ownerprofile->owner_img($req->session->get("user_id"));
            $customer = new CustomerController();
            $customerdetails=$customer->ownerGetVehicle($req,$res);
            
            
             
            return $res->render("/admin/admin_customer","owner-dashboard",pageParams:['customer'=>$customerdetails],layoutParams:['profile_img'=>$owner_img]);
        }
        return $res->render("Home","home");
    }
    


    


//    public function ownerLogout(){
//
//    }

}
