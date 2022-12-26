<?php

namespace app\controllers;

use app\core\Request;
use app\core\Response;
use app\core\Session;
use app\models\Customer;
use app\models\owner;


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

    public function registerCustomer(Request $req, Response $res): string
    {
        $body= $req->body();

        $customer = new Customer($body);
        $errors = $customer-> validateRegisterBody();

        if(empty($errors)){
            echo "Congrats, you fill the form correctly!";
            $result = customer->register();
            if($result){
                $res->render("/home","main");
            } else {
                $res->render("customer-signup", "main" );
            }

        } else {
            return $res->render(view: "customer-signup", pageParams: [
                'errors' => $errors
            ]);
        }



        return "Registering customer";

    }
    public function login_form(Request $req, Response $res): string
    {
        return $res->render("login","main");
    }

    public function admin_login(Request $req, Response $res)
    {
        $body = $req->body();
        $owner = new owner($body);
        $result = $owner->login();
        if (is_array($result)){
            return $res->render("login","main");

        }
        if ($result){
            $req->session->set("authenticated",true);
            $req->session->set("user_email",$result->email);
            $req->session->set("user_role","owner");
            return $res->render("/admin/owner","owner-dashboard");



        }

    }

    public function adminLogout(Request $req, Response $res){
        if ($req->session->get("authnticated") && $req->session->get("user_role")==="owner") {
           $req->session->destroy();
            return $res->redirect(path: "/");
        }
        return $res->redirect(path: "/");
    }




}