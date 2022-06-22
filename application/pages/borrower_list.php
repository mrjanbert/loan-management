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
                <h1>Borrowers</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Borrowers</li>
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
                        <h3 class="card-title">List of Borrowers</h3>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#addborrower">
                                <i class="fa fa-plus"></i> &nbsp;
                                Add New Borrower
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Account No.</th>
                                    <th>Borrower Name</th>
                                    <th>Address</th>
                                    <th>Birth Date</th>
                                    <th>Contact No.</th>
                                    <th>Email Address</th>
                                    <th>Date Registered</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM tbl_borrowers order by userCreated asc";
                                $results = $conn->query($query);
                                ?>
                                <?php while ($row = $results->fetch_row()) : ?>
                                    <tr>
                                        <td><?php echo $row[0]; ?></td>
                                        <td><?php echo $row[1]; ?></td>
                                        <td><?php echo $row[2] . ' ' . $row[3] . ' ' . $row[4]; ?> </td>
                                        <td><?php echo $row[5]; ?></td>
                                        <td><?php echo $row[8]; ?></td>
                                        <td><?php echo $row[9]; ?></td>
                                        <td><?php echo $row[11]; ?></td>
                                        <td><?php echo $row[10]; ?></td>
                                        <td>
                                            <button class="btn btn-info btn-xs" data-toggle="modal" value=<?php echo $row[1]; ?> data-target="#view_user"><i class="fa fa-eye"></i></button>
                                            <a href="borrower_update.php?page=borrower_list&account_number=<?php echo $row[1]; ?>" class="btn btn-primary btn-xs my-1"><i class="fa fa-edit"></i></a>
                                            <a onclick="deleteborrower()" class="btn btn-danger btn-xs"><i class="fa-solid fa-trash-can"></i></a>
                                        </td>
                                    </tr>
                                    <script>
                                        function deleteborrower() {
                                            Swal.fire({
                                                title: 'Delete <?php echo $row[2]; ?> from database?',
                                                text: "You won't be able to revert this!",
                                                icon: 'warning',
                                                showCancelButton: true,
                                                confirmButtonColor: '#3085d6',
                                                cancelButtonColor: '#d33',
                                                confirmButtonText: 'Delete this user'
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    Swal.fire(
                                                        'Deleting ...',
                                                        window.location.href="../../code.php?deleteborrower_id=<?php echo $row[0]; ?>"
                                                    )
                                                }
                                            })
                                        }
                                    </script>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section><!-- /.content -->