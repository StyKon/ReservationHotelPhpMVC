<?php
class ImageModel
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

    public function getAllImages()
    {
        $sql = "SELECT images.Id_Image,images.NomImage,images.PathImage,images.Id_Hotel,
        hotels.NomHotel FROM images INNER JOIN hotels ON hotels.Id_Hotel = images.Id_Hotel";
        $query = $this
            ->db
            ->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
    public function FindImageById($Id_Image)
    {
        $Id_Image = strip_tags($Id_Image);
        $sql = "SELECT * FROM images WHERE Id_Image = :Id_Image";
        $query = $this
            ->db
            ->prepare($sql);
        $query->execute(array(
            ':Id_Image' => $Id_Image
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

    public function addImage($NomImage, $PathImage, $Id_Hotel)
    {
        $NomImage = strip_tags($NomImage);
        $PathImage = strip_tags($PathImage);
        $Id_Hotel = strip_tags($Id_Hotel);

        $sql = "INSERT INTO images (NomImage, PathImage, Id_Hotel) VALUES (:NomImage, :PathImage, :Id_Hotel)";
        $query = $this
            ->db
            ->prepare($sql);
        $query->execute(array(
            ':NomImage' => $NomImage,
            ':PathImage' => $PathImage,
            ':Id_Hotel' => $Id_Hotel
        ));

    }
    public function editImage($NomImage, $PathImage, $Id_Hotel, $Id_Image)
    {
        $NomImage = strip_tags($NomImage);
        $PathImage = strip_tags($PathImage);
        $Id_Hotel = strip_tags($Id_Hotel);
        $Id_Image = strip_tags($Id_Image);

        $sql = "UPDATE images set NomImage=:NomImage,PathImage=:PathImage,Id_Hotel=:Id_Hotel WHERE Id_Image=:Id_Image";
        $query = $this
            ->db
            ->prepare($sql);
        $query->execute(array(
            ':NomImage' => $NomImage,
            ':PathImage' => $PathImage,
            ':Id_Hotel' => $Id_Hotel,
            ':Id_Image' => $Id_Image
        ));

    }

    public function deleteImage($Id_Image)
    {
        $Id_Image = strip_tags($Id_Image);
        $sql = "DELETE FROM images WHERE Id_Image = :Id_Image";
        $query = $this
            ->db
            ->prepare($sql);
        $query->execute(array(
            ':Id_Image' => $Id_Image
        ));
    }
}

