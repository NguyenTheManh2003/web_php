<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Project Add</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Project Add</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">General</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>

          <form action="index.php?action=hanghoa&act=insert_action" method="post" enctype="multipart/form-data">
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Product Name</label>
                <input type="text" id="inputName" class="form-control" value="" name="title">
              </div>
              <div class="form-group">
                <label for="inputThumbnail">Thumbnail</label><br>
                <input type="file" id="inputThumbnail" class="" name="img" value="">
              </div>
              <div class="form-group">
                <label for="inputName">Price</label>
                <input type="number" id="inputName" class="form-control" value="" name="gia">
              </div>
              <div class="form-group">
                <label for="inputName">Discount</label>
                <input type="number" id="inputName" class="form-control" value="" name="giamgia">
              </div>
              <div class="form-group">
                <label for="inputDescription"> Description</label>
                <textarea id="inputDescription" class="form-control" rows="4" name="mota" value="">Raw denim you probably havent heard of them jean shorts Austin.
                   Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</textarea>
              </div>
              <div class="form-group">
                <label for="inputClientCompany">Category</label>
                <select name="cate" class="form-control">
                  <?php
                  $cate = new category();
                  $result = $cate->getCategory();
                  while ($set = $result->fetch()) :
                  ?>
                    <option value="<?php echo intval($set['id']) ?>"><?php echo $set['name'] ?></option>
                  <?php
                  endwhile;
                  ?>
                </select>

              </div>
            </div>
            <button value="submit" type="submit" name="submitadd" class="btn btn-success mb-4" style="display: block; margin: 0 auto;">Save Add</button>
          </form>
        </div>
      </div>
  </section>
</div>