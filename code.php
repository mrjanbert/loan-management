<?php
session_start();
require_once('config/database.php');

if (isset($_POST['register_btn'])) {
    $accountNumber = '013'.rand(1000000,10000000);
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $address = $_POST['address'];
    $age = $_POST['age'];
    $birthDate = $_POST['birthDate'];
    $contactNumber = '+63' .$_POST['contactNumber'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $encrypt = base64_encode($password);
    $query = "INSERT INTO tbl_users
        SET
            accountNumber = '$accountNumber',
            firstName = '$firstName',
            middleName = '$middleName',
            lastName = '$lastName',
            address = '$address',
            age = '$age',
            birthDate = '$birthDate',
            contactNumber = '$contactNumber',
            email = '$email',
            password = '$encrypt'
        ";
    $results = $conn->query($query);
    if ($conn->affected_rows > 0) :
        $_SESSION["status"] = "<script>$(function(){toastr.success('Registered successfully.')});</script>";
        header('location: index.php');
    else :
        $_SESSION["status"] = "<script>$(function(){toastr.danger('Error adding user! Please try again. ')});</script>";
        header('location: register.php');
    endif;
}

if (isset($_POST['editUser_btn'])) {
    $user_id = $_POST['user_id'];
    $accountNumber = $_POST['accountNumber'];
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $address = $_POST['address'];
    $age = $_POST['age'];
    $birthDate = $_POST['birthDate'];
    $contactNumber = '+63' .$_POST['contactNumber'];
    $profilePhoto = 'phresources/Images/uploads' .$_FILES['profilePhoto']['firstName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $encrypt = base64_encode($password);

	$photo = $_FILES['profilePhoto']['tmp_name'];
	if(move_uploaded_file($photo,$profilePhoto)) {

        $query = "UPDATE tbl_users 
        SET
            user_id = '$user_id',
            accountNumber = '$accountNumber',
            firstName = '$firstName',
            middleName = '$middleName',
            lastName = '$lastName',
            address = '$address',
            age = '$age',
            birthDate = '$birthDate',
            contactNumber = '$contactNumber',
            profilePhoto = '$profilePhoto',
            email = '$email',
            password = '$encrypt'
        WHERE
            accountNumber = '$accountNumber'";
            $results = $conn->query($query);
        if ($db->affected_rows > 0) {
            $_SESSION["status"] = "<script>$(function(){toastr.success('Update Successful.')});</script>";
            header('location: application/pages/borrowers.php?page=borrowers&accountNumber='.$_SESSION['accountNumber']);
        } else {
            $_SESSION["status"] = "<script>$(function(){toastr.error('Update Error.')});</script>";
            header('location: application/pages/edit_user.php?page=edit_user&accountNumber='.$_SESSION['accountNumber']);
        }
    } else {
        $_SESSION["status"] = "<script>$(function(){toastr.error('Update Error. Photo not uploaded.')});</script>";
        header('location: application/pages/edit_user.php?page=edit_user&accountNumber='.$_SESSION['accountNumber']);
    }
}

if (isset($_POST['login_btn'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];
    $encrypt = base64_encode($password);

	$query = "SELECT * FROM tbl_users WHERE email = '" . $email . "' AND password = '" . $encrypt . "'";
	$result = mysqli_query($conn, $query);
	$count = mysqli_num_rows($result);

	if ($count > 0) {
		$data = $result->fetch_array();
		$_SESSION['user_id'] = $data['user_id'];
		$_SESSION['accountNumber'] = $data['accountNumber'];
		$_SESSION['email'] = $email;
        $_SESSION["status"] = "<div class=\"preloader flex-column justify-content-center align-items-center\">
        <img class=\"animation__shake\" src=\"../../resources/Images/logo.png\" height=\"200\" width=\"200\"></div>";
		header('location: application/pages/home.php?page=dashboard&accountNumber='.$_SESSION['accountNumber']);
	} else {
        $_SESSION["status"] = "<script>$(function(){toastr.error('Invalid username! Please try again.')});</script>";
        header('location: index.php');
    }
}



if (isset($_POST['addplan_btn'])) {
    $term = $_POST['plan_term'];
    $interest = $_POST['interest_percentage'];
    $mode = $_POST['mode_of_payment'];

    $query = "INSERT INTO loan_plans 
        SET
            plan_term = '$term',
            interest_percentage = '$interest',
            mode_of_payment = '$mode'
        ";
    $results = $conn->query($query);    
    if ($conn->affected_rows > 0) :
        $_SESSION["status"] = "<script>$(function(){toastr.success('Added successfully.')});</script>";
        header('location: application/pages/home.php?page=manage_loan_plans');
    else :
        $_SESSION["status"] = "<script>$(function(){toastr.danger('Plan not added.')});</script>";
        header('location: application/pages/home.php?page=manage_loan_plans');
    endif;
}



if (isset($_POST['addloantype_btn'])) {
    $typeofLoan = $_POST['typeofLoan'];
    $description = $_POST['description'];

    $query = "INSERT INTO loan_types 
        SET
            typeofLoan = '$typeofLoan',
            description = '$description'
        ";
    $results = $conn->query($query);    
    if ($conn->affected_rows > 0) :
        $_SESSION["status"] = "<script>$(function(){toastr.success('Added successfully.')});</script>";
        header('location: application/pages/home.php?page=manage_loan_types');
    else :
        $_SESSION["status"] = "<script>$(function(){toastr.danger('Loan Type not added.')});</script>";
        header('location: application/pages/home.php?page=manage_loan_types');
    endif;
}



if (isset($_POST['addcharges_btn'])) {
    $charges_type = $_POST['charges_type'];
    $charge_percentage = $_POST['charge_percentage'];

    $query = "INSERT INTO tbl_charges 
        SET
            charges_type = '$charges_type',
            charge_percentage = '$charge_percentage'
        ";
    $results = $conn->query($query);    
    if ($conn->affected_rows > 0) :
        $_SESSION["status"] = "<script>$(function(){toastr.success('Added successfully.')});</script>";
        header('location: application/pages/home.php?page=manage_charges_list');
        exit();
    else :
        $_SESSION["status"] = "<script>$(function(){toastr.danger('Charges not added.')});</script>";
        header('location: application/pages/home.php?page=manage_charges_list');
    endif;
}


if (isset($_POST['logout_btn'])) {
    
    session_start();
    if (isset($_SESSION['user_id'])) {
        // unset($_SESSION['verified_user_id']);
        // unset($_SESSION['idTokenString']);
        session_destroy();
        session_start();
        $_SESSION['status']="<script>$(function(){toastr.success('Logged out successfully')});</script>";;
        header('location: index.php');
    }
}

?>