<?php
if (isset($_GET['id'])) {
  $mahh = $_GET['id'];
  $hh = new hanghoa();
  $kq = $hh->getHangHoaID($mahh);
  $productid = $kq['id'];
  $prductname = $kq['title'];
  $thumbnail = $kq['thumbnail'];
  $price = $kq['price'];
  $discount = $kq['discount'];
  $description = $kq['description'];
  $category = $kq['category_id'];
}
?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Project Edit</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Project Edit</li>
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
          <form action="index.php?action=hanghoa&act=update_action" method="post" enctype="multipart/form-data">
            <input type="hidden" id="inputName" class="form-control" name="id" value="<?php if (isset($productid)) echo $productid ?>">
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Product Name</label>
                <input type="text" id="inputName" class="form-control" value="<?php if (isset($prductname)) echo $prductname; ?>" name="title">
              </div>
              <div class="form-group">
                <label for="inputThumbnail">Thumbnail</label><br>
                <input type="file" id="inputThumbnail" class="" name="img" value="<?php if (isset($thumbnail)) echo $thumbnail; ?>" required>
                <!-- ảnh cũ -->
                <!-- <input type="hidden" name="old_img" value=""> -->
              </div>
              <div class="form-group">
                <label for="inputName">Price</label>
                <input type="number" name='gia' id="inputName" class="form-control" value="<?php if (isset($price)) echo $price; ?>">
              </div>
              <div class="form-group">
                <label for="inputName">Discount</label>
                <input name="giamgia" type="number" id="inputName" class="form-control" value="<?php if (isset($discount)) echo $discount; ?>">
              </div>
              <div class="form-group">
                <label for="inputDescription"> Description</label>
                <textarea id="inputDescription" class="form-control" rows="4" name="mota" value="<?php if (isset($description)) echo $description; ?>">
                  <?php if (isset($description)) echo $description; ?>
                </textarea> 
              </div>
              <div class="form-group">
                <label for="inputClientCompany">Category</label>
                <select name="cate" class="form-control">
                  <?php
                  $selectLoai = -1;
                  if (isset($category) && $category != -1) {
                    $selectLoai = $category;
                  }
                  $cate = new category();
                  $result = $cate->getCategory();
                  while ($set = $result->fetch()) :
                  ?>
                    <option value="<?php echo intval($set['id']) ?>" <?php if ($selectLoai == $set['id']) echo 'selected' ?>> <?php echo $set['name'] ?> </option>
                  <?php endwhile; ?>
                </select>


              </div>
            </div>
            <button value="submit" type="submit" name="submitedit" class="btn btn-success mb-4" style="display: block; margin: 0 auto;">Save Add</button>
          </form>
        </div>
      </div>
  </section>
</div>