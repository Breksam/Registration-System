<?php
session_start();
require '../inc/db.php';

if (isset($_POST['submit'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    if (!empty($email) && !empty($password)) {
        $userSql = mysqli_query($connection, "SELECT * FROM `users` WHERE `email` = '$email'");
        $adminSql = mysqli_query($connection, "SELECT * FROM `admin` WHERE `email` = '$email'");
        if (mysqli_num_rows($userSql) === 1) {
            $data = mysqli_fetch_assoc($userSql);
            if (sha1($password) === $data['password']) {
                $_SESSION['user_id'] = $data['id'];
                $_SESSION['username'] = $data['name'];
                $_SESSION['user_email'] = $data['email'];
                $_SESSION['user_phone'] = $data['phone'];
                $_SESSION['user_password'] = $data['password'];
                $_SESSION['user'] = $_SESSION['username'];
                header('location:../index.php');
            } else {
                $_SESSION['error'] = 'password is wrong!';
                header('location:../login.php');
            }
        } elseif (mysqli_num_rows($adminSql) === 1) {
            $admin = mysqli_fetch_assoc($adminSql);
            if (sha1($password) === $admin['password']) {
                $_SESSION['user_id'] = $admin['id'];
                $_SESSION['username'] = $admin['name'];
                $_SESSION['user_email'] = $admin['email'];
                $_SESSION['user_password'] = $admin['password'];
                $_SESSION['admin'] = $_SESSION['username'];
                header('location:../index.php');
            }else{
                $_SESSION['error'] = 'password is wrong!';
                header('location:../login.php');
            }
        } else {
            $_SESSION['error'] = 'Email not exist!';
            header('location:../login.php');
        }
    } else {
        $_SESSION['error'] = 'Please Enter data!';
        header('location:../login.php');
    }
}
