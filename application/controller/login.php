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
        session_start();
        if (isset($_SESSION['client']))
        {
            header('location: ' . URL . '');
        }
        else
        {
            require 'application/views/login/login.php';
        }
    }

    public function admin()
    {
        session_start();
        if (isset($_SESSION['admin']))
        {
            header('location: ' . URL . 'chambre');
        }
        else
        {
            require 'application/views/login/loginadmin.php';
        }
    }
    public function loginadmin()
    {
        session_start();
        if (isset($_POST["submit_login_admin"]))
        {
            $logins_model = $this->loadModel('LoginModel');
            $admin = $logins_model->LoginAdmin($_POST["Login"], $_POST["Password"]);
            if (!empty($admin))
            {
                $_SESSION['admin'] = $admin;
                header('location: ' . URL . 'category');
            }
            else
            {
                header('location: ' . URL . 'login/admin');
            }
        }
    }

    public function loginclient()
    {
        session_start();
        if (isset($_POST["submit_login_client"]))
        {
            $logins_model = $this->loadModel('LoginModel');
            $client = $logins_model->LoginClient($_POST["Civilite"], $_POST["Password"]);
            if (!empty($client))
            {
                session_start();
                $_SESSION['client'] = $client;
                header('location: ' . URL . '');
            }
            else
            {
                header('location: ' . URL . 'login');
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

