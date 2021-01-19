<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Login extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        if ($this->CheckLoginClient())
        {
            header('location: ' . URL . '');
        }else{
            require 'application/views/login/login.php';
        }
    }

    /**
     * PAGE: exampleone
     * This method handles what happens when you move to http://yourproject/home/exampleone
     * The camelCase writing is just for better readability. The method name is case insensitive.
     */
    public function loginadmin()
    {
        require 'application/views/login/loginadmin.php';
    }

    public function loginclient()
    {
        if (isset($_POST["submit_login_client"]))
        {
        $logins_model = $this->loadModel('LoginModel');
        $client=$logins_model->LoginClient($_POST["Civilite"], $_POST["Password"]);
        if (count($client)>0){
            session_start();
            $_SESSION['client'] = $client;
            header('location: ' . URL . '');
        }else{
            require 'application/views/login/login.php';
        }
        }
        
    }
    public function logout()
    {
        session_start();
        session_destroy();
        header('location: ' . URL . '');
    }

   
   
}
