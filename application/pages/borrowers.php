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
                        <button class="btn btn-success btn-xs" style="margin-left: 74%" data-toggle="modal" data-target="#add">
                            <i class="fa fa-plus"></i> &nbsp;
                            Add New Borrower
                        </button>
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
                                    include_once('../../config/database.php');
                                    $query = "SELECT * FROM tbl_users order by userCreated asc";
                                    $results = $conn->query($query);
                                ?>
                                <?php while ($row = $results->fetch_row()) :?>
                                <tr>
                                    <td><?php echo $row[0]; ?></td>
                                    <td><?php echo $row[1]; ?></td>
                                    <td><?php echo $row[2] .' '. $row[3] .' '. $row[4];?> </td>
                                    <td><?php echo $row[5]; ?></td>
                                    <td><?php echo $row[7];?></td>
                                    <td><?php echo $row[9];?></td>
                                    <td><?php echo $row[11];?></td>
                                    <td><?php echo $row[10];?></td>
                                    <td>
                                        <a href="edit_user.php?page=borrowers&accountNumber=<?php echo $row[1];?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                                        <button class="btn btn-danger btn-xs my-1"><i class="fa fa-trash"></i></button>
                                        <button class="btn btn-info btn-xs" data-toggle="modal" value=<?php echo $row[1]; ?> data-target="#view_user"><i class="fa fa-eye"></i></button>
                                    </td>
                                </tr>
                                <?php endwhile; ?>  
                            </tbody>
                        </table>
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section><!-- /.content -->