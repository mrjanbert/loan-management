<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    $_SESSION['status']="<script>const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 5000
      })
  
      Toast.fire({
        icon: 'warning',
        title: 'You must login first!'
      })</script>";
    header('location: ../../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Permission - NMSC Loan Management</title>
    <link rel="icon" type="image/x-icon" href="https://www.nmsc.edu.ph/application/themes/nmsc/favicon.ico">
    <?php include_once('../../assets/includes/links-header.php'); ?>
	<link rel="stylesheet" href="../../assets/css/themeswitch.css">
</head>


<body class="hold-transition sidebar-mini layout-fixed" id="switch-mode">
    <div class="wrapper">
        <!-- Toast Notification -->
        <?php
            session_start();
            if (isset($_SESSION["status"])) {
                $status = $_SESSION["status"];
                echo "<span>$status</span>";
            }
        ?>
        <!-- end of toast -->

        <!-- PHP for User Names -->
        <?php
        require_once('../../config/database.php');
        $user_id = $_SESSION['user_id'];
        $query = "SELECT * FROM tbl_users WHERE user_id = '$user_id'";
        $results = $conn->query($query);
        while ($row = $results->fetch_row()) {
            $user_id = $row[0];
            $accountNumber = $row[1];
            $firstName = $row[2];
            $middeName = $row[3];
            $lastName = $row[4];
            $address = $row[5];
            $age = $row[6];
            $birthDate = $row[7];
            $profilePhoto = $row[8];
            $contactNumber = $row[9];
            $userCreated = $row[10];
            $email = $row[11];
            $password = $row[12];
        }
        ?>

        <?php include_once('../../assets/includes/navbar_top.php'); ?>
        <?php include_once('../../assets/includes/sidebar_menu.php'); ?>
        <!-- Content Header (Page header) -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Update Information</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Borrowers</a></li>
                                <li class="breadcrumb-item active">Update Permission</li>
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
                            <form action="../../code.php" method="POST">
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
                                                $accountNumber = $_GET['accountNumber'];
                                                $i = 0;
                                                $search = mysqli_query($conn, "SELECT * FROM module_permission WHERE accountNumber = '$accountNumber'");
                                                while ($have = mysqli_fetch_array($search)) {
                                                    $mod_id = $have['mod_id'];
                                                ?>
                                                    <tr>
                                                        <td><?php echo $mod_id; ?><input class="uniform_on" name="selector[<?php echo $i; ?>]" type="hidden" value="<?php echo $mod_id; ?>" checked></td>
                                                        <td><?php echo $have['mod_name']; ?></td>
                                                        <td>
                                                            <div align="center"><input id="optionsCheckbox" class="checkbox" name="mod_create[<?php echo $i; ?>]" type="checkbox" value="<?php echo ($have['mod_create'] == "0") ? 1 : $have['mod_create']; ?>" <?php echo ($have['mod_create'] == "0") ? '' : 'checked'; ?>></div>
                                                        </td>
                                                        <td>
                                                            <div align="center"><input id="optionsCheckbox" class="checkbox" name="mod_read[<?php echo $i; ?>]" type="checkbox" value="<?php echo ($have['mod_read'] == "0") ? 1 : $have['mod_read']; ?>" <?php echo ($have['mod_read'] == "0") ? '' : 'checked'; ?>></div>
                                                        </td>
                                                        <td>
                                                            <div align="center"><input id="optionsCheckbox" class="checkbox" name="mod_update[<?php echo $i; ?>]" type="checkbox" value="<?php echo ($have['mod_update'] == "0") ? 1 : $have['mod_update']; ?>" <?php echo ($have['mod_update'] == "0") ? '' : 'checked'; ?>></div>
                                                        </td>
                                                        <td>
                                                            <div align="center"><input id="optionsCheckbox" class="checkbox" name="mod_delete[<?php echo $i; ?>]" type="checkbox" value="<?php echo ($have['mod_delete'] == "0") ? 1 : $have['mod_delete']; ?>" <?php echo ($have['mod_delete'] == "0") ? '' : 'checked'; ?>></div>
                                                        </td>
                                                    </tr>
                                                <?php
                                                
                                                    $i++;
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <div align="right">
                                            <button type="submit" class="btn btn-info btn-sm mb-1" name="edit_permission"><i class="fa fa-save"></i>&nbsp;&nbsp;Save Module</button>
                                        </div>
                                    </div><!-- /.card-body -->
                                </div><!-- /.card -->
                            </form>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
    </div><!-- /.wrapper -->

    <footer class="main-footer">
        <strong>Copyright &copy; 2021-2022 <a href="http://localhost/loan-management/">NMSCST Loan Management System</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Capstone Project</b> 2022
        </div>
    </footer>
    </div>
    </div><!-- /.wrapper -->

    <?php include_once('../../assets/includes/links-footer.php'); ?>
	<script src="../../assets/js/themeswitch.js"></script>
    <?php unset($_SESSION["status"]); ?>
</body>

</html>