<?php
class HotelModel
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

    public function getAllHotels()
    {
        $sql = "SELECT * FROM hotels";
        $query = $this
            ->db
            ->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
    public function FindHotelById($Id_Hotel)
    {
        $Id_Hotel = strip_tags($Id_Hotel);
        $sql = "SELECT * FROM hotels WHERE Id_Hotel = :Id_Hotel";
        $query = $this
            ->db
            ->prepare($sql);
        $query->execute(array(
            ':Id_Hotel' => $Id_Hotel
        ));

        return $query->fetch(PDO::FETCH_OBJ);
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

    public function addHotel($NomHotel, $Id_Ville, $Id_Category)
    {
        $NomHotel = strip_tags($NomHotel);
        $Id_Ville = strip_tags($Id_Ville);
        $Id_Category = strip_tags($Id_Category);

        $sql = "INSERT INTO hotels (NomHotel, Id_Ville, Id_Category) VALUES (:NomHotel, :Id_Ville, :Id_Category)";
        $query = $this
            ->db
            ->prepare($sql);
        $query->execute(array(
            ':NomHotel' => $NomHotel,
            ':Id_Ville' => $Id_Ville,
            ':Id_Category' => $Id_Category
        ));
    }
    public function editHotel($NomHotel, $Id_Ville, $Id_Category, $Id_Hotel)
    {
        $NomHotel = strip_tags($NomHotel);
        $Id_Ville = strip_tags($Id_Ville);
        $Id_Category = strip_tags($Id_Category);
        $Id_Hotel = strip_tags($Id_Hotel);

        $sql = "UPDATE hotels set NomHotel=:NomHotel ,Id_Ville=:Id_Ville ,Id_Category=:Id_Category Where Id_Hotel=:Id_Hotel";
        $query = $this
            ->db
            ->prepare($sql);
        $query->execute(array(
            ':NomHotel' => $NomHotel,
            ':Id_Ville' => $Id_Ville,
            ':Id_Category' => $Id_Category,
            ':Id_Hotel' => $Id_Hotel
        ));
    }

    public function deleteHotel($Id_Hotel)
    {
        $Id_Hotel = strip_tags($Id_Hotel);
        $sql = "DELETE FROM hotels WHERE Id_Hotel = :Id_Hotel";
        $query = $this
            ->db
            ->prepare($sql);
        $query->execute(array(
            ':Id_Hotel' => $Id_Hotel
        ));
    }
}

