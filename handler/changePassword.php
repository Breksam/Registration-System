<?php
session_start();
require '../inc/db.php';

if (isset($_POST['submit'])) {
    $old_password = filter_var($_POST['old_password'], FILTER_SANITIZE_STRING);
    $new_password = filter_var($_POST['new_password'], FILTER_SANITIZE_STRING);
    $confirm_password = filter_var($_POST['confirm_password'], FILTER_SANITIZE_STRING);
    $id = $_SESSION['user_id'];
    if (!empty($old_password) && !empty($new_password) && !empty($confirm_password)) {
                if(sha1($old_password) === $_SESSION['user_password']){
                    if($new_password === $confirm_password){
                        $hashNewPass = sha1($new_password) ;
                        $sqlq = mysqli_query($connection, "UPDATE `users` SET `password`='$hashNewPass' WHERE `id`= '$id'");
                        $sql = mysqli_query($connection, "SELECT * FROM `users`  WHERE `id`= '$id'");
                        $data = mysqli_fetch_assoc($sql);
                        $_SESSION['user_password'] = $data['password'];
                        $_SESSION['success'] = 'Password Changed Successfully';
                        header('location:../changePassword.php');
                    }
                    else{
                        $_SESSION['error'] = 'Passwords is not Match !';
                        header('location:../changePassword.php');
                    }
                }else{
                    $_SESSION['error'] = 'Old Password is Wrong !';
                    header('location:../changePassword.php');
                }
    }else{
        $_SESSION['error'] = 'Please Enter All data!';
        header('location:../changePassword.php');
    }
}
