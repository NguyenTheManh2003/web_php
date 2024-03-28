

<!-- Content Wrapper. Contains page content -->
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
                        <li class="breadcrumb-item active">Projects</li>
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
                            <th style="width: 1%">
                                #
                            </th>
                            <th style="width: 20%">
                                Product Name
                            </th>
                            <th style="width: 10%">
                                Thumbnail
                            </th>
                            <th style="width: 10%">
                                price
                            </th>
                            <th style="width: 10%">
                                discount
                            </th>
                            <th style="width: 20%">
                                description
                            </th>
                            <th style="width: 9%" class="text-center">
                                Category
                            </th>
                            <th style="width: 20%">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $j = 0;
                        $hh = new hanghoa();
                        $result = $hh->getHangHoa();
                        while ($set = $result->fetch()) :
                            $j++;
                        ?>
                            <tr>
                                <td>
                                    <?php echo $j ?>
                                </td>
                                <td>
                                    <a>
                                        <?php echo $set["title"] ?>
                                    </a>
                                    <br />
                                    <!-- <small>
                              Size: <?php ?> Color: <?php ?>
                          </small> -->
                                </td>
                                <td>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <img src="../images/<?php echo $set["thumbnail"] ?>" alt="Avatar" width="100px" height="100px" style="border-radius:10px">
                                        </li>
                                    </ul>
                                </td>
                                <td class="project_progress">
                                    <?php echo number_format($set["price"], 0, ',', '.') ?> VND
                                </td>
                                <td class="project_progress">
                                    <?php echo number_format($set["discount"], 0, ',', '.') ?> VND
                                </td>
                                <td class="project_progress" title="<?php echo htmlspecialchars($set['description']); ?>" style="max-width: 100px; overflow: hidden; text-overflow: ellipsis;">
                                    <span style="white-space: nowrap;"><?php echo htmlspecialchars($set['description']); ?> VND</span>
                                </td>
                                <td class="project-state">
                                    <p class="text-red"><?php echo $set["category_id"] ?></p>
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