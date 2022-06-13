<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Payments</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">Payments</li>
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
						<h3 class="card-title">Payments List</h3>
						<button class="btn btn-success btn-xs" style="margin-left: 74%" data-toggle="modal" data-target="#add_payment">
							<i class="fa fa-plus"></i> &nbsp;
							Add New Payment
						</button>
					</div><!-- /.card-header -->
					<div class="card-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>No.</th>
									<th>Loan Reference No.</th>
									<th>Payee</th>
									<th>Amount</th>
									<th>Penalty</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td>123456</td>
									<td>John Doe</td>
									<td><b style="color: blue">300,000.00</b></td>
									<td>0.00</td>
									<td>
										<button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#edit">
											<i class="fa fa-edit"></i>
										</button>
										<button class="btn btn-success btn-xs my-1">
											<i class="fa fa-print"></i>
										</button>
									</td>
								</tr>
								<tr>
									<td>2</td>
									<td>12345</td>
									<td>James Bond</td>
									<td><b style="color: blue">300,000.00</b></td>
									<td>0.00</td>
									<td>
										<button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#edit">
											<i class="fa fa-edit"></i>
										</button>
										<button class="btn btn-success btn-xs my-1">
											<i class="fa fa-print"></i>
										</button>
									</td>
								</tr>

							</tbody>
						</table>
						<div class="modal fade" id="edit">
							<div class="modal-dialog modal-md">
								<form action="">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title">Edit Application</h4>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="card card-primary">
											<div class="card-body">
												<div class="row">
													<div class="col-6">
														<div class="form-group">
															<label for="exampleInputEmail1">Account No.</label>
															<input type="text" class="form-control" disabled>
														</div>
													</div>
													<div class="col-6">
														<div class="form-group">
															<label for="exampleInputEmail1">Member</label>
															<input type="text" class="form-control" placeholder="Enter Member Name..">
														</div>
													</div>

													<div class="col-6">
														<div class="form-group">
															<label for="exampleInputEmail1">Type of Loan</label>
															<select class="form-control">
																<option>Data</option>
																<option>Data</option>
															</select>
														</div>
													</div>
													<div class="col-6">
														<div class="form-group">
															<label for="exampleInputEmail1">Payment</label>
															<input type="text" class="form-control" placeholder="Enter Mode Payment ..">
														</div>
													</div>
													<div class="col-6">
														<div class="form-group">
															<label for="exampleInputEmail1">Amount</label>
															<input type="text" class="form-control" placeholder="00.00">
														</div>
													</div>
													<div class="col-6">
														<div class="form-group">
															<label for="exampleInputEmail1">Duration</label>
															<input type="password" class="form-control" placeholder="Enter Loan Duration ..">
														</div>
													</div>
													<div class="col-6">
														<div class="form-group">
															<label for="exampleInputEmail1">Purpose</label>
															<input type="text" class="form-control" placeholder="Enter Purpose ..">
														</div>
													</div>
													<div class="col-6">
														<div class="form-group">
															<label>Loan Status</label>
															<select class="form-control">
																<option>Approved</option>
																<option>Disapproved</option>
															</select>
														</div>
													</div>
													<div class="col-12">
														<div class="form-group">
															<label for="exampleInputEmail1">Remarks</label>
															<textarea class="form-control" row="3" placeholder="Enter Remarks ..">
                                                                        </textarea>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="modal-footer justify-content-between">
											<button type="button" class="btn btn-danger" data-dismiss="modal">
												<i class="fa fa-times"></i>
												Close
											</button>
											<button type="submit" class="btn btn-primary">
												<iclass="fa fa-check">
													</i> Submit
											</button>
										</div>
									</div>
								</form><!-- /.modal-content -->
							</div><!-- /.modal-dialog -->
						</div>
					</div><!-- /.card-body -->
				</div><!-- /.card -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</section><!-- /.content -->