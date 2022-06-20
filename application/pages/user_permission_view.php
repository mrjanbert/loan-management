<?php
	if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
	header('location: http://localhost/loan-management/application/pages/error-pages/403-error.php');
	exit();
	};
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>User Permission</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">User Management</li>
                    <li class="breadcrumb-item active">User Permission</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <label class="col-md-2 control-label text-green">
                                User Name:
                            </label>
                            <div class="col-md-8">
                                <?php
                                    $accountNumber = $_GET['accountNumber'];
                                    $search_user = mysqli_query($conn, "SELECT * FROM tbl_users WHERE accountNumber = '$accountNumber'");
                                    while ($get_users = mysqli_fetch_array($search_user)) {
                                ?>
                                <b class="text-primary"><?php echo $get_users['firstName'] . ' ' . $get_users['middleName'][0] . '. ' . $get_users['lastName']; ?></b>
                                <?php } ?>
                            </div>
                            <div class="col-md-2 d-flex justify-content-end">
                            <button onclick="history.back()" type="button" class="btn btn-sm btn-warning mb-1"><i class="fa fa-mail-reply-all"></i>&nbsp;Back</button>
                            </div>
                        </div>
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S/No.</th>
                                    <th>Module Name</th>
                                    <th>
                                        <div align="center">Create</div>
                                    </th>
                                    <th>
                                        <div align="center">Read</div>
                                    </th>
                                    <th>
                                        <div align="center">Update</div>
                                    </th>
                                    <th>
                                        <div align="center">Delete</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $search = mysqli_query($conn, "SELECT * FROM module_permission WHERE accountNumber = '$accountNumber'");
                                while ($have = mysqli_fetch_array($search)) {
                                    $module_id = $have['mod_id'];
                                ?>
                                    <tr>
                                        <td><?php echo $module_id; ?></td>
                                        <td><?php echo $have['mod_name']; ?></td>
                                        <td>
                                            <div align="center"><?php echo ($have['mod_create'] == "0") ? '<i class="fa fa-times text-danger"></i>' : '<i class="fa fa-check text-success"></i>'; ?></div>
                                        </td>
                                        <td>
                                            <div align="center"><?php echo ($have['mod_read'] == "0") ? '<i class="fa fa-times text-danger"></i>' : '<i class="fa fa-check text-success"></i>'; ?></div>
                                        </td>
                                        <td>
                                            <div align="center"><?php echo ($have['mod_update'] == "0") ? '<i class="fa fa-times text-danger"></i>' : '<i class="fa fa-check text-success"></i>'; ?></div>
                                        </td>
                                        <td>
                                            <div align="center"><?php echo ($have['mod_delete'] == "0") ? '<i class="fa fa-times text-danger"></i>' : '<i class="fa fa-check text-success"></i>'; ?></div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section><!-- /.content -->