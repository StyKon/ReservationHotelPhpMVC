<?php
class Ville extends Controller
{
    public function index()
    {
        if ($this->CheckLoginAdmin())
        {
            $villes_model = $this->loadModel('VilleModel');
            $villes = $villes_model->getAllVilles();

            require 'application/views/_templates/header.php';
            require 'application/views/ville/index.php';
            require 'application/views/_templates/footer.php';
        }
    }
    public function create()
    {
        if ($this->CheckLoginAdmin())
        {
            require 'application/views/_templates/header.php';
            require 'application/views/ville/create.php';
            require 'application/views/_templates/footer.php';
        }
    }

    public function store()
    {
        if ($this->CheckLoginAdmin())
        {
            if (isset($_POST["submit_add_ville"]))
            {
                $villes_model = $this->loadModel('VilleModel');
                $villes_model->addVille($_POST["NomVille"]);
            }

            header('location: ' . URL . 'ville/index');
        }
    }

    public function edit($Id_Ville)
    {
        if ($this->CheckLoginAdmin())
        {
            if (isset($Id_Ville))
            {
                $villes_model = $this->loadModel('VilleModel');
                $ville = $villes_model->FindVilleById($Id_Ville);
            }
            require 'application/views/_templates/header.php';
            require 'application/views/ville/edit.php';
            require 'application/views/_templates/footer.php';
        }
    }

    public function update($Id_Ville)
    {
        if ($this->CheckLoginAdmin())
        {
            if (isset($_POST["submit_edit_ville"]))
            {
                $villes_model = $this->loadModel('VilleModel');
                $villes_model->editVille($_POST["NomVille"], $Id_Ville);
            }

            header('location: ' . URL . 'ville/index');
        }
    }

    public function destroy($Id_Ville)
    {
        if ($this->CheckLoginAdmin())
        {
            if (isset($Id_Ville))
            {

                $villes_model = $this->loadModel('VilleModel');
                $villes_model->deleteVille($Id_Ville);
            }

            header('location: ' . URL . 'ville/index');
        }
    }

}
?>
