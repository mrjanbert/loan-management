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
    $user_role = $_POST['user_role'];
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
            user_role = '$user_role'
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

if (isset($_POST['register_borrower_btn'])) {
    $account_number = '12'.rand(1000000,10000000);
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $age = $_POST['age'];

    $profile_picture = 'resources/uploads/' .$_FILES['profile_picture']['name'];

    $birth_date = $_POST['birth_date'];
    $contact_number = '+63' .$_POST['contact_number'];
    $email_address = $_POST['email_address'];
    $password = $_POST['password'];
    $encrypt = base64_encode($password);

    
	$photo = $_FILES['profile_picture']['tmp_name'];
	if(move_uploaded_file($photo,$profile_picture)) {
        $query = "INSERT INTO tbl_borrowers
            SET
                account_number = '$account_number',
                first_name = '$first_name',
                middle_name = '$middle_name',
                last_name = '$last_name',
                address = '$address',
                age = '$age',
                profile_picture = '$profile_picture',
                birth_date = '$birth_date',
                contact_number = '$contact_number',
                email_address = '$email_address',
                password = '$encrypt'
            ";
        $results = $conn->query($query);
        if ($conn->affected_rows > 0) :
            $_SESSION["status"] = "<script>$(function(){toastr.success('Registered successfully.')});</script>";
            header('location: application/pages/borrowers/login.php');
        else :
            $_SESSION["status"] = "<script>$(function(){toastr.danger('Error adding user! Please try again. ')});</script>";
            header('location: application/pages/borrowers/register.php');
        endif;
    } else {
        $_SESSION["status"] = "<script>$(function(){toastr.danger('Registration failed! Please try again. ')});</script>";
        header('location: application/pages/borrowers/register.php');
    }
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
    $profilePhoto = 'resources/uploads/' .$_FILES['profilePhoto']['name'];
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
        if ($conn->affected_rows > 0) {
            $_SESSION["status"] = "<script>$(function(){toastr.success('Update Successful.')});</script>";
            header('location: application/pages/borrowers.php?page=borrower_list&accountNumber='.$_SESSION['accountNumber']);
        } else {
            $_SESSION["status"] = "<script>$(function(){toastr.error('Update Error.')});</script>";
            header('location: application/pages/edit_user.php?page=borrower_update&accountNumber='.$_SESSION['accountNumber']);
        }
    } else {
        $_SESSION["status"] = "<script>$(function(){toastr.error('Update Error. Photo not uploaded.')});</script>";
        header('location: application/pages/edit_user.php?page=borrower_update&accountNumber='.$_SESSION['accountNumber']);
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
        <img class=\"animation__wobble\" src=\"../../assets/img/logo.png\" height=\"200\" width=\"200\"></div>";
		header('location: application/pages/home.php?page=dashboard&accountNumber='.$_SESSION['accountNumber']);
	} else {
        $_SESSION["status"] = "<script>$(function(){toastr.error('Invalid username or password! Please try again.')});</script>";
        header('location: index.php');
    }
}


