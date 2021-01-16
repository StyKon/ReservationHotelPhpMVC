<?php
class Hotel extends Controller
{
    public function index()
    {
        if ($this->CheckLoginAdmin())
        {
            $hotels_model = $this->loadModel('HotelModel');
            $hotels = $hotels_model->getAllHotels();

            require 'application/views/_templates/header.php';
            require 'application/views/hotel/index.php';
            require 'application/views/_templates/footer.php';
        }
    }
    public function create()
    {
        if ($this->CheckLoginAdmin())
        {
            $hotels_model = $this->loadModel('HotelModel');
            $villes = $hotels_model->getAllVilles();
            $categorys = $hotels_model->getAllCategorys();

            require 'application/views/_templates/header.php';
            require 'application/views/hotel/create.php';
            require 'application/views/_templates/footer.php';
        }
    }

    public function store()
    {
        if ($this->CheckLoginAdmin())
        {
            if (isset($_POST["submit_add_hotel"]))
            {
                $hotels_model = $this->loadModel('HotelModel');
                $hotels_model->addHotel($_POST["NomHotel"], $_POST["Id_Ville"], $_POST["Id_Category"]);
            }
            header('location: ' . URL . 'hotel/index');
        }
    }

    public function edit($Id_Hotel)
    {
        if ($this->CheckLoginAdmin())
        {
            if (isset($Id_Hotel))
            {
                $hotels_model = $this->loadModel('HotelModel');
                $villes = $hotels_model->getAllVilles();
                $categorys = $hotels_model->getAllCategorys();
                $hotel = $hotels_model->FindHotelById($Id_Hotel);
            }
            require 'application/views/_templates/header.php';
            require 'application/views/hotel/edit.php';
            require 'application/views/_templates/footer.php';
        }
    }

    public function update($Id_Hotel)
    {
        if ($this->CheckLoginAdmin())
        {
            if (isset($_POST["submit_edit_hotel"]))
            {
                $hotels_model = $this->loadModel('HotelModel');
                $hotels_model->editHotel($_POST["NomHotel"], $_POST["Id_Ville"], $_POST["Id_Category"], $Id_Hotel);
            }

            header('location: ' . URL . 'hotel/index');
        }
    }

    public function destroy($Id_Hotel)
    {
        if ($this->CheckLoginAdmin())
        {
            if (isset($Id_Hotel))
            {
                $hotels_model = $this->loadModel('HotelModel');
                $hotels_model->deleteHotel($Id_Hotel);
            }

            header('location: ' . URL . 'hotel/index');
        }
    }

}
?>
