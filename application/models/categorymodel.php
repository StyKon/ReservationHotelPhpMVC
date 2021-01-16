<?php
class CategoryModel
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

    public function getAllCategorys()
    {
        $sql = "SELECT * FROM categories";
        $query = $this
            ->db
            ->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function FindCategoryById($Id_Category)
    {
        $Id_Category = strip_tags($Id_Category);
        $sql = "SELECT * FROM categories WHERE Id_Category = :Id_Category";
        $query = $this
            ->db
            ->prepare($sql);
        $query->execute(array(
            ':Id_Category' => $Id_Category
        ));
        return $query->fetch(PDO::FETCH_OBJ);
    }
    public function addCategory($TypeCat)
    {
        $TypeCat = strip_tags($TypeCat);

        $sql = "INSERT INTO categories (TypeCat) VALUES (:TypeCat)";
        $query = $this
            ->db
            ->prepare($sql);
        $query->execute(array(
            ':TypeCat' => $TypeCat
        ));
    }
    public function editCategory($TypeCat, $Id_Category)
    {
        $TypeCat = strip_tags($TypeCat);
        $Id_Category = strip_tags($Id_Category);

        $sql = "UPDATE categories set TypeCat=:TypeCat WHERE Id_Category=:Id_Category";
        $query = $this
            ->db
            ->prepare($sql);
        $query->execute(array(
            ':TypeCat' => $TypeCat,
            ':Id_Category' => $Id_Category
        ));
    }

    public function deleteCategory($Id_Category)
    {
        $Id_Category = strip_tags($Id_Category);
        $sql = "DELETE FROM categories WHERE Id_Category = :Id_Category";
        $query = $this
            ->db
            ->prepare($sql);
        $query->execute(array(
            ':Id_Category' => $Id_Category
        ));
    }
}

