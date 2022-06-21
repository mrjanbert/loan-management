<?php
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    header('location: http://localhost/loan-management/application/pages/error-pages/403-error.php');
    exit();
};
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="../../assets/img/logo.png" alt="NMSC Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Loan Management</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel d-flex my-1">
            <div class="image d-flex align-items-center">
                <img src="../../assets/img/uploads/profile-janbert.jpg" class="img-circle elevation-3" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="text-white h5" data-toggle="modal" value=<?php echo $accountNumber; ?> data-target="#view_user"><?php echo $firstName . ' ' . $lastName; ?> <i class="fa-solid fa-circle text-success fa-2xs ml-2"></i></a>
                <p class="d-block text-primary" readonly><small><?php echo $email ?></small></p>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="home.php?page=dashboard&accountNumber=<?php echo $accountNumber ?>" class="nav-link nav-dashboard">
                        <i class="fa-solid fa-chart-area fa-lg mr-2"></i>
                        <p> Dashboard</p>
                    </a>
                </li>

                <!-- PAYMENTS LINK -->
                <?php
                    if (isset($_GET['mid']) && (trim($_GET['mid']) == base64_encode("payments"))) {
                        $check = mysqli_query($conn, "SELECT * FROM module_permission WHERE accountNumber = '" . $_SESSION['accountNumber'] . "' AND mod_name = 'Payments'");
                        $get_check = mysqli_fetch_array($check);
                        $mod_read = $get_check['mod_read'];
                ?>
                <?php echo ($mod_read == 1) ? '<li class="nav-item"><a href="home.php?page=payments&accountNumber='. $_SESSION['accountNumber'] .'&&mid=' . base64_encode("payments") . '" class="nav-link nav-payments"><i class="fa-solid fa-money-bill fa-lg mr-2"></i><p>Payments</p></a></li>' : ''; ?>
                <?php
                    } else {
                        $check = mysqli_query($conn, "SELECT * FROM module_permission WHERE accountNumber = '" . $_SESSION['accountNumber'] . "' AND mod_name = 'Payments'");
                        $get_check = mysqli_fetch_array($check);
                        $mod_read = $get_check['mod_read'];
                    ?>
                    <?php echo ($mod_read == 1) ? '<li class="nav-item"><a href="home.php?page=payments&accountNumber='. $_SESSION['accountNumber'] .'&&mid=' . base64_encode("payments") . '" class="nav-link nav-payments"><i class="fa-solid fa-money-bill fa-lg mr-2"></i><p>Payments</p></a></li>' : ''; ?>
                <?php } ?>

                <!-- SMS LOGS LINK -->
                <?php
                    if (isset($_GET['mid']) && (trim($_GET['mid']) == base64_encode("sms_logs"))) {
                        $check = mysqli_query($conn, "SELECT * FROM module_permission WHERE accountNumber = '" . $_SESSION['accountNumber'] . "' AND mod_name = 'SMS LOGS'");
                        $get_check = mysqli_fetch_array($check);
                        $mod_read = $get_check['mod_read'];
                ?>
                <?php echo ($mod_read == 1) ? '<li class="nav-item"><a href="home.php?page=sms_logs&accountNumber='. $_SESSION['accountNumber'] .'&&mid=' . base64_encode("sms_logs") . '" class="nav-link nav-sms_logs"><i class="fa-solid fa-message fa-lg mr-2"></i><p>SMS Logs</p></a></li>' : ''; ?>
                <?php
                    } else {
                        $check = mysqli_query($conn, "SELECT * FROM module_permission WHERE accountNumber = '" . $_SESSION['accountNumber'] . "' AND mod_name = 'SMS LOGS'");
                        $get_check = mysqli_fetch_array($check);
                        $mod_read = $get_check['mod_read'];
                    ?>
                <?php echo ($mod_read == 1) ? '<li class="nav-item"><a href="home.php?page=sms_logs&accountNumber='. $_SESSION['accountNumber'] .'&&mid=' . base64_encode("sms_logs") . '" class="nav-link nav-sms_logs"><i class="fa-solid fa-message fa-lg mr-2"></i><p>SMS Logs</p></a></li>' : ''; ?>
                <?php } ?>

                <!-- MANAGE LOANS LINK -->
                <?php
                    if (isset($_GET['mid']) && (trim($_GET['mid']) == base64_encode("manage_loans"))) {
                        $check = mysqli_query($conn, "SELECT * FROM module_permission WHERE accountNumber = '" . $_SESSION['accountNumber'] . "' AND mod_name = 'Manage Loans'");
                        $get_check = mysqli_fetch_array($check);
                        $mod_read = $get_check['mod_read'];
                ?>
                <?php echo ($mod_read == 1) ? '<li class="nav-item"><a href="home.php?page=manage_loans&accountNumber='. $_SESSION['accountNumber'] .'&&mid=' . base64_encode("manage_loans") . '" class="nav-link nav-manage_loans"><i class="fa-solid fa-pen-to-square fa-lg mr-2"></i><p>Manage Loans</p></a></li>' : ''; ?>
                <?php
                    } else {
                        $check = mysqli_query($conn, "SELECT * FROM module_permission WHERE accountNumber = '" . $_SESSION['accountNumber'] . "' AND mod_name = 'Manage Loans'");
                        $get_check = mysqli_fetch_array($check);
                        $mod_read = $get_check['mod_read'];
                    ?>
                    <?php echo ($mod_read == 1) ? '<li class="nav-item"><a href="home.php?page=manage_loans&accountNumber='. $_SESSION['accountNumber'] .'&&mid=' . base64_encode("manage_loans") . '" class="nav-link nav-manage_loans"><i class="fa-solid fa-pen-to-square fa-lg mr-2"></i><p>Manage Loans</p></a></li>' : ''; ?>
                <?php } ?>

                <!-- LOAN PLANS LINK -->
                <?php
                    if (isset($_GET['mid']) && (trim($_GET['mid']) == base64_encode("loan_plans"))) {
                        $check = mysqli_query($conn, "SELECT * FROM module_permission WHERE accountNumber = '" . $_SESSION['accountNumber'] . "' AND mod_name = 'Loan Plans'");
                        $get_check = mysqli_fetch_array($check);
                        $mod_read = $get_check['mod_read'];
                ?>
                <?php echo ($mod_read == 1) ? '<li class="nav-item"><a href="home.php?page=manage_loan_plans&accountNumber='. $_SESSION['accountNumber'] .'&&mid=' . base64_encode("loan_plans") . '" class="nav-link nav-manage_loan_plans"><i class="fa-solid fa-pen-to-square fa-lg mr-2"></i><p>Loan Plans</p></a></li>' : ''; ?>
                <?php
                    } else {
                        $check = mysqli_query($conn, "SELECT * FROM module_permission WHERE accountNumber = '" . $_SESSION['accountNumber'] . "' AND mod_name = 'Loan Plans'");
                        $get_check = mysqli_fetch_array($check);
                        $mod_read = $get_check['mod_read'];
                    ?>
                <?php echo ($mod_read == 1) ? '<li class="nav-item"><a href="home.php?page=manage_loan_plans&accountNumber='. $_SESSION['accountNumber'] .'&&mid=' . base64_encode("loan_plans") . '" class="nav-link nav-manage_loan_plans"><i class="fa-solid fa-pen-to-square fa-lg mr-2"></i><p>Loan Plans</p></a></li>' : ''; ?>
                <?php } ?>

                <!-- LOAN TYPES LINK -->
                <?php
                    if (isset($_GET['mid']) && (trim($_GET['mid']) == base64_encode("loan_types"))) {
                        $check = mysqli_query($conn, "SELECT * FROM module_permission WHERE accountNumber = '" . $_SESSION['accountNumber'] . "' AND mod_name = 'Loan Types'");
                        $get_check = mysqli_fetch_array($check);
                        $mod_read = $get_check['mod_read'];
                ?>
                <?php echo ($mod_read == 1) ? '<li class="nav-item"><a href="home.php?page=manage_loan_types&accountNumber='. $_SESSION['accountNumber'] .'&&mid=' . base64_encode("loan_types") . '" class="nav-link nav-manage_loan_types"><i class="fa-solid fa-pen-to-square fa-lg mr-2"></i><p>Loan Types</p></a></li>' : ''; ?>
                <?php
                    } else {
                        $check = mysqli_query($conn, "SELECT * FROM module_permission WHERE accountNumber = '" . $_SESSION['accountNumber'] . "' AND mod_name = 'Loan Types'");
                        $get_check = mysqli_fetch_array($check);
                        $mod_read = $get_check['mod_read'];
                    ?>
                <?php echo ($mod_read == 1) ? '<li class="nav-item"><a href="home.php?page=manage_loan_types&accountNumber='. $_SESSION['accountNumber'] .'&&mid=' . base64_encode("loan_types") . '" class="nav-link nav-manage_loan_types"><i class="fa-solid fa-pen-to-square fa-lg mr-2"></i><p>Loan Types</p></a></li>' : ''; ?>
                <?php } ?>

                <!-- CHARGES LINK -->
                <?php
                    if (isset($_GET['mid']) && (trim($_GET['mid']) == base64_encode("charges"))) {
                        $check = mysqli_query($conn, "SELECT * FROM module_permission WHERE accountNumber = '" . $_SESSION['accountNumber'] . "' AND mod_name = 'Charges'");
                        $get_check = mysqli_fetch_array($check);
                        $mod_read = $get_check['mod_read'];
                ?>
                <?php echo ($mod_read == 1) ? '<li class="nav-item"><a href="home.php?page=manage_charges_list&accountNumber='. $_SESSION['accountNumber'] .'&&mid=' . base64_encode("charges") . '" class="nav-link nav-manage_charges_list"><i class="fa-solid fa-file-invoice-dollar fa-lg mr-2"></i><p>Charges List</p></a></li>' : ''; ?>
                <?php
                    } else {
                        $check = mysqli_query($conn, "SELECT * FROM module_permission WHERE accountNumber = '" . $_SESSION['accountNumber'] . "' AND mod_name = 'Charges'");
                        $get_check = mysqli_fetch_array($check);
                        $mod_read = $get_check['mod_read'];
                    ?>
                <?php echo ($mod_read == 1) ? '<li class="nav-item"><a href="home.php?page=manage_charges_list&accountNumber='. $_SESSION['accountNumber'] .'&&mid=' . base64_encode("charges") . '" class="nav-link nav-manage_charges_list"><i class="fa-solid fa-file-invoice-dollar fa-lg mr-2"></i></i><p>Charges List</p></a></li>' : ''; ?>
                <?php } ?>

                <!-- BORROWERS LINK -->
                <?php
                    if (isset($_GET['mid']) && (trim($_GET['mid']) == base64_encode("borrower_list"))) {
                        $check = mysqli_query($conn, "SELECT * FROM module_permission WHERE accountNumber = '" . $_SESSION['accountNumber'] . "' AND mod_name = 'Borrowers'");
                        $get_check = mysqli_fetch_array($check);
                        $mod_read = $get_check['mod_read'];
                ?>
                <?php echo ($mod_read == 1) ? '<li class="nav-item"><a href="home.php?page=borrower_list&accountNumber='. $_SESSION['accountNumber'] .'&&mid=' . base64_encode("borrower_list") . '" class="nav-link nav-borrower_list"><i class="fa-solid fa-users fa-lg mr-2"></i><p>Borrowers</p></a></li>' : ''; ?>
                <?php
                    } else {
                        $check = mysqli_query($conn, "SELECT * FROM module_permission WHERE accountNumber = '" . $_SESSION['accountNumber'] . "' AND mod_name = 'Borrowers'");
                        $get_check = mysqli_fetch_array($check);
                        $mod_read = $get_check['mod_read'];
                    ?>
                <?php echo ($mod_read == 1) ? '<li class="nav-item"><a href="home.php?page=borrower_list&accountNumber='. $_SESSION['accountNumber'] .'&&mid=' . base64_encode("borrower_list") . '" class="nav-link nav-borrower_list"><i class="fa-solid fa-users fa-lg mr-2"></i><p>Borrowers</p></a></li>' : ''; ?>
                <?php } ?>

                <!--USER LIST LINK -->
                <?php
                    if (isset($_GET['mid']) && (trim($_GET['mid']) == base64_encode("user_list"))) {
                        $check = mysqli_query($conn, "SELECT * FROM module_permission WHERE accountNumber = '" . $_SESSION['accountNumber'] . "' AND mod_name = 'User List'");
                        $get_check = mysqli_fetch_array($check);
                        $mod_read = $get_check['mod_read'];
                ?>
                <?php echo ($mod_read == 1) ? '<li class="nav-item"><a href="home.php?page=user_list&accountNumber='. $_SESSION['accountNumber'] .'&&mid=' . base64_encode("user_list") . '" class="nav-link nav-user_list"><i class="fa-solid fa-users fa-lg mr-2"></i><p>User List</p></a></li>' : ''; ?>
                <?php
                    } else {
                        $check = mysqli_query($conn, "SELECT * FROM module_permission WHERE accountNumber = '" . $_SESSION['accountNumber'] . "' AND mod_name = 'User List'");
                        $get_check = mysqli_fetch_array($check);
                        $mod_read = $get_check['mod_read'];
                    ?>
                <?php echo ($mod_read == 1) ? '<li class="nav-item"><a href="home.php?page=user_list&accountNumber='. $_SESSION['accountNumber'] .'&&mid=' . base64_encode("user_list") . '" class="nav-link nav-user_list"><i class="fa-solid fa-users fa-lg mr-2"></i><p>User List</p></a></li>' : ''; ?>
                <?php } ?>

                <!-- USER MANAGEMENT LINK -->
                <?php
                if (isset($_GET['mid']) && (trim($_GET['mid']) == base64_encode("user_management"))) {
                    $check = mysqli_query($conn, "SELECT * FROM module_permission WHERE accountNumber = '" . $_SESSION['accountNumber'] . "' AND mod_name = 'User Management'");
                    $get_check = mysqli_fetch_array($check);
                    $mod_create = $get_check['mod_create'];
                    $mod_read = $get_check['mod_read'];
                ?>
                    <?php echo ($mod_create == 1) ? '<li class="nav-item nav-user_permission_add nav-user_permission_list"><a href="#" class="nav-link nav-user_permission_add nav-user_permission_list"><i class="nav-icon fa-solid fa-user-group fa-lg mr-2"></i><p>User Management<i class="fas fa-angle-left right"></i></p></a><ul class="nav nav-treeview">' : ''; ?>
                    <?php echo ($mod_read == 1) ? '<li class="nav-item"><a href="home.php?page=user_permission_list&accountNumber=' . $_SESSION['accountNumber'] . '&&mid=' . base64_encode("user_management") . '"  class="nav-link nav-user_permission_list"><i class="nav-icon fa-solid fa-file fa-lg mr-2"></i><p>Module Permission List</p></a></li>' : ''; ?>
                    <?php echo ($mod_create == 1) ? '<li class="nav-item"><a href="home.php?page=user_permission_add&accountNumber=' . $_SESSION['accountNumber'] . '&&mid=' . base64_encode("user_management") . '"  class="nav-link nav-user_permission_add"><i class="nav-icon fa-solid fa-file-circle-plus fa-lg mr-2"></i><p>Add Permission</p></a></li>' : ''; ?>
                    <?php echo ($mod_create == 1) ? '</ul></li>' : ''; ?>
                <?php
                } else {
                    $check = mysqli_query($conn, "SELECT * FROM module_permission WHERE accountNumber = '" . $_SESSION['accountNumber'] . "' AND mod_name = 'User Management'");
                    $get_check = mysqli_fetch_array($check);
                    $mod_create = $get_check['mod_create'];
                    $mod_read = $get_check['mod_read'];
                ?>
                    <?php echo ($mod_create == 1) ? '<li class="nav-item nav-user_permission_add nav-user_permission_list"><a href="#" class="nav-link nav-user_permission_add nav-user_permission_list"><i class="nav-icon fa-solid fa-user-group fa-lg mr-2"></i><p>User Management<i class="fas fa-angle-left right"></i></p></a><ul class="nav nav-treeview">' : ''; ?>
                    <?php echo ($mod_read == 1) ? '<li class="nav-item"><a href="home.php?page=user_permission_list&accountNumber=' . $_SESSION['accountNumber'] . '&&mid=' . base64_encode("user_management") . '"  class="nav-link nav-user_permission_list"><i class="nav-icon fa-solid fa-file fa-lg mr-2"></i><p>Module Permission List</p></a></li>' : ''; ?>
                    <?php echo ($mod_create == 1) ? '<li class="nav-item"><a href="home.php?page=user_permission_add&accountNumber=' . $_SESSION['accountNumber'] . '&&mid=' . base64_encode("user_management") . '"  class="nav-link nav-user_permission_add"><i class="nav-icon fa-solid fa-file-circle-plus fa-lg mr-2"></i><p>Add Permission</p></a></li>' : ''; ?>
                    <?php echo ($mod_create == 1) ? '</ul></li>' : ''; ?>
                <?php } ?>
            </ul>
        </nav> <!-- /.sidebar-menu -->
    </div><!-- /.sidebar -->
</aside>
<script>
    $('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active').addClass('menu-open').addClass('has-treeview')
</script>