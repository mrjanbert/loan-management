<?php
	if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
	header('location: http://localhost/loan-management/application/pages/error-pages/403-error.php');
	exit();
	};
?>
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Dashboard</h1>
			</div>
			<!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item active"><a href="#">Home</a></li>
					<li class="breadcrumb-item">Dashboard</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div><!-- /.content-header -->

<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-md-4 col-6">
				<?php
					include_once('../../config/database.php');
					$query = "SELECT * FROM tbl_users";
					$results = mysqli_query($conn, $query);
					$rowcount = mysqli_num_rows($results);
				?>
				<!-- small box -->
				<div class="small-box bg-info">
					<div class="inner">
						<h3><?php echo $rowcount;?></h3>
						<p>Total Borrowers</p>
					</div>
					<div class="icon">
						<i class="fa fa-users"></i>
					</div>
					<a href="home.php?page=borrower_list&accountNumber=<?php echo $accountNumber ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
				</div> 
			</div>
			<!-- ./col -->
			<div class="col-md-4 col-6">
				<!-- small box -->
				<div class="small-box bg-success">
					<div class="inner">
						<h3>1<sup style="font-size: 20px"></sup></h3>
						<p>Total Loan Approved</p>
					</div>
					<div class="icon">
						<i class="fa fa-check"></i>
					</div>
					<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<div class="col-md-4 col-6">
				<!-- small box -->
				<div class="small-box bg-primary">
					<div class="inner">
						<h3>2<sup style="font-size: 20px"></sup></h3>
						<p>Total Loan Application</p>
					</div>
					<div class="icon">
						<i class="fa fa-list-alt"></i>
					</div>
					<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
		</div><!-- /.row -->

		<!-- Main row -->
		<div class="row">

		</div><!-- /.row (main row) -->

	</div><!-- /.container-fluid -->
</section><!-- /.content -->