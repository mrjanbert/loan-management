<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Module Permission</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">Module Permission</li>
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
					<table class="table" border="0.95">
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
							<tr>
								<td width="30" class="text-center">1</td>
								<td width="200">Payments <input type="hidden" name="email_t" value="Email Panel" /></td>
								<td>
									<div align="center"><input name="email_create" type="checkbox" value="On"></div>
								</td>
								<td>
									<div align="center"><input name="email_read" type="checkbox" value="On"></div>
								</td>
								<td>
									<div align="center"><input name="email_update" type="checkbox" value="On"></div>
								</td>
								<td>
									<div align="center"><input name="email_delete" type="checkbox" value="On"></div>
								</td>
							</tr>
							<tr>
								<td width="30" class="text-center">2</td>
								<td width="200">Manage Loans<input type="hidden" name="borrow_d" value="Borrower Details" /></td>
								<td>
									<div align="center"><input name="borrow_create" type="checkbox" value="On"></div>
								</td>
								<td>
									<div align="center"><input name="borrow_read" type="checkbox" value="On"></div>
								</td>
								<td>
									<div align="center"><input name="borrow_update" type="checkbox" value="On"></div>
								</td>
								<td>
									<div align="center"><input name="borrow_delete" type="checkbox" value="On"></div>
								</td>
							</tr>
							<tr>
								<td width="30" class="text-center">3</td>
								<td width="200">Loan Plans <input type="hidden" name="wallet" value="Employee Wallet" /></td>
								<td>
									<div align="center"><input name="wallet_create" type="checkbox" value="On"></div>
								</td>
								<td>
									<div align="center"><input name="wallet_read" type="checkbox" value="On"></div>
								</td>
								<td>
									<div align="center"><input name="wallet_update" type="checkbox" value="On"></div>
								</td>
								<td>
									<div align="center"><input name="wallet_delete" type="checkbox" value="On"></div>
								</td>
							</tr>
							<tr>
								<td width="30" class="text-center">3</td>
								<td width="200">Loan Types <input type="hidden" name="wallet" value="Employee Wallet" /></td>
								<td>
									<div align="center"><input name="wallet_create" type="checkbox" value="On"></div>
								</td>
								<td>
									<div align="center"><input name="wallet_read" type="checkbox" value="On"></div>
								</td>
								<td>
									<div align="center"><input name="wallet_update" type="checkbox" value="On"></div>
								</td>
								<td>
									<div align="center"><input name="wallet_delete" type="checkbox" value="On"></div>
								</td>
							</tr>
							<tr>
								<td width="30" class="text-center">3</td>
								<td width="200">Charges <input type="hidden" name="wallet" value="Employee Wallet" /></td>
								<td>
									<div align="center"><input name="wallet_create" type="checkbox" value="On"></div>
								</td>
								<td>
									<div align="center"><input name="wallet_read" type="checkbox" value="On"></div>
								</td>
								<td>
									<div align="center"><input name="wallet_update" type="checkbox" value="On"></div>
								</td>
								<td>
									<div align="center"><input name="wallet_delete" type="checkbox" value="On"></div>
								</td>
							</tr>
							<tr>
								<td width="30" class="text-center">3</td>
								<td width="200">Borrowers <input type="hidden" name="wallet" value="Employee Wallet" /></td>
								<td>
									<div align="center"><input name="wallet_create" type="checkbox" value="On"></div>
								</td>
								<td>
									<div align="center"><input name="wallet_read" type="checkbox" value="On"></div>
								</td>
								<td>
									<div align="center"><input name="wallet_update" type="checkbox" value="On"></div>
								</td>
								<td>
									<div align="center"><input name="wallet_delete" type="checkbox" value="On"></div>
								</td>
							</tr>
						</tbody>
					</table>


					<div align="right">
						<div class="box-footer">
							<button type="submit" class="btn btn-info btn-flat" name="save"><i class="fa fa-save">&nbsp;Save Module</i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>