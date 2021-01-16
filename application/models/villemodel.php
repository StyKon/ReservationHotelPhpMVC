<?php
class VilleModel
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

    public function getAllVilles()
    {
        $sql = "SELECT * FROM villes";
        $query = $this
            ->db
            ->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
    public function FindVilleById($Id_Ville)
    {
        $Id_Ville = strip_tags($Id_Ville);
        $sql = "SELECT * FROM villes WHERE Id_Ville = :Id_Ville";
        $query = $this
            ->db
            ->prepare($sql);
        $query->execute(array(
            ':Id_Ville' => $Id_Ville
        ));

        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function addVille($NomVille)
    {
        $NomVille = strip_tags($NomVille);

        $sql = "INSERT INTO villes (NomVille) VALUES (:NomVille)";
        $query = $this
            ->db
            ->prepare($sql);
        $query->execute(array(
            ':NomVille' => $NomVille
        ));
    }
    public function editVille($NomVille, $Id_Ville)
    {
        $NomVille = strip_tags($NomVille);
        $Id_Ville = strip_tags($Id_Ville);
        $sql = "UPDATE villes set NomVille=:NomVille  WHERE Id_Ville=:Id_Ville ";
        $query = $this
            ->db
            ->prepare($sql);
        $query->execute(array(
            ':NomVille' => $NomVille,
            ':Id_Ville' => $Id_Ville
        ));
    }

    public function deleteVille($Id_Ville)
    {
        $Id_Ville = strip_tags($Id_Ville);
        $sql = "DELETE FROM villes WHERE Id_Ville = :Id_Ville";
        $query = $this
            ->db
            ->prepare($sql);
        $query->execute(array(
            ':Id_Ville' => $Id_Ville
        ));
    }
}

