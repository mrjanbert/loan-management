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
				<h1>Module Permission List</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item">User Management</li>
					<li class="breadcrumb-item active">Module Permission List</li>
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
                        <h3 class="card-title">List of Users</h3>
                        <div class="d-flex justify-content-end">
                            <a href="home.php?page=user_permission_add&accountNumber=<?php echo $accountNumber ?>" class="btn btn-primary btn-xs">
                                <i class="fa fa-plus"></i> &nbsp;
                                Add Permission
                            </a>
                        </div>
                        
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>User Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $select = mysqli_query($conn, "SELECT DISTINCT(accountNumber) FROM module_permission");
                                    while ($row = mysqli_fetch_array($select)) {
                                        //$id = $row['id'];
                                        $accountNumber = $row['accountNumber'];
                                        $getin = mysqli_query($conn, "SELECT firstName, middleName, lastName FROM tbl_users WHERE accountNumber = '$accountNumber'");
                                        $have = mysqli_fetch_array($getin);
                                        $name = $have['lastName'] . ', ' . $have['firstName'] . ' ' . $have['middleName'][0] . '.';
                                ?>
                                <tr> 
                                    <td><?php echo $name; ?> </td>
                                    <td>
                                        <a href="home.php?page=user_permission_view&accountNumber=<?php echo $accountNumber ?>" class="btn btn-success btn-xs"><i class="fa fa-eye"></i></a>
                                        <a href="permission_update.php?page=user_permission_list&accountNumber=<?php echo $accountNumber ?>" class="btn btn-primary btn-xs my-1"><i class="fa fa-edit"></i></a>
                                        <a href="../../code.php?accountNumber=<?php echo $accountNumber ?>" onclick="return confirm('Delete this permission?');" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                
                                <?php 
                                    }
                                ?> 
                            </tbody>
                        </table>
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section><!-- /.content -->