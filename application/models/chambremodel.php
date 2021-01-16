<?php
class ChambreModel
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

    public function getAllChambres()
    {
        $sql = "SELECT * FROM chambres";
        $query = $this
            ->db
            ->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
    public function FindChambreById($Id_Chambre)
    {
        $Id_Chambre = strip_tags($Id_Chambre);
        $sql = "SELECT * FROM chambres WHERE Id_Chambre = :Id_Chambre";
        $query = $this
            ->db
            ->prepare($sql);
        $query->execute(array(
            ':Id_Chambre' => $Id_Chambre
        ));

        return $query->fetch(PDO::FETCH_OBJ);
    }
    public function getAllHotels()
    {
        $sql = "SELECT * FROM hotels";
        $query = $this
            ->db
            ->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function addChambre($Num, $NbPlace, $Prix, $Etat, $Id_Hotel)
    {
        // clean the input from javascript code for example
        $Num = strip_tags($Num);
        $NbPlace = strip_tags($NbPlace);
        $Prix = strip_tags($Prix);
        $Etat = strip_tags($Etat);
        $Id_Hotel = strip_tags($Id_Hotel);

        $sql = "INSERT INTO chambres (Num, NbPlace, Prix,Etat,Id_Hotel) VALUES (:Num, :NbPlace, :Prix, :Etat, :Id_Hotel)";
        $query = $this
            ->db
            ->prepare($sql);
        $query->execute(array(
            ':Num' => $Num,
            ':NbPlace' => $NbPlace,
            ':Prix' => $Prix,
            ':Etat' => $Etat,
            ':Id_Hotel' => $Id_Hotel
        ));
    }
    public function editChambre($Num, $NbPlace, $Prix, $Etat, $Id_Hotel, $Id_Chambre)
    {
        $Num = strip_tags($Num);
        $NbPlace = strip_tags($NbPlace);
        $Prix = strip_tags($Prix);
        $Etat = strip_tags($Etat);
        $Id_Hotel = strip_tags($Id_Hotel);
        $Id_Chambre = strip_tags($Id_Chambre);

        $sql = "UPDATE chambres set Num=:Num,NbPlace=:NbPlace,Prix=:Prix,Etat=:Etat,Id_Hotel=:Id_Hotel WHERE Id_Chambre=:Id_Chambre ";
        $query = $this
            ->db
            ->prepare($sql);
        $query->execute(array(
            ':Num' => $Num,
            ':NbPlace' => $NbPlace,
            ':Prix' => $Prix,
            ':Etat' => $Etat,
            ':Id_Hotel' => $Id_Hotel,
            ':Id_Chambre' => $Id_Chambre
        ));
    }

    public function deleteChambre($Id_Chambre)
    {
        $Id_Chambre = strip_tags($Id_Chambre);
        $sql = "DELETE FROM chambres WHERE Id_Chambre = :Id_Chambre";
        $query = $this
            ->db
            ->prepare($sql);
        $query->execute(array(
            ':Id_Chambre' => $Id_Chambre
        ));
    }
}

