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
            $query->execute(array(
                ':DateDebut' => $DateDebut,
                ':DateFin' => $DateFin,
                ':Id_Client' => $Id_Client,
                ':Id_Hotel' => $Id_Hotel,
                ':Id_Chambre' => $Id_Chambr
            ));
        }
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

}

