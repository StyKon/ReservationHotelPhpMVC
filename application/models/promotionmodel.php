<?php
class PromotionModel
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

    public function getAllPromotions()
    {
        $sql = "SELECT * FROM promotions";
        $query = $this
            ->db
            ->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
    public function FindPromotionById($Id_Promotion)
    {
        $Id_Promotion = strip_tags($Id_Promotion);
        $sql = "SELECT * FROM promotions WHERE Id_Promotion = :Id_Promotion";
        $query = $this
            ->db
            ->prepare($sql);
        $query->execute(array(
            ':Id_Promotion' => $Id_Promotion
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

    public function addPromotion($DateDeb, $DateFin, $Remise, $Id_Hotel)
    {
        $DateDeb = strip_tags($DateDeb);
        $DateFin = strip_tags($DateFin);
        $Remise = strip_tags($Remise);
        $Id_Hotel = strip_tags($Id_Hotel);

        $sql = "INSERT INTO promotions (DateDeb, DateFin, Remise,Id_Hotel) VALUES (:DateDeb, :DateFin, :Remise, :Id_Hotel)";
        $query = $this
            ->db
            ->prepare($sql);
        $query->execute(array(
            ':DateDeb' => $DateDeb,
            ':DateFin' => $DateFin,
            ':Remise' => $Remise,
            ':Id_Hotel' => $Id_Hotel
        ));
    }
    public function editPromotion($DateDeb, $DateFin, $Remise, $Id_Hotel, $Id_Promotion)
    {
        $DateDeb = strip_tags($DateDeb);
        $DateFin = strip_tags($DateFin);
        $Remise = strip_tags($Remise);
        $Id_Hotel = strip_tags($Id_Hotel);
        $Id_Promotion = strip_tags($Id_Promotion);

        $sql = "UPDATE promotions SET DateDeb=:DateDeb,DateFin=:DateFin,Remise=:Remise,Id_Hotel=:Id_Hotel WHERE Id_Promotion=:Id_Promotion";
        $query = $this
            ->db
            ->prepare($sql);
        $query->execute(array(
            ':DateDeb' => $DateDeb,
            ':DateFin' => $DateFin,
            ':Remise' => $Remise,
            ':Id_Hotel' => $Id_Hotel,
            ':Id_Promotion' => $Id_Promotion
        ));
    }

    public function deletePromotion($Id_Promotion)
    {
        $Id_Promotion = strip_tags($Id_Promotion);
        $sql = "DELETE FROM promotions WHERE Id_Promotion = :Id_Promotion";
        $query = $this
            ->db
            ->prepare($sql);
        $query->execute(array(
            ':Id_Promotion' => $Id_Promotion
        ));
    }
}

