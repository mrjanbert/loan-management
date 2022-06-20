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
				<h1>Add Permission</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item">User Management</li>
					<li class="breadcrumb-item active">Add Permission</li>
				</ol>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>


<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="alert alert-primary" role="alert">
			<strong>Add Module Permission</strong> | Here you declare which module you want the user to get access to in their respective account.</label>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<form action="../../code.php" method="POST">
						<div class="card-body">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-2 pt-2">
										<label>User Name</label>
									</div>
									<div class="col-md-10 pr-0">
										<select name="selecteduser" class="selectuser custom-select" required>
											<option value=""></option>
											<?php
												$user = mysqli_query($conn, "SELECT *,concat(lastName,', ',firstName) as name FROM tbl_users WHERE user_id != '" . $_SESSION['user_id'] . "'");
												while ($row = mysqli_fetch_array($user)) {
												?>
													<option value="<?php echo $row['accountNumber'] ?>"><?php echo $row['name'] . ' ' . $row['middleName'][0] . '.' ?></option>
												<?php 
											} ?>
										</select>
									</div>
								</div>
							</div>
							<table id="example2" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>S/No.</th>
										<th>Module Name</th>
										<th><div align="center">Create</div></th>
										<th><div align="center">Read</div></th>
										<th><div align="center">Update</div></th>
										<th><div align="center">Delete</div></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="text-center">1</td>
										<td>Payments <input type="hidden" name="payments" value="Payments" /></td>
										<td>
											<div align="center"><input name="payments_create" type="checkbox" value="On"></div>
										</td>
										<td>
											<div align="center"><input name="payments_read" type="checkbox" value="On"></div>
										</td>
										<td>		
											<div align="center"><input name="payments_update" type="checkbox" value="On"></div>
										</td>
										<td>
											<div align="center"><input name="payments_delete" type="checkbox" value="On"></div>
										</td>
									</tr>
									<tr>
									<tr>
										<td class="text-center">2</td>
										<td>SMS Logs <input type="hidden" name="sms_logs" value="SMS Logs" /></td>
										<td>
											<div align="center"><input name="sms_logs_create" type="checkbox" value="On"></div>
										</td>
										<td>
											<div align="center"><input name="sms_logs_read" type="checkbox" value="On"></div>
										</td>
										<td>
											<div align="center"><input name="sms_logs_update" type="checkbox" value="On"></div>
										</td>
										<td>
											<div align="center"><input name="sms_logs_delete" type="checkbox" value="On"></div>
										</td>
									</tr>
									<tr>
										<td class="text-center">3</td>
										<td>Manage Loans<input type="hidden" name="manage_loans" value="Manage Loans" /></td>
										<td>
											<div align="center"><input name="manage_loans_create" type="checkbox" value="On"></div>
										</td>
										<td>
											<div align="center"><input name="manage_loans_read" type="checkbox" value="On"></div>
										</td>
										<td>
											<div align="center"><input name="manage_loans_update" type="checkbox" value="On"></div>
										</td>
										<td>
											<div align="center"><input name="manage_loans_delete" type="checkbox" value="On"></div>
										</td>
									</tr>
									<tr>
										<td class="text-center">4</td>
										<td>Loan Plans <input type="hidden" name="loan_plans" value="Loan Plans" /></td>
										<td>
											<div align="center"><input name="loan_plans_create" type="checkbox" value="On"></div>
										</td>
										<td>
											<div align="center"><input name="loan_plans_read" type="checkbox" value="On"></div>
										</td>
										<td>
											<div align="center"><input name="loan_plans_update" type="checkbox" value="On"></div>
										</td>
										<td>
											<div align="center"><input name="loan_plans_delete" type="checkbox" value="On"></div>
										</td>
									</tr>
									<tr>
										<td class="text-center">5</td>
										<td>Loan Types <input type="hidden" name="loan_types" value="Loan Types" /></td>
										<td>
											<div align="center"><input name="loan_types_create" type="checkbox" value="On"></div>
										</td>
										<td>
											<div align="center"><input name="loan_types_read" type="checkbox" value="On"></div>
										</td>
										<td>
											<div align="center"><input name="loan_types_update" type="checkbox" value="On"></div>
										</td>
										<td>
											<div align="center"><input name="loan_types_delete" type="checkbox" value="On"></div>
										</td>
									</tr>
									<tr>
										<td class="text-center">6</td>
										<td>Charges <input type="hidden" name="charges" value="Charges" /></td>
										<td>
											<div align="center"><input name="charges_create" type="checkbox" value="On"></div>
										</td>
										<td>
											<div align="center"><input name="charges_read" type="checkbox" value="On"></div>
										</td>
										<td>
											<div align="center"><input name="charges_update" type="checkbox" value="On"></div>
										</td>
										<td>
											<div align="center"><input name="charges_delete" type="checkbox" value="On"></div>
										</td>
									</tr>
									<tr>
										<td class="text-center">7</td>
										<td>Borrowers <input type="hidden" name="borrowers" value="Borrowers" /></td>
										<td>
											<div align="center"><input name="borrowers_create" type="checkbox" value="On"></div>
										</td>
										<td>
											<div align="center"><input name="borrowers_read" type="checkbox" value="On"></div>
										</td>
										<td>
											<div align="center"><input name="borrowers_update" type="checkbox" value="On"></div>
										</td>
										<td>
											<div align="center"><input name="borrowers_delete" type="checkbox" value="On"></div>
										</td>
									</tr>
									<tr>
										<td class="text-center">8</td>
										<td>User Management <input type="hidden" name="user_management" value="User Management" /></td>
										<td>
											<div align="center"><input name="user_management_create" type="checkbox" value="On"></div>
										</td>
										<td>
											<div align="center"><input name="user_management_read" type="checkbox" value="On"></div>
										</td>
										<td>
											<div align="center"><input name="user_management_update" type="checkbox" value="On"></div>
										</td>
										<td>
											<div align="center"><input name="user_management_delete" type="checkbox" value="On"></div>
										</td>
									</tr>
								</tbody>
							</table>
							<div align="right"class="mt-2">
								<button type="submit" class="btn btn-info btn-sm mb-1" name="save_module"><i class="fa fa-save"></i>&nbsp;&nbsp;Save Module</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>