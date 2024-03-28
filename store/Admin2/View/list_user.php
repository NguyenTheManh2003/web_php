<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>QUẢN LÝ</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">List_user</li>
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
                <h3 class="card-title">List user</h3>
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
                                fullName
                            </th>
                            <th style="width: 20%">
                                email
                            </th>
                            <th style="width: 20%">
                                password
                            </th>
                            <th style="width: 19%">
                                role_id
                            </th>
                            <th style="width: 20%">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $j = 0;
                        $hh = new nhanvien();
                        $result = $hh->getUser();
                        while ($set = $result->fetch()) :
                            $j++;
                        ?>
                            <tr>
                                <td>
                                    <?php echo $j ?>
                                </td>
                                <td>
                                    <a>
                                        <?php echo $set["fullname"] ?>
                                    </a>
                                    <br />

                                </td>
                                <td class="project_progress">
                                    <?php echo $set['email'] ?>
                                </td>
                                <td class="project_progress">
                                    <?php echo $set['password'] ?>
                                </td>
                                <td class="project-state">
                                    <p class="text-red"><?php echo $set["role_id"] ?></p>
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

    <!--  -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List Nhân viên</h3>
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
                            <th style="width: 15%"> Username </th>
                            <th style="width: 15%"> Password </th>
                            <th style="width: 20%"> Address </th>
                            <th style="width: 19%"> Phone Number </th>
                            <th style="width: 10%"> Role </th>
                            <th style="width: 20%"> </th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php
                        $j = 0;
                        $hh = new nhanvien();
                        $result = $hh->getNhanvien();
                        while ($set = $result->fetch()) :
                            $j++;
                        ?>
                            <tr>
                                <td>
                                    <?php echo $j ?>
                                </td>
                                <td>
                                    <a>
                                        <?php echo $set["username"] ?>
                                    </a>
                                    <br />

                                </td>
                                <td class="project_progress">
                                    <?php echo $set['password'] ?>
                                </td>
                                <td class="project_progress">
                                    <?php echo $set['address'] ?>
                                </td>
                                <td class="project_progress">
                                    <?php echo $set['phone_number'] ?>
                                </td>
                                <td class="project_progress">
                                    <?php echo $set['role_id'] ?>
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
</div>