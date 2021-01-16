<?php
class Image extends Controller
{
    public function index()
    {
        if ($this->CheckLoginAdmin())
        {
            $images_model = $this->loadModel('ImageModel');
            $images = $images_model->getAllImages();

            require 'application/views/_templates/header.php';
            require 'application/views/image/index.php';
            require 'application/views/_templates/footer.php';
        }
    }
    public function create()
    {
        if ($this->CheckLoginAdmin())
        {
            $images_model = $this->loadModel('ImageModel');
            $hotels = $images_model->getAllHotels();
            require 'application/views/_templates/header.php';
            require 'application/views/image/create.php';
            require 'application/views/_templates/footer.php';
        }
    }

    public function store()
    {
        if ($this->CheckLoginAdmin())
        {

            if (isset($_POST["submit_add_image"]))
            {
                $images_model = $this->loadModel('ImageModel');
                $PathImage = "";

                if (isset($_FILES['PathImage']))
                {

                    $tabPathImage = explode('.', $_FILES['PathImage']['name']);
                    $ext = $tabPathImage[sizeof($tabPathImage) - 1];
                    $PathImage = "image_" . mt_rand(10000000, 99999999) . '.' . $ext;

                    copy($_FILES['PathImage']['tmp_name'], "public/images/" . $PathImage);
                }

                $images_model->addImage($_POST["NomImage"], $PathImage, $_POST["Id_Hotel"]);

            }

            header('location: ' . URL . 'image/index');
        }
    }

    public function edit($Id_Image)
    {
        if ($this->CheckLoginAdmin())
        {
            if (isset($Id_Image))
            {
                $images_model = $this->loadModel('ImageModel');
                $hotels = $images_model->getAllHotels();
                $image = $images_model->FindImageById($Id_Image);
            }
            require 'application/views/_templates/header.php';
            require 'application/views/image/edit.php';
            require 'application/views/_templates/footer.php';
        }
    }

    public function update($Id_Image)
    {
        if ($this->CheckLoginAdmin())
        {
            if (isset($_POST["submit_edit_image"]))
            {
                $images_model = $this->loadModel('ImageModel');
                $PathImage = "";

                if (isset($_FILES['PathImage']))
                {

                    $tabPathImage = explode('.', $_FILES['PathImage']['name']);
                    $ext = $tabPathImage[sizeof($tabPathImage) - 1];
                    $PathImage = "image_" . mt_rand(10000000, 99999999) . '.' . $ext;

                    copy($_FILES['PathImage']['tmp_name'], "public/images/" . $PathImage);
                }

                $images_model->editImage($_POST["NomImage"], $PathImage, $_POST["Id_Hotel"], $Id_Image);

            }

            header('location: ' . URL . 'image/index');
        }
    }

    public function destroy($Id_Image)
    {
        if ($this->CheckLoginAdmin())
        {
            if (isset($Id_Image))
            {
                $images_model = $this->loadModel('ImageModel');
                $images_model->deleteImage($Id_Image);
            }

            header('location: ' . URL . 'image/index');
        }
    }

}
?>
