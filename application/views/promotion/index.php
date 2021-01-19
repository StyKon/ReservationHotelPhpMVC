
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
                  <li class="breadcrumb-item active" aria-current="page">Index</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
            <a href="<?php echo URL; ?>promotion/create" class="btn btn-sm btn-neutral">Add New Discount</a>

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
              <h3 class="mb-0">Liste Discount</h3>

            </div>
            <div class="table-responsive py-4">
              <table class="table table-flush" id="datatable-basic">
                <thead class="thead-light">
                  <tr>
                    <th>#</th>
                    <th>DateDeb</th>
                    <th>DateFin</th>
                    <th>Remise</th>
                    <th>Hotel</th>
                    <th class="td-actions text-right">Actions</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>DateDeb</th>
                    <th>DateFin</th>
                    <th>Remise</th>
                    <th>Hotel</th>
                    <th class="td-actions text-right">Actions</th>
                  </tr>
                </tfoot>
                <tbody>
                <?php foreach ($promotions as $promotion) { ?>
                  <tr>
                    <td><?php if (isset($promotion->Id_Promotion)) echo $promotion->Id_Promotion; ?></td>
                    <td><?php if (isset($promotion->DateDeb	)) echo $promotion->DateDeb	; ?></td>
                    <td><?php if (isset($promotion->DateFin)) echo $promotion->DateFin; ?></td>
                    <td><?php if (isset($promotion->Remise)) echo $promotion->Remise; ?></td>
                    <td><?php if (isset($promotion->NomHotel)) echo $promotion->NomHotel; ?></td>
                    <td class="td-actions text-right">

<a href="<?php echo URL . 'promotion/edit/' . $promotion->Id_Promotion; ?>" class="table-action" data-toggle="tooltip" data-original-title="Edit Promotion">
  <i class="fas fa-user-edit"></i>
</a>

<a    href="<?php echo URL . 'promotion/destroy/' . $promotion->Id_Promotion; ?>" class="table-action table-action-delete" data-method="delete" data-toggle="tooltip" data-original-title="Delete Promotion">

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