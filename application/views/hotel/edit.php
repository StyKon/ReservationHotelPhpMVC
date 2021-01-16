
 <!-- Header -->
 <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Hotel Management</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="<?php echo URL; ?>hotel/index"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="<?php echo URL; ?>hotel/index">Hotel</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
            <a href="<?php echo URL; ?>hotel/index" class="btn btn-sm btn-neutral">Back to list</a>

            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card-wrapper">
            <!-- Custom form validation -->
            <div class="card">
              <!-- Card header -->
              <div class="card-header">
                <h3 class="mb-0">Edit Hotel</h3>
              </div>
              <!-- Card body -->
              <div class="card-body">

              <form class="needs-validation" novalidate  action="<?php echo URL . 'hotel/update/' . $hotel->Id_Hotel; ?>" method="post">
                  <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label class="form-control-label" for="validationCustom01">Name Hotel</label>
                      <input type="text" class="form-control" name="NomHotel" value="<?php if (isset($hotel->NomHotel)) echo $hotel->NomHotel; ?>"  id="validationCustom01" placeholder="Nom Hotel"  required>
                      <div class="invalid-feedback">
                        Please choose a Name Hotel .
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label class="form-control-label" for="exampleFormControlSelect1">Select Ville</label>
                      <select class="form-control" name="Id_Ville" id="exampleFormControlSelect1">
                      <?php foreach ($villes as $ville) { ?>
                      <?php if ($ville->Id_Ville == $hotel->Id_Ville) { ?>
                      <option value="<?php if (isset($ville->Id_Ville)) echo $ville->Id_Ville; ?>" selected><?php if (isset($ville->NomVille)) echo $ville->NomVille; ?></option>
                      <?php }else {?>
                      <option value="<?php if (isset($ville->Id_Ville)) echo $ville->Id_Ville; ?>"><?php if (isset($ville->NomVille)) echo $ville->NomVille; ?></option>
                      <?php }?>
                      <?php } ?>
                      </select>
                    </div>

                  </div>
                  <div class="form-row">

                    <div class="col-md-6 mb-3">
                      <label class="form-control-label" for="exampleFormControlSelect1">Select Category</label>
                      <select class="form-control" name="Id_Category" id="exampleFormControlSelect1">
                      <?php foreach ($categorys as $category) { ?>
                      <?php if ($category->Id_Category == $hotel->Id_Category) { ?>
                      <option value="<?php if (isset($category->Id_Category)) echo $category->Id_Category; ?>" selected><?php if (isset($category->TypeCat)) echo $category->TypeCat; ?></option>
                      <?php }else {?>
                      <option value="<?php if (isset($category->Id_Category)) echo $category->Id_Category; ?>"><?php if (isset($category->TypeCat)) echo $category->TypeCat; ?></option>
                      <?php }?>
                      <?php } ?>
                      </select>
                    </div>

                  </div>


                  <button class="btn btn-primary" name="submit_edit_hotel" type="submit">Update Hotel</button>
                </form>
              </div>
            </div>


          </div>
        </div>
      </div>

    </div>
  </div>