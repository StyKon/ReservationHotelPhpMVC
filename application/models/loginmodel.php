<?php
class LoginModel
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
   
   

    public function LoginClient($Civilite,$Password)
    {
        $Civilite = strip_tags($Civilite);
        $Password= sha1(md5(sha1(md5($Password))));
        $sql = "SELECT Id_Client,Civilite,Nom,Prenom,Email,Mobile,Adresse,CodePostal,Ville FROM clients WHERE Civilite=:Civilite AND Password=:Password";
        $query = $this
            ->db
            ->prepare($sql);
        $query->execute(array(
            ':Civilite' => $Civilite,
            ':Password' => $Password
        ));

        return $query->fetch(PDO::FETCH_OBJ);
    }
    

}

