
<div class="header bg-primary pb-6">

      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Category Management</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="<?php echo URL; ?>category/index"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="<?php echo URL; ?>category/index">Category</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Index</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="<?php echo URL; ?>category/create" class="btn btn-sm btn-neutral">Add New Category</a>
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
              <h3 class="mb-0">Liste Category</h3>

            </div>
            <div class="table-responsive py-4">
              <table class="table table-flush" id="datatable-basic">
                <thead class="thead-light">
                  <tr>
                    <th class="text-center">#</th>
                    <th>Type</th>
                    <th class="td-actions text-right">Actions</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th class="text-center">#</th>
                    <th >Type</th>
                    <th class="td-actions text-right">Actions</th>
                  </tr>
                </tfoot>
                <tbody>
                
            <?php foreach ($categorys as $category) { ?>
                  <tr>
                    <td class="text-center"><?php if (isset($category->Id_Category)) echo $category->Id_Category; ?></td>
                    <td ><?php if (isset($category->TypeCat)) echo $category->TypeCat; ?></td>

                     <td class="td-actions text-right">

                  <a href="<?php echo URL . 'category/edit/' . $category->Id_Category; ?>" class="table-action" data-toggle="tooltip" data-original-title="Edit Category">
                    <i class="fas fa-user-edit"></i>
                  </a>

                 <a    href="<?php echo URL . 'category/destroy/' . $category->Id_Category; ?>" class="table-action table-action-delete"  data-toggle="tooltip" data-original-title="Delete Category">

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
