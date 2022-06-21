<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    $_SESSION['status'] = "<script>$(function(){toastr.warning('You must login first!')});</script>";
    header('location: ../../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Information - NMSC Loan Management</title>
    <link rel="icon" type="image/x-icon" href="https://www.nmsc.edu.ph/application/themes/nmsc/favicon.ico">
    <?php include_once('../../assets/includes/links-header.php'); ?>
	<link rel="stylesheet" href="../../assets/css/themeswitch.css">	
</head>

<body class="hold-transition sidebar-mini layout-navbar-fixed layout-fixed" id="switch-mode">
    <div class="wrapper">
        <!-- Toast Notification -->
        <?php
            if (isset($_SESSION["status"])) {
                $status = $_SESSION["status"];
                echo "<span>$status</span>";
            }
        ?>
        <!-- end of toast -->

        <!-- Preloader
		<div class="preloader flex-column justify-content-center align-items-center">
			<img class="animation__shake" src="resources/Images/logo.png" height="150" width="150">
		</div>  -->


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
                                <li class="breadcrumb-item active">Update Information</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <?php
            $account_number = $_GET['account_number'];
            $query = "SELECT * FROM tbl_borrowers WHERE account_number = $account_number";
            $results = $conn->query($query);
            $row = $results->fetch_row();
            ?>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="../../code.php" method="POST">
                                <div class="card">
                                    <div class="card-header">
                                        Update Information of <?php echo $row[2] . ' ' . $row[4]; ?>
                                    </div>
                                    <div class="card-body">
                                        <input type="hidden" name="user_id  " value="<?php echo $row[0];?>">
                                        <div class="form-group">
                                            <label class="control-label">Account Number</label>
                                            <div class="input-group">
                                                <input type="number" name="acccount_number" class="form-control" value="<?php echo $row[1]; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">First Name</label>
                                            <div class="input-group">
                                                <input type="text" name="first_name" class="form-control" value="<?php echo $row[2]; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Middle Name</label>
                                            <div class="input-group">
                                                <input type="text" name="middle_name" class="form-control" value="<?php echo $row[3]; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Last Name</label>
                                            <div class="input-group">
                                                <input type="text" name="last_name" class="form-control" value="<?php echo $row[4]; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Address</label>
                                            <div class="input-group">
                                                <input type="text" name="address" class="form-control" value="<?php echo $row[5]; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Age</label>
                                            <div class="input-group">
                                                <input type="text" name="age" class="form-control" value="<?php echo $row[6]; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Birth Date</label>
                                            <div class="input-group">
                                                <input type="date" class="form-control" name="birthDate" value="<?php echo $row[8]; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Contact Number</label>
                                            <div class="input-group">
                                                <input type="text" name="contact_number" class="form-control" value="<?php echo $row[9]; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Email Address</label>
                                            <div class="input-group">
                                                <input type="text" name="email_address" class="form-control" value="<?php echo $row[11]; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Profile Photo</label>
                                            <div class="form-group">
                                                <input type="file" class="form-control-file" name="profile_picture" value="<?php echo $row[7]; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-primary offset-md-3"type="submit" value="submit" name="editUser_btn" onclick="return confirm('Confirm save?');"> Save</button>
                                                <button class="btn btn-secondary" id="cancel" type="button" onclick="history.back()"> Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section><!-- /.content -->
        </div>
        <footer class="main-footer">
            <strong>Copyright &copy; 2021-2022 <a href="http://localhost/loan-management/">NMSCST Loan Management System</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Capstone Project</b> 2022
            </div>
        </footer>
    </div>
    <?php include_once('../../assets/includes/links-footer.php'); ?>
	<script src="../../assets/js/themeswitch.js"></script>
    <?php unset($_SESSION["status"]); ?>
</body>

</html>