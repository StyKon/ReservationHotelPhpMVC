
  <!-- Header -->
  <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">City Management</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="<?php echo URL; ?>ville/index"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="<?php echo URL; ?>ville/index">City</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
            <a href="<?php echo URL; ?>ville/index" class="btn btn-sm btn-neutral">Back to list</a>

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
                <h3 class="mb-0">Add City</h3>
              </div>
              <!-- Card body -->
              <div class="card-body">


                <form class="needs-validation" novalidate  action="<?php echo URL; ?>ville/store" method="post">
               
                  <div class="form-group">
                    <label class="form-control-label" for="validationCustom01">Nom de la Ville</label>
                      <input type="text" class="form-control" name="NomVille" id="validationCustom01" placeholder="Nom de Ville"  required>
                      <div class="invalid-feedback">
                        Please choose a Ville.
                      </div>
                  </div>

                  <button class="btn btn-primary" name="submit_add_ville" type="submit">Ajouter Ville</button>
                </form>
              </div>
            </div>


          </div>
        </div>
      </div>

    </div>
  </div>
