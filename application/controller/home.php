<?php

class Home extends Controller
{
   
    public function index()
    {
        session_start();
        $_SESSION["Admin"] = true;

        require 'application/views/home/index.php';
    }

  
    public function inscription()
    {
        require 'application/views/home/inscription.php';
    }

   
    public function myreservation()
    {
        require 'application/views/home/myreservation.php';
    }
    public function search()
    {

        $cat = $_POST["category"];
        $vil = $_POST["ville"];
        if (($_POST["ville"]) == ("All Ville"))
        {
            $vil = "";
        }

        if (($_POST["category"]) == ("All Categories"))
        {
            $cat = "";
        }
        $etat = "false";
        $name = $_POST["name"];
        $adult = $_POST["adult"];
        $kids = $_POST["kids"];
        print_r($name);
        print_r($adult);
        print_r($kids);
        if (is_array($name))
        {

            for ($i = 0;$i < count($name);$i++)
            {
                $new[$i] = $adult[$i] + $kids[$i];
                if ($new[$i] > 4) $cat = "error";
            }

            $p1 = 0;
            $p2 = 0;
            $p3 = 0;
            $p4 = 0;
            if (array_key_exists('1', array_count_values($new)))
            {
                $p1 = array_count_values($new) [1];
            }
            if (array_key_exists('2', array_count_values($new)))
            {
                $p2 = array_count_values($new) [2];
            }
            if (array_key_exists('3', array_count_values($new)))
            {
                $p3 = array_count_values($new) [3];
            }
            if (array_key_exists('4', array_count_values($new)))
            {
                $p4 = array_count_values($new) [4];
            }
           
            $NbCh = array(
                "NbCh1P" => $p1,
                "NbCh2P" => $p2,
                "NbCh3P" => $p3,
                "NbCh4P" => $p4
            );
            $NbPersonne = array_sum($kids) + array_sum($adult);
            $NbKids = array_sum($kids);
            $NbAdult = array_sum($adult);
            $DateDebut = $_POST["DateDebut"];
            $DateFin = $_POST["DateFin"];
            $Nb = array(
                "NbPersonne" => $NbPersonne,
                "NbKids" => $NbKids,
                "NbAdult" => $NbAdult,
                "DateDebut" => $DateDebut,
                "DateFin" => $DateFin
            );
            //LOAD MODEL AND GET SEARCH
            $homes_model = $this->loadModel('HomeModel');
            $hotels = $homes_model->getRecherche($NbPersonne,$etat,$vil,$cat,$p1,$p2,$p3,$p4);
            print_r($hotels);
        }
        /*  $villes = DB::table('villes')->get();
           $categorys = DB::table('categories')->get();
           return view('User.welcome',compact('hotels','villes','categorys','NbCh','Nb'));
        }else{
        $villes = DB::table('villes')->get();
        $categorys = DB::table('categories')->get();
        return view ('User.welcome',compact('villes','categorys'));
        }
        
        */

        require 'application/views/home/index.php';
    }

}

