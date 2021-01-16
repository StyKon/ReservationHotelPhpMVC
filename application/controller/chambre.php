<?php
class Chambre extends Controller
{
    public function index()
    {
        if ($this->CheckLoginAdmin())
        {
            $chambres_model = $this->loadModel('ChambreModel');
            $chambres = $chambres_model->getAllChambres();
            require 'application/views/_templates/header.php';
            require 'application/views/chambre/index.php';
            require 'application/views/_templates/footer.php';
        }
    }
    public function create()
    {
        if ($this->CheckLoginAdmin())
        {
            $chambres_model = $this->loadModel('ChambreModel');
            $hotels = $chambres_model->getAllHotels();
            require 'application/views/_templates/header.php';
            require 'application/views/chambre/create.php';
            require 'application/views/_templates/footer.php';
        }
    }

    public function store()
    {
        if ($this->CheckLoginAdmin())
        {
            if (isset($_POST["submit_add_chambre"]))
            {
                $chambres_model = $this->loadModel('ChambreModel');
                $chambres_model->addChambre($_POST["Num"], $_POST["NbPlace"], $_POST["Prix"], $_POST["Etat"], $_POST["Id_Hotel"]);
            }

            header('location: ' . URL . 'chambre/index');
        }
    }

    public function edit($Id_Chambre)
    {
        if ($this->CheckLoginAdmin())
        {
            if (isset($Id_Chambre))
            {
                $chambres_model = $this->loadModel('ChambreModel');
                $chambre = $chambres_model->FindChambreById($Id_Chambre);
                $hotels = $chambres_model->getAllHotels();
            }

            require 'application/views/_templates/header.php';
            require 'application/views/chambre/edit.php';
            require 'application/views/_templates/footer.php';
        }
    }

    public function update($Id_Chambre)
    {
        if ($this->CheckLoginAdmin())
        {
            if (isset($_POST["submit_edit_chambre"]))
            {
                $chambres_model = $this->loadModel('ChambreModel');
                $chambres_model->editChambre($_POST["Num"], $_POST["NbPlace"], $_POST["Prix"], $_POST["Etat"], $_POST["Id_Hotel"], $Id_Chambre);
            }

            header('location: ' . URL . 'chambre/index');
        }
    }

    public function destroy($Id_Chambre)
    {
        if ($this->CheckLoginAdmin())
        {
            if (isset($Id_Chambre))
            {
                $chambres_model = $this->loadModel('ChambreModel');
                $chambres_model->deleteChambre($Id_Chambre);
            }

            header('location: ' . URL . 'chambre/index');
        }
    }

}
?>
