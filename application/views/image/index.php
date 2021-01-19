
<div class="header bg-primary pb-6">

      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Image Management</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="<?php echo URL; ?>image/index"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="<?php echo URL; ?>image/index">Image</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Index</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
            <a href="<?php echo URL; ?>image/create" class="btn btn-sm btn-neutral">Add New Image</a>

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
              <h3 class="mb-0">Liste Image</h3>

            </div>
            <div class="table-responsive py-4">
              <table class="table table-flush" id="datatable-basic">
                <thead class="thead-light">
                  <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Image</th>
                    <th>Hotel</th>
                    <th class="td-actions text-right">Actions</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                  <th>#</th>
                    <th>Nom</th>
                    <th>Image</th>
                    <th>Hotel</th>
                    <th class="td-actions text-right">Actions</th>
                  </tr>
                </tfoot>
                <tbody>
                <?php foreach ($images as $image) { ?>
                  <tr>
                    <td><?php if (isset($image->Id_Image)) echo $image->Id_Image; ?></td>
                    <td><?php if (isset($image->NomImage)) echo $image->NomImage; ?></td>
                  <td>  <img src="<?php echo URL; ?>public/images/<?php if (isset($image->PathImage)) echo $image->PathImage; ?>" alt=""  class="responsive-img left"  width="50" height="50">
</td>

                    <td><?php if (isset($image->NomHotel)) echo $image->NomHotel; ?></td>
                    <td class="td-actions text-right">

<a href="<?php echo URL . 'image/edit/' . $image->Id_Image; ?>" class="table-action" data-toggle="tooltip" data-original-title="Edit Image">
  <i class="fas fa-user-edit"></i>
</a>

<a    href="<?php echo URL . 'image/destroy/' . $image->Id_Image; ?>" class="table-action table-action-delete"  data-toggle="tooltip" data-original-title="Delete Image">

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
