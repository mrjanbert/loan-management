<?php
session_start();

if (!isset($_SESSION['user_id'])) {
	header('location: 404-error.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home - NMSC Loan Management</title>
	<link rel="icon" type="image/x-icon" href="https://www.nmsc.edu.ph/application/themes/nmsc/favicon.ico">
	<?php require_once('../includes/links-header.php'); ?>	
</head>

<body class="hold-transition sidebar-mini layout-fixed" id="switch-mode">
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

		<?php require_once('../includes/navbar_top.php'); ?>
		<?php require_once('../includes/sidebar_menu.php'); ?>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<?php $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard'; ?>
			<?php include $page . '.php' ?>
		</div>

		<footer class="main-footer">
			<strong>Copyright &copy; 2021-2022 <a href="http://localhost/loan-management/">NMSCST Loan Management System</a>.</strong>
			All rights reserved.
			<div class="float-right d-none d-sm-inline-block">
				<b>Capstone Project</b> 2022
			</div>
		</footer>
	</div>
	</div><!-- /.wrapper -->

	<?php require_once('../includes/modal.php'); ?>
	<?php require_once('../includes/links-footer.php'); ?>
	<?php unset($_SESSION["status"]); ?>
</body>

</html>