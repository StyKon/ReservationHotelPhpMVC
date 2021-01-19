<?php
class Home extends Controller
{

    public function index()
    {
        session_start();
        $homes_model = $this->loadModel('HomeModel');
        $villes = $homes_model->getAllVilles();
        $categorys = $homes_model->getAllCategorys();
        require 'application/views/home/index.php';
    }

    public function inscription()
    {
        require 'application/views/home/inscription.php';
    }
    public function register()
    {
        if ($this->CheckLoginAdmin())
        {
            if (isset($_POST["submit_add_client"]))
            {
                $homes_model = $this->loadModel('HomeModel');
                $homes_model->addClient($_POST["Civilite"], $_POST["Password"], $_POST["Nom"], $_POST["Prenom"], $_POST["Email"], $_POST["Mobile"], $_POST["Adresse"], $_POST["CodePostal"], $_POST["Ville"]);
            }

            header('location: ' . URL . 'home/inscription');
        }
    }

    public function myreservation()
    {
        require 'application/views/home/myreservation.php';
    }
    public function search()
    {
        session_start();
        if (isset($_POST["name"]))
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
            $homes_model = $this->loadModel('HomeModel');
            $hotels = $homes_model->getRecherche($NbPersonne, $etat, $vil, $cat, $p1, $p2, $p3, $p4);
            $villes = $homes_model->getAllVilles();
            $categorys = $homes_model->getAllCategorys();
            require 'application/views/home/index.php';
        }
        else
        {
            $homes_model = $this->loadModel('HomeModel');
            $villes = $homes_model->getAllVilles();
            $categorys = $homes_model->getAllCategorys();
            require 'application/views/home/index.php';
        }

    }

    public function reservation()
    {
        if ($this->CheckLoginClient())
        {
            $hoteljson = $_POST["hotel"];
            $hotels = json_decode($_POST["hotel"], true);
            $NbChjson = $_POST["NbCh"];
            $NbCh = json_decode($_POST["NbCh"], true);
            $Nbjson = $_POST["Nb"];
            $Nb = json_decode($_POST["Nb"], true);
            print_r($hotels);
            print_r($NbCh);
            print_r($Nb);
            $homes_model = $this->loadModel('HomeModel');
            $Chambre1Id = $homes_model->getChambreNb($hotels['Id_Hotel'], 1, $NbCh['NbCh1P']);
            print_r($Chambre1Id);
            if (!empty($Chambre1Id))
            {
                $Ch1 = $homes_model->UpdateChambreP($Chambre1Id);
                $Reservation = $homes_model->addReservation($Nb['DateDebut'], $Nb['DateFin'], $_SESSION['client']->Id_Client, $hotels['Id_Hotel'], $Chambre1Id);
            }
            $Chambre2Id = $homes_model->getChambreNb($hotels['Id_Hotel'], 2, $NbCh['NbCh2P']);
            if (!empty($Chambre2Id))
            {
                $Ch2 = $homes_model->UpdateChambreP($Chambre2Id);
                $Reservation = $homes_model->addReservation($Nb['DateDebut'], $Nb['DateFin'], $_SESSION['client']->Id_Client, $hotels['Id_Hotel'], $Chambre2Id);
            }
            $Chambre3Id = $homes_model->getChambreNb($hotels['Id_Hotel'], 3, $NbCh['NbCh3P']);
            if (!empty($Chambre3Id))
            {
                $Ch3 = $homes_model->UpdateChambreP($Chambre3Id);
                $Reservation = $homes_model->addReservation($Nb['DateDebut'], $Nb['DateFin'], $_SESSION['client']->Id_Client, $hotels['Id_Hotel'], $Chambre3Id);
            }
            $Chambre4Id = $homes_model->getChambreNb($hotels['Id_Hotel'], 4, $NbCh['NbCh4P']);
            if (!empty($Chambre4Id))
            {
                $Ch4 = $homes_model->UpdateChambreP($Chambre4Id);
                $Reservation = $homes_model->addReservation($Nb['DateDebut'], $Nb['DateFin'], $_SESSION['client']->Id_Client, $hotels['Id_Hotel'], $Chambre4Id);
            }

        }
    }

}

