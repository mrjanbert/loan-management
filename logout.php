<?php
    session_start();
    if (isset($_SESSION['user_id'])) {
        // unset($_SESSION['verified_user_id']);
        // unset($_SESSION['idTokenString']);
        session_destroy();
        session_start();
        $_SESSION['status']="<script>const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000
          })
      
          Toast.fire({
            icon: 'success',
            title: 'Logged out successfully'
          })</script>";
        header('location: index.php');
    }
?>