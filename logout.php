<?php
    session_start();
    if (isset($_SESSION['user_id'])) {
        // unset($_SESSION['verified_user_id']);
        // unset($_SESSION['idTokenString']);
        session_destroy();
        session_start();
        $_SESSION['status']="<script>$(function(){toastr.success('Logged out successfully')});</script>";;
        header('location: index.php');
    }
?>