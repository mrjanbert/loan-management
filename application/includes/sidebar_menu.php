<?php
  if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
	header('location: http://localhost/loan-management/error-pages/403-error.php');
  exit();
  };
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="../../resources/Images/logo.png" alt="NMSC Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Loan Management</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel my-1 d-flex">
            <div class="image d-flex align-items-center">
                <img src="../../resources/Images/profile.png" class="img-circle elevation-3" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="text-white h5"><?php echo $firstName. ' ' .$lastName; ?> <i class="fa-solid fa-circle text-success fa-2xs ml-2"></i></a>
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
                <li class="nav-item">
                    <a href="home.php?page=payments&accountNumber=<?php echo $accountNumber ?>" class="nav-link nav-payments">
                    <i class="fa-solid fa-money-bill fa-lg mr-2"></i>
                        <p>Payments</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="home.php?page=sms_logs&accountNumber=<?php echo $accountNumber ?>" class="nav-link nav-sms_logs">
                    <i class="fa-solid fa-message fa-lg mr-2"></i>
                        <p>SMS Logs</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="home.php?page=manage_loans&accountNumber=<?php echo $accountNumber ?>" class="nav-link nav-manage_loans">
                        <i class="fa-solid fa-pen-to-square fa-lg mr-2"></i>
                        <p> Manage Loans</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="home.php?page=manage_loan_plans&accountNumber=<?php echo $accountNumber ?>" class="nav-link nav-manage_loan_plans">
                        <i class="fa-solid fa-list  fa-lg mr-2"></i>
                        <p> Loan Plans</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="home.php?page=manage_loan_types&accountNumber=<?php echo $accountNumber ?>" class="nav-link nav-manage_loan_types">
                        <i class="fa-solid fa-list  fa-lg mr-2"></i>
                        <p> Loan Types</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="home.php?page=manage_charges_list&accountNumber=<?php echo $accountNumber ?>" class="nav-link nav-manage_charges_list">
                        <i class="fa-solid fa-file-invoice-dollar fa-lg mr-2"></i>
                        <p> Charges List</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="home.php?page=borrowers&accountNumber=<?php echo $accountNumber ?>" class="nav-link nav-borrowers nav-edit_user">
                        <i class="fa-solid fa-users fa-lg mr-2"></i>
                        <p>Borrowers</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="home.php?page=user_management&accountNumber=<?php echo $accountNumber ?>" class="nav-link nav-user_management">
                        <i class="fa-solid fa-user-group fa-lg mr-2"></i>
                        <p>User Management</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="home.php?page=permission_list&accountNumber=<?php echo $accountNumber ?>" class="nav-link nav-permission">
                        <i class="fa-solid fa-user-group fa-lg mr-2"></i>
                        <p>Permission List</p>
                    </a>
                </li>
            </ul>
        </nav> <!-- /.sidebar-menu -->
    </div><!-- /.sidebar -->
</aside>
<script>
    $('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>