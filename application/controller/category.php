<?php
class Category extends Controller
{

  
    public function index()
    {

        if ($this->CheckLoginAdmin())
        {
            $categorys_model = $this->loadModel('CategoryModel');
            $categorys = $categorys_model->getAllCategorys();

            require 'application/views/_templates/header.php';
            require 'application/views/category/index.php';
            require 'application/views/_templates/footer.php';

        }
        

    }
    public function create()
    {
        if ($this->CheckLoginAdmin())
        {
            require 'application/views/_templates/header.php';
            require 'application/views/category/create.php';
            require 'application/views/_templates/footer.php';
        }
    }

    public function store()
    {
        if ($this->CheckLoginAdmin())
        {
            if (isset($_POST["submit_add_category"]))
            {
                $categorys_model = $this->loadModel('CategoryModel');
                $categorys_model->addCategory($_POST["TypeCat"]);
            }

            header('location: ' . URL . 'category/index');
        }
    }
    public function edit($Id_Category)
    {
        if ($this->CheckLoginAdmin())
        {
            if (isset($Id_Category))
            {
                $categorys_model = $this->loadModel('CategoryModel');
                $category = $categorys_model->FindCategoryById($Id_Category);
            }

            require 'application/views/_templates/header.php';
            require 'application/views/category/edit.php';
            require 'application/views/_templates/footer.php';
        }
    }

    public function update($Id_Category)
    {
        if ($this->CheckLoginAdmin())
        {
            if (isset($_POST["submit_edit_category"]))
            {
                $categorys_model = $this->loadModel('CategoryModel');
                $categorys_model->editCategory($_POST["TypeCat"], $Id_Category);
            }

            header('location: ' . URL . 'category/index');

        }
    }

    public function destroy($Id_Category)
    {
        if ($this->CheckLoginAdmin())
        {
            if (isset($Id_Category))
            {
                $categorys_model = $this->loadModel('CategoryModel');
                $categorys_model->deleteCategory($Id_Category);
            }

            header('location: ' . URL . 'category/index');
        }
    }

}
?>
