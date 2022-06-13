<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Loan Management with SMS</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="d-flex justify-content-center">
            <div class="card">
                <div class="card-header d-flex justify-content-center">
                    <h3>Send SMS</h3>
                </div>
                <div class="card-body">
                    <form action="sms.php" method="POST">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" name="number" placeholder="number" required>
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="text" class="form-control remember" name="message" placeholder="message" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="send" value="submit" class="btn btn-primary float-right">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>