if (isset($_POST['login_borrower_btn'])) {
	$email_address = $_POST['email_address'];
	$password = $_POST['password'];
    $encrypt = base64_encode($password);

	$query = "SELECT * FROM tbl_borrowers WHERE email_address = '" . $email_address . "' AND password = '" . $encrypt . "'";
	$result = mysqli_query($conn, $query);
	$count = mysqli_num_rows($result);

	if ($count > 0) {
		$data = $result->fetch_array();
		$_SESSION['borrower_id'] = $data['borrower_id'];
		$_SESSION['account_number'] = $data['account_number'];
		$_SESSION['email_address'] = $email_address;
        $_SESSION["status"] = "<div class=\"preloader flex-column justify-content-center align-items-center\">
        <img class=\"animation__wobble\" src=\"../../../assets/img/logo.png\" height=\"200\" width=\"200\"></div>";
		header('location: application/pages/borrowers/home.php?page=dashboard&account_number='.$_SESSION['account_number']);
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
        header('location: application/pages/home.php?page=manage_loan_plans&accountNumber='.$_SESSION['accountNumber']);
    else :
        header('location: application/pages/home.php?page=manage_loan_plans&accountNumber='.$_SESSION['accountNumber']);
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
        header('location: application/pages/home.php?page=manage_loan_types&accountNumber='.$_SESSION['accountNumber']);
    else :
        header('location: application/pages/home.php?page=manage_loan_types&accountNumber='.$_SESSION['accountNumber']);
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
        header('location: application/pages/home.php?page=manage_charges_list&accountNumber='.$_SESSION['accountNumber']);
        exit();
    else :
        header('location: application/pages/home.php?page=manage_charges_list&accountNumber='.$_SESSION['accountNumber']);
    endif;
}
 
if (isset($_POST['save_module'])) {
    $selecteduser = mysqli_real_escape_string($conn, $_POST['selecteduser']);

    $verify = mysqli_query($conn, "SELECT * FROM module_permission WHERE accountNumber = '$selecteduser'");
    $get_verify = mysqli_num_rows($verify);
    if ($get_verify == 9) {
        echo "<script>alert('Error: Permission Already granted. Please visit permission list to see!!'); </script>";
    } else {
        //Starting of first module
        $module1 = mysqli_real_escape_string($conn, $_POST['payments']);
        $pcreate1 = (isset($_POST['payments_create'])) ? 1 : 0;
        $pread1 = (isset($_POST['payments_read'])) ? 1 : 0;
        $pupdate1 = (isset($_POST['payments_update'])) ? 1 : 0;
        $pdelete1 = (isset($_POST['payments_delete'])) ? 1 : 0;

        $insert = mysqli_query($conn, "INSERT INTO module_permission VALUES('','$selecteduser','$module1','$pcreate1','$pread1','$pupdate1','$pdelete1')");
        //End of first module

        //Starting of second module
        $module2 = mysqli_real_escape_string($conn, $_POST['sms_logs']);
        $pcreate2 = (isset($_POST['sms_logs_create'])) ? 1 : 0;
        $pread2 = (isset($_POST['sms_logs_read'])) ? 1 : 0;
        $pupdate2 = (isset($_POST['sms_logs_update'])) ? 1 : 0;
        $pdelete2 = (isset($_POST['sms_logs_delete'])) ? 1 : 0;

        $insert = mysqli_query($conn, "INSERT INTO module_permission VALUES('','$selecteduser','$module2','$pcreate2','$pread2','$pupdate2','$pdelete2')");
        //End of second module

        //Starting of third module
        $module3 = mysqli_real_escape_string($conn, $_POST['manage_loans']);
        $pcreate3 = (isset($_POST['manage_loans_create'])) ? 1 : 0;
        $pread3 = (isset($_POST['manage_loans_read'])) ? 1 : 0;
        $pupdate3 = (isset($_POST['manage_loans_update'])) ? 1 : 0;
        $pdelete2 = (isset($_POST['manage_loans_delete'])) ? 1 : 0;

        $insert = mysqli_query($conn, "INSERT INTO module_permission VALUES('','$selecteduser','$module3','$pcreate3','$pread3','$pupdate3','$pdelete3')");
        //End of third module

        //Starting of fourth module
        $module4 = mysqli_real_escape_string($conn, $_POST['loan_plans']);
        $pcreate4 = (isset($_POST['loan_plans_create'])) ? 1 : 0;
        $pread4 = (isset($_POST['loan_plans_read'])) ? 1 : 0;
        $pupdate4 = (isset($_POST['loan_plans_update'])) ? 1 : 0;
        $pdelete4 = (isset($_POST['loan_plans_delete'])) ? 1 : 0;

        $insert = mysqli_query($conn, "INSERT INTO module_permission VALUES('','$selecteduser','$module4','$pcreate4','$pread4','$pupdate4','$pdelete4')");
        //End of fourth module

        //Starting of fifth module
        $module5 = mysqli_real_escape_string($conn, $_POST['loan_types']);
        $pcreate5 = (isset($_POST['loan_types_create'])) ? 1 : 0;
        $pread5 = (isset($_POST['loan_types_read'])) ? 1 : 0;
        $pupdate5 = (isset($_POST['loan_types_update'])) ? 1 : 0;
        $pdelete5 = (isset($_POST['loan_types_delete'])) ? 1 : 0;

        $insert = mysqli_query($conn, "INSERT INTO module_permission VALUES('','$selecteduser','$module5','$pcreate5','$pread5','$pupdate5','$pdelete5')");
        //End of fifth module

        //Starting of sixth module
        $module6 = mysqli_real_escape_string($conn, $_POST['charges']);
        $pcreate6 = (isset($_POST['charges_create'])) ? 1 : 0;
        $pread6 = (isset($_POST['charges_read'])) ? 1 : 0;
        $pupdate6 = (isset($_POST['charges_update'])) ? 1 : 0;
        $pdelete6 = (isset($_POST['charges_delete'])) ? 1 : 0;

        $insert = mysqli_query($conn, "INSERT INTO module_permission VALUES('','$selecteduser','$module6','$pcreate6','$pread6','$pupdate','$pdelete6')");
        //End of sixth module

        //Starting of seventh module
        $module7 = mysqli_real_escape_string($conn, $_POST['borrowers']);
        $pcreate7 = (isset($_POST['borrowers_create'])) ? 1 : 0;
        $pread7 = (isset($_POST['borrowers_read'])) ? 1 : 0;
        $pupdate7 = (isset($_POST['borrowers_update'])) ? 1 : 0;
        $pdelete7 = (isset($_POST['borrowers_delete'])) ? 1 : 0;

        $insert = mysqli_query($conn, "INSERT INTO module_permission VALUES('','$selecteduser','$module7','$pcreate7','$pread7','$pupdate7','$pdelete7')");
        //End of seventh module
        
        //Starting of eighth module
        $module8 = mysqli_real_escape_string($conn, $_POST['user_list']);
        $pcreate8 = (isset($_POST['user_list_create'])) ? 1 : 0;
        $pread8 = (isset($_POST['user_list_read'])) ? 1 : 0;
        $pupdate8 = (isset($_POST['user_list_update'])) ? 1 : 0;
        $pdelete8 = (isset($_POST['user_list_delete'])) ? 1 : 0;

        $insert = mysqli_query($conn, "INSERT INTO module_permission VALUES('','$selecteduser','$module8','$pcreate8','$pread8','$pupdate8','$pdelete8')");
        //End of eighth module

        //Starting of ninth module
        $module9 = mysqli_real_escape_string($conn, $_POST['user_management']);
        $pcreate9 = (isset($_POST['user_management_create'])) ? 1 : 0;
        $pread9 = (isset($_POST['user_management_read'])) ? 1 : 0;
        $pupdate9 = (isset($_POST['user_management_update'])) ? 1 : 0;
        $pdelete9 = (isset($_POST['user_management_delete'])) ? 1 : 0;

        $insert = mysqli_query($conn, "INSERT INTO module_permission VALUES('','$selecteduser','$module9','$pcreate9','$pread9','$pupdate9','$pdelete9')");
        //End of ninth module

        if (!$insert) {
            echo "<script>alert('Record not inserted.....Please try again later!'); </script>";
        } else {
            echo "<script>alert('Permission Added Successfully!!'); </script>";
            header('location: application/pages/home.php?page=user_permission_list&accountNumber='.$_SESSION['accountNumber']);
        }
    }
}

// Edit Permission
if (isset($_POST['edit_permission'])) {
    $accountNumber = $_GET['accountNumber'];
    $selector = $_POST['selector'];
    $i = 0;
    foreach ($selector as $s) {
        //$module = mysqli_real_escape_string($link, $_POST['module'][$i]);
        $mod_create = (isset($_POST['mod_create']) && ($_POST['mod_create'][$i] == '1')) ? 1 : 0;
        $mod_read = (isset($_POST['mod_read']) && ($_POST['mod_read'][$i] == '1'))  ? 1 : 0;
        $mod_update = (isset($_POST['mod_update']) && ($_POST['mod_update'][$i] == '1'))  ? 1 : 0;
        $mod_delete = (isset($_POST['mod_delete']) && ($_POST['mod_delete'][$i] == '1'))  ? 1 : 0;

        $update = mysqli_query($conn, "UPDATE module_permission SET mod_create = '$mod_create', mod_read = '$mod_read', mod_update ='$mod_update', mod_delete ='$mod_delete' WHERE mod_id ='$s'");
        $i++;

        if (!$update) {
            echo "<script>alert('Record not update.....Please try again later!'); </script>";
        } else {
            header('location: application/pages/home.php?page=user_permission_list&accountNumber='.$_SESSION['accountNumber']);
        }
    }
}


// Delete permission
if (isset($_GET['accountNumber'])) {
    $accountNumber = $_GET['accountNumber'];
    $result = mysqli_query($conn, "DELETE FROM module_permission WHERE accountNumber ='$accountNumber'");
    header('location: application/pages/home.php?page=user_permission_list&accountNumber='.$_SESSION['accountNumber']);
}

?>