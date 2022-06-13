<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - NMSCST Loan Management</title>
    <link rel="icon" type="image/x-icon" href="https://www.nmsc.edu.ph/application/themes/nmsc/favicon.ico">
    <?php include_once('application/includes/links-header.php'); ?>
</head>

<body class="hold-transition login-page">
    <div class="register-box">
        <form action="code.php" method="POST">
            <div class="card card-outline card-primary">
                <div class="card-header d-flex justify-content-center">
                    <h3><b>Register</b></h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <input type="hidden" class="form-control" name="user_id" required>
                        <div class="col-12">
                            <label>First Name</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="firstName" placeholder="Enter First Name" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <label>Middle Name</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="middleName" placeholder="Enter Middle Name" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <label>Last Name</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="lastName" placeholder="Enter Last Name" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <label>Address</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="address" placeholder="Enter Address" required>
                            </div>
                        </div>
                        <div class="col-5">
                            <label>Age</label>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" name="age" placeholder="Enter Age" required>
                            </div>
                        </div>
                        <div class="col-7">
                            <label>Birth Date</label>
                            <div class="input-group mb-3">
                                <input type="date" class="form-control" name="birthDate" required>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" name="profilePhoto">
                        <div class="col-12">
                            <label>Contact Number</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">+63</span>
                                </div>
                                <input type="text" class="form-control" name="contactNumber" placeholder="Ex. 9123456789" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <label>Email</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="email" placeholder="Ex. some.email@nmsc.edu.ph" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <label>Password</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="password" name="password" placeholder="Enter New Password" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                        </div>
                        <div class="col-4">
                                <button type="submit" name="register_btn" class="btn btn-primary float-right">Register</button>
                            </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center">
                        <p>Already have an account? <a href="index.php">Login</a></p>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <?php include_once('application/includes/links-footer.php'); ?>
</body>

</html>