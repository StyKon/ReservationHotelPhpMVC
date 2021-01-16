<?php
class Promotion extends Controller
{
    public function index()
    {
        if ($this->CheckLoginAdmin())
        {
            $promotions_model = $this->loadModel('PromotionModel');
            $promotions = $promotions_model->getAllPromotions();

            require 'application/views/_templates/header.php';
            require 'application/views/promotion/index.php';
            require 'application/views/_templates/footer.php';
        }
    }
    public function create()
    {
        if ($this->CheckLoginAdmin())
        {
            $promotions_model = $this->loadModel('PromotionModel');
            $hotels = $promotions_model->getAllHotels();
            require 'application/views/_templates/header.php';
            require 'application/views/promotion/create.php';
            require 'application/views/_templates/footer.php';
        }
    }

    public function store()
    {
        if ($this->CheckLoginAdmin())
        {
            if (isset($_POST["submit_add_promotion"]))
            {
                $i = 0;
                $promotions_model = $this->loadModel('PromotionModel');
                foreach ($_POST["Id_Hotel"] as $Id_Hotel)
                {
                    $promotions_model->addPromotion($_POST["DateDeb"], $_POST["DateFin"], $_POST["Remise"], $_POST["Id_Hotel"][$i]);
                    $i++;
                }
            }
            header('location: ' . URL . 'promotion/index');
        }
    }

    public function edit($Id_Promotion)
    {
        if ($this->CheckLoginAdmin())
        {
            if (isset($Id_Promotion))
            {
                $promotions_model = $this->loadModel('PromotionModel');
                $hotels = $promotions_model->getAllHotels();
                $promotion = $promotions_model->FindPromotionById($Id_Promotion);
            }
            require 'application/views/_templates/header.php';
            require 'application/views/promotion/edit.php';
            require 'application/views/_templates/footer.php';
        }
    }

    public function update($Id_Promotion)
    {
        if ($this->CheckLoginAdmin())
        {
            if (isset($_POST["submit_edit_promotion"]))
            {
                $i = 0;
                $promotions_model = $this->loadModel('PromotionModel');
                foreach ($_POST["Id_Hotel"] as $Id_Hotel)
                {
                    $promotions_model->editPromotion($_POST["DateDeb"], $_POST["DateFin"], $_POST["Remise"], $_POST["Id_Hotel"][$i], $Id_Promotion);
                    $i++;
                }
            }
            header('location: ' . URL . 'promotion/index');
        }
    }

    public function destroy($Id_Promotion)
    {
        if ($this->CheckLoginAdmin())
        {
            if (isset($Id_Promotion))
            {
                $promotions_model = $this->loadModel('PromotionModel');
                $promotions_model->deletePromotion($Id_Promotion);
            }

            header('location: ' . URL . 'promotion/index');

        }
    }

}
?>
