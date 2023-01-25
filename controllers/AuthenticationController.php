<?php

namespace app\controllers;

use app\core\Request;
use app\core\Response;
use app\core\Session;
use app\models\Customer;
use app\models\driver;
use app\models\owner;
use app\models\user;
use app\models\vehicle_Owner;

class AuthenticationController
{
    public function gethome(Request $req, Response $res): string
    {
        return $res->render("Home","home");
    }
    public function getCustomerSignupform(Request $req, Response $res): string
    {
        return $res->render("register","main");
    }

    // public function registerCustomer(Request $req, Response $res): string
    // {
    //     $body= $req->body();

    //     $customer = new Customer($body);
    //     $errors = $customer-> validateRegisterBody();

    //     if(empty($errors)){
    //         echo "Congrats, you fill the form correctly!";
    //         $result = customer->register();
    //         if($result){
    //             $res->render("/home","main");
    //         } else {
    //             $res->render("customer-signup", "main" );
    //         }

    //     } else {
    //         return $res->render(view: "customer-signup", pageParams: [
    //             'errors' => $errors
    //         ]);
    //     }



    //     return "Registering customer";

    // }
    public function login_form(Request $req, Response $res): string
    {
        return $res->render("login","main");
    }

    public function login(Request $req, Response $res)
    {
        $body = $req->body();
        $user = new user($body);
        $result = $user->login();
        // var_dump($result);
        // die();

        if (is_array($result)){
            return $res->render("login","main",pageParams:['errors' => $result]);

        }
        else {
            $user_id=$result->user_ID;
            // var_dump($user_id);
            // die();
            $owner = new owner($body);
            $result1=$owner->owner_login($user_id);
            if (is_array($result1)) {

                $vehicle_owner=new vehicle_Owner($body);
                $result2=$vehicle_owner->vehicle_Owner_login($user_id);
                if (is_array($result2)) {
                    $driver=new driver($body);
                    $result3=$driver->driver_login($user_id);
                    if (is_array($result3)) {
                        // $req->session->set("authenticated",true);
                        // $req->session->set("user_email",$result->email);
                        // $req->session->set("user_role","customer");
                        // return $res->render("/customer/customer","customer-dashboard");
                
                    }
                    else {
                        $req->session->set("user_id",$result->user_ID);
                        $req->session->set("authenticated",true);
                        $req->session->set("user_email",$result->email);
                        $req->session->set("user_role","driver");
                        return $res->render("/driver/driver","driver-dashboard");
                    
                }
                
                }
                else {
                    $req->session->set("user_id",$result->user_ID);
                    $req->session->set("authenticated",true);
                    $req->session->set("user_email",$result->email);
                    $req->session->set("user_role","vehicleowner");
                    return $res->render("/VehicleOwner/vehicleowner","vehicleOwner-dashboard");
                    
                }


                
            }
            else {
                $req->session->set("user_id",$result->user_ID);
                $req->session->set("authenticated",true);
                $req->session->set("user_email",$result->email);
                $req->session->set("user_role","owner");
                return $res->render("/admin/owner","owner-dashboard");
                
            }

            
        }


    }

    // public function admin_login(Request $req, Response $res)
    // {
    //     $body = $req->body();
    //     $owner = new owner($body);
    //     $result = $owner->login();
        
    //     if (is_array($result)){
    //         return $res->render("login","main");

    //     }
    //     if ($result){
    //         $req->session->set("authenticated",true);
    //         $req->session->set("user_email",$result->email);
    //         $req->session->set("user_role","owner");
    //         return $res->render("/admin/owner","owner-dashboard");



    //     }

    // }

    public function adminLogout(Request $req, Response $res){
        if ($req->session->get("authenticated") && $req->session->get("user_role") ==="owner") {
           $req->session->destroy();
            return $res->redirect(path: "/");
        }
        return $res->redirect(path: "/");
    }




}