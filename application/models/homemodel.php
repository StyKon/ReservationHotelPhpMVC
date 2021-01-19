<?php
class HomeModel
{

    function __construct($db)
    {
        try
        {
            $this->db = $db;
        }
        catch(PDOException $e)
        {
            exit('Database connection could not be established.');
        }
    }
    public function addClient($Civilite, $Password, $Nom, $Prenom, $Email, $Mobile, $Adresse, $CodePostal, $Ville)
    {
        // clean the input from javascript code for example
        $Civilite = strip_tags($Civilite);
        $Nom = strip_tags($Nom);
        $Prenom = strip_tags($Prenom);
        $Email = strip_tags($Email);
        $Mobile = strip_tags($Mobile);
        $Adresse = strip_tags($Adresse);
        $CodePostal = strip_tags($CodePostal);
        $Ville = strip_tags($Ville);
        $Password= sha1(md5(sha1(md5($Password))));
        $sql = "INSERT INTO clients (Civilite, Password, Nom,Prenom,Email,Mobile,Adresse,CodePostal,Ville) VALUES ( :Civilite,  :Password, :Nom, :Prenom, :Email, :Mobile, :Adresse, :CodePostal, :Ville)";
      
            $query = $this
                ->db
                ->prepare($sql);
            $query->execute(array(
                ':Civilite' => $Civilite,
                ':Password' => $Password,
                ':Nom' => $Nom,
                ':Prenom' => $Prenom,
                ':Email' => $Email,
                ':Mobile' => $Mobile,
                ':Adresse' => $Adresse,
                ':CodePostal' => $CodePostal,
                ':Ville' => $Ville
            ));
       
    }
    public function getRecherche($NbPersonne, $etat, $vil, $cat, $p1, $p2, $p3, $p4)
    {
        $sql = "SELECT hotels.Id_Hotel, hotels.Id_Category, hotels.Id_Ville, hotels.NomHotel,
         villes.NomVille, chambres.Prix *:NbPersonne AS PrixTot,
         categories.TypeCat, images.PathImage, count(CASE WHEN chambres.NbPlace = '1' THEN 1 END)
         AS count1, count(CASE WHEN chambres.NbPlace = '2' THEN 1 END)
         AS count2, count(CASE WHEN chambres.NbPlace = '3' THEN 1 END) 
         AS count3, count(CASE WHEN chambres.NbPlace = '4' THEN 1 END)
         AS count4 
         FROM hotels 
         INNER JOIN categories ON hotels.Id_Category = categories.Id_Category 
         INNER JOIN villes ON hotels.Id_Ville = villes.Id_Ville 
         INNER JOIN chambres ON hotels.Id_Hotel = chambres.Id_Hotel 
         INNER JOIN images ON hotels.Id_Hotel = images.Id_Hotel 
         WHERE chambres.Etat = :etat 
         AND villes.Id_Ville = IF(:vil = '', villes.Id_Ville, :vil)
         AND categories.Id_Category = IF(:cat = '', categories.Id_Category, :cat)
         GROUP BY hotels.Id_Hotel HAVING count1 >= :p1 
         AND count2 >= :p2 AND count3 >= :p3 AND count4 >= :p4";
        $query = $this
            ->db
            ->prepare($sql);
        $query->execute(array(
            ':NbPersonne' => $NbPersonne,
            ':etat' => $etat,
            ':vil' => $vil,
            ':cat' => $cat,
            ':p1' => $p1,
            ':p2' => $p2,
            ':p3' => $p3,
            ':p4' => $p4
        ));

        return $query->fetchAll(); //(PDO::FETCH_OBJ);
        
    }
    public function getChambreNb($Id_Hotel, $NbPlace, $NbChP)
    {
        $sql = "SELECT Id_Chambre FROM chambres WHERE Id_Hotel = :Id_Hotel
        AND NbPlace = :NbPlace AND Etat = 'false' LIMIT :NbChP ";
        $query = $this
            ->db
            ->prepare($sql);
        $query->bindParam(':Id_Hotel', $Id_Hotel, PDO::PARAM_INT);
        $query->bindParam(':NbPlace', $NbPlace);
        $query->bindParam(':NbChP', $NbChP, PDO::PARAM_INT);
        $query->execute();

        return $query->fetchAll(); //(PDO::FETCH_OBJ);
        
    }

    public function UpdateChambreP($Id_Chambre)
    {
        $sql = "UPDATE chambres set Etat='true' WHERE Id_Chambre = :Id_Chambre ";
        foreach ($Id_Chambre as $Id_Chambr)
        {
            $query = $this
                ->db
                ->prepare($sql);
            $query->bindParam(':Id_Chambre', $Id_Chambr->Id_Chambre);
            $query->execute();
        }
    }

    public function addReservation($DateDebut, $DateFin, $Id_Client, $Id_Hotel, $Id_Chambre)
    {
        // clean the input from javascript code for example
        $DateDebut = strip_tags($DateDebut);
        $DateFin = strip_tags($DateFin);
        $Id_Client = strip_tags($Id_Client);
        $Id_Hotel = strip_tags($Id_Hotel);
        // $Id_Chambre = strip_tags($Id_Chambre);
        $sql = "INSERT INTO reservations (DateDebut, DateFin, Id_Client,Id_Hotel,Id_Chambre) VALUES ( :DateDebut,  :DateFin,  :Id_Client, :Id_Hotel, :Id_Chambre)";
        foreach ($Id_Chambre as $Id_Chambr)
        {
            $query = $this
                ->db
                ->prepare($sql);
                $query->bindParam(':DateDebut', $DateDebut);
                $query->bindParam(':DateFin', $DateFin);
                $query->bindParam(':Id_Client', $Id_Client);
                $query->bindParam(':Id_Hotel', $Id_Hotel);
                $query->bindParam(':Id_Chambre', $Id_Chambr->Id_Chambre);
                $query->execute();
        }
    }
    public function myReservation($Id_Client)
    {
        $sql = "SELECT reservations.Id_Reservation,reservations.DateDebut
        ,reservations.DateFin,reservations.Id_Chambre,hotels.NomHotel 
        FROM reservations 
        INNER JOIN hotels ON hotels.Id_Hotel = reservations.Id_Hotel  
        WHERE Id_Client = :Id_Client ";
        $query = $this
            ->db
            ->prepare($sql);
        $query->bindParam(':Id_Client', $Id_Client);
        $query->execute();

        return $query->fetchAll(); //(PDO::FETCH_OBJ);
        
    }
    
    public function getAllVilles()
    {
        $sql = "SELECT * FROM villes";
        $query = $this
            ->db
            ->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
    public function getAllCategorys()
    {
        $sql = "SELECT * FROM categories";
        $query = $this
            ->db
            ->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
    public function AnnulerReservation($Id_Reservation)
    {
        $Id_Reservation = strip_tags($Id_Reservation);
        $sql = "DELETE FROM reservations WHERE Id_Reservation = :Id_Reservation";
        $query = $this
            ->db
            ->prepare($sql);
        $query->execute(array(
            ':Id_Reservation' => $Id_Reservation
        ));
    }
    public function UpdateChambreAfterCancelReservation($Id_Chambre)
    {
        $sql = "UPDATE chambres set Etat='false' WHERE Id_Chambre = :Id_Chambre ";
     
            $query = $this
                ->db
                ->prepare($sql);
            $query->bindParam(':Id_Chambre',$Id_Chambre);
            $query->execute();
       
    }

}

