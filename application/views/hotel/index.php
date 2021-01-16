
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
                  <li class="breadcrumb-item active" aria-current="page">Index</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
            <a href="<?php echo URL; ?>hotel/create" class="btn btn-sm btn-neutral">Add New Hotel</a>

            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header">
              <h3 class="mb-0">Liste Hotel</h3>

            </div>
            <div class="table-responsive py-4">
              <table class="table table-flush" id="datatable-basic">
                <thead class="thead-light">
                  <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Ville</th>
                    <th>Category</th>
                    <th class="td-actions text-right">Actions</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                  <th>#</th>
                    <th>Nom</th>
                    <th>Ville</th>
                    <th>Category</th>
                    <th class="td-actions text-right">Actions</th>
                  </tr>
                </tfoot>
                <tbody>
                <?php foreach ($hotels as $hotel) { ?>
                  <tr>
                    <td><?php if (isset($hotel->Id_Hotel)) echo $hotel->Id_Hotel; ?></td>
                    <td><?php if (isset($hotel->NomHotel)) echo $hotel->NomHotel; ?></td>
                    <td><?php if (isset($hotel->Id_Ville)) echo $hotel->Id_Ville; ?></td>
                    <td><?php if (isset($hotel->Id_Category)) echo $hotel->Id_Category; ?></td>
                    <td class="td-actions text-right">

<a href="<?php echo URL . 'hotel/edit/' . $hotel->Id_Hotel; ?>" class="table-action" data-toggle="tooltip" data-original-title="Edit Hotel">
  <i class="fas fa-user-edit"></i>
</a>

<a    href="<?php echo URL . 'hotel/destroy/' . $hotel->Id_Hotel; ?>" class="table-action table-action-delete"  data-toggle="tooltip" data-original-title="Delete Hotel">

 <i class="fas fa-trash"></i>
</a>
</td>

                  </tr>
                  <?php } ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
</div>
