<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Loans</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">Loans</li>
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
					<div class="card-header">
						<h3 class="card-title">Loans History</h3>
						<button class="btn btn-success btn-xs" style="margin-left: 74%" data-toggle="modal" data-target="#addloan">
							<i class="fa fa-plus"></i> &nbsp;
							Apply New Loan
						</button>
					</div><!-- /.card-header -->
					<div class="card-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Account No.</th>
									<th>Type of Loan</th>
									<th>Mode of Payment</th>
									<th>Loan Amount</th>
									<th>Duration</th>
									<th>Purpose</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>123</td>
									<td>Loan</td>
									<td>Salary Deduction</td>
									<td><b style="color: blue">300,000.00</b></td>
									<td>3 Yrs</td>
									<td>Renovation</td>
									<td>
										<button type="button" class="btn btn-primary btn-xs">Approved</button>
									</td>
									<td>
										<button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#editloan">
											<i class="fa fa-edit"></i>
										</button>
										<button class="btn btn-success btn-xs my-1">
											<i class="fa fa-print"></i>
										</button>
									</td>
								</tr>
								<tr>
									<td>123</td>
									<td>Loan</td>
									<td>Salary Deduction</td>
									<td><b style="color: blue">300,000.00</b></td>
									<td>3 Yrs</td>
									<td>Renovation</td>
									<td>
										<button type="button" class="btn btn-warning btn-xs">Disapproved</button>
									</td>
									<td>
										<button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#editloan">
											<i class="fa fa-edit"></i>
										</button>
										<button class="btn btn-success btn-xs my-1">
											<i class="fa fa-print"></i>
										</button>
									</td>
								</tr>

							</tbody>
						</table>
					</div><!-- /.card-body -->
				</div><!-- /.card -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</section><!-- /.content -->

<script>
	$('#calculate').click(function() {
		calculate()
	})
	function calculate() {
		start_load()
		
	}
</script>