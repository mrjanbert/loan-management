<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found - NMSC Loan Management</title>
    <link rel="icon" type="image/x-icon" href="https://www.nmsc.edu.ph/application/themes/nmsc/favicon.ico">

    <?php include_once('application/includes/links-header.php'); ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed" id="switch-mode">
    <div class="wrapper">

        <!-- Preloader
		<div class="preloader flex-column justify-content-center align-items-center">
			<img class="animation__shake" src="resources/Images/logo.png" height="150" width="150">
		</div>  -->


        <!-- Content Wrapper. Contains page content -->

        <!-- Main content -->
        <section class="content " style="margin-top: 100px;">
            <div class="error-page">
                <h2 class="headline text-warning"> 404</h2>

                <div class="error-content">
                    <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3>

                    <p>
                        We could not find the page you were looking for.
                        Meanwhile, you may <a href="../../index.php">return to dashboard</a> or try using the search form.
                    </p>

                </div>
                <!-- /.error-content -->
            </div>
            <!-- /.error-page -->
        </section>
        <!-- /.content -->

    </div>
    </div><!-- /.wrapper -->

    <?php include_once('application/includes/modal.php'); ?>
    <?php include_once('application/includes/links-footer.php'); ?>
    <?php unset($_SESSION["status"]); ?>
</body>

</html>