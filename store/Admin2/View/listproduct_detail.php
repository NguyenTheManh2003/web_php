<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Projects</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Product_detail</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Projects</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 1%"> # </th>
                            <th style="width: 25%"> Product_id </th>
                            <th style="width: 12.5%"> Color_id </th>
                            <th style="width: 12.5%"> Size_id </th>
                            <th style="width: 12.5%"> Status </th>
                            <th style="width: 37.5%"> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $j = 0;
                        $hh = new hanghoa();
                        $result = $hh->getHangHoaDetail();
                        while ($set = $result->fetch()) :
                            $j++;
                        ?>
                            <tr>
                                <td>
                                    <?php echo $j ?>
                                </td>
                                <td>
                                    <?php echo $set['product_id'] ?>
                                </td>
                                <td>
                                    <?php echo $set['color_id'] ?>
                                </td>
                                <td class="project_progress">
                                    <?php echo $set['size_id'] ?>
                                </td>
                                <td class="project_progress">
                                    <?php echo $set['status'] ?>
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm" href="../admin2/index.php?action=hanghoa&act=update_hanghoa&id=<?php echo $set["id"] ?>">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="../admin2/index.php?action=hanghoa&act=delete_hanghoa&id=<?php echo $set["id"] ?>">
                                        <i class="fas fa-trash"></i>
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        <?php
                        endwhile;
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>