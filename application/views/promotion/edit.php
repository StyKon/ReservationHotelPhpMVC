
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Discount Management</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="<?php echo URL; ?>promotion/index"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="<?php echo URL; ?>promotion/index">Discount</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
            <a href="<?php echo URL; ?>promotion/index" class="btn btn-sm btn-neutral">Back to list</a>
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
                <h3 class="mb-0">Add Discount</h3>
              </div>
              <!-- Card body -->
              <div class="card-body">


              <form class="needs-validation" novalidate  action="<?php echo URL . 'promotion/update/' . $promotion->Id_Promotion; ?>" method="post">
                <div class="row input-daterange datepicker align-items-center">
                    <div class="col">
                      <div class="form-group">
                        <label class="form-control-label">Start date</label>
                        <input class="form-control" name="DateDeb" value="<?php if (isset($promotion->DateDeb)) echo $promotion->DateDeb; ?>" placeholder="Start date" type="text" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label class="form-control-label">End date</label>
                        <input class="form-control" name="DateFin" value="<?php if (isset($promotion->DateFin)) echo $promotion->DateFin; ?>" placeholder="End date" type="text" required>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                      <div class="form-group">
                        <label class="form-control-label">Remise</label>
                        <input class="form-control" name="Remise" value="<?php if (isset($promotion->Remise)) echo $promotion->Remise; ?>" placeholder="Remise" type="number" required>
                      </div>
                    </div>
                    <div class="form-group">
                    <label class="form-control-label" for="exampleFormControlSelect1">Select Hotel</label>
                    <select class="form-control" name="Id_Hotel[]" id="Id_Hotel"  >
                    <?php foreach ($hotels as $hotel) { ?>
                     <?php if ($hotel->Id_Hotel == $promotion->Id_Hotel) { ?>
                     <option value="<?php if (isset($hotel->Id_Hotel)) echo $hotel->Id_Hotel; ?>" selected><?php if (isset($hotel->NomHotel)) echo $hotel->NomHotel; ?></option>
                     <?php }else {?>
                     <option value="<?php if (isset($hotel->Id_Hotel)) echo $hotel->Id_Hotel; ?>"><?php if (isset($hotel->NomHotel)) echo $hotel->NomHotel; ?></option>
                     <?php }?>
                     <?php } ?>
                    </select>
                  </div>

                  <button class="btn btn-primary" name="submit_edit_promotion" type="submit">Update Discount</button>
                </form>
              </div>
            </div>


          </div>
        </div>
      </div>

    </div>
  </div>