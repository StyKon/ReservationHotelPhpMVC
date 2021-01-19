
<div class="header bg-primary pb-6">

      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Room Management</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="<?php echo URL; ?>chambre/index"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="<?php echo URL; ?>chambre/index">Room</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Index</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="<?php echo URL; ?>chambre/create" class="btn btn-sm btn-neutral">Add New Room</a>
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
              <h3 class="mb-0">Liste Room</h3>
            </div>
            <div class="table-responsive py-4">
              <table class="table table-flush" id="datatable-basic">
                <thead class="thead-light">
                  <tr>
                    <th>#</th>
                    <th>Num</th>
                    <th>NbPlace</th>
                    <th>Prix</th>
                    <th>Etat</th>
                    <th>Hotel</th>
                    <th class="td-actions text-right">Actions</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Num</th>
                    <th>NbPlace</th>
                    <th>Prix</th>
                    <th>Etat</th>
                    <th>Hotel</th>
                    <th class="td-actions text-right">Actions</th>
                  </tr>
                </tfoot>
                <tbody>
                <?php foreach ($chambres as $chambre) { ?>
                  <tr>
                    <td><?php if (isset($chambre->Id_Chambre)) echo $chambre->Id_Chambre; ?></td>
                    <td><?php if (isset($chambre->Num)) echo $chambre->Num; ?></td>
                    <td><?php if (isset($chambre->NbPlace)) echo $chambre->NbPlace; ?></td>
                    <td><?php if (isset($chambre->Prix)) echo $chambre->Prix; ?></td>
                    <td><?php if (isset($chambre->Etat)) echo $chambre->Etat; ?></td>
                    <td><?php if (isset($chambre->NomHotel)) echo $chambre->NomHotel; ?></td>
                    <td class="td-actions text-right">

<a href="<?php echo URL . 'chambre/edit/' . $chambre->Id_Chambre; ?>" class="table-action" data-toggle="tooltip" data-original-title="Edit Chambre">
  <i class="fas fa-user-edit"></i>
</a>

<a    href="<?php echo URL . 'chambre/destroy/' . $chambre->Id_Chambre; ?>" class="table-action table-action-delete" data-toggle="tooltip" data-original-title="Delete Chambre">

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