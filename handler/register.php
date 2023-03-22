<?php
session_start();
require '../inc/db.php';

if(isset($_POST['submit'])){
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $mobile = filter_var($_POST['mobile'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    if(!empty($name) && !empty($email) && !empty($mobile) && !empty($password)){
        if(strlen($name) > 2){
            if(strlen($mobile) == 11){
                if(strlen($password) <= 20 ){
                    $hashedPassword = sha1($password);
                    $sql = mysqli_query($connection,"INSERT INTO `users`(`name`, `email`, `phone`, `password`) VALUES ('$name','$email','$mobile','$hashedPassword')");
                    if($sql){
                        $_SESSION['success'] = 'Added Successfully';
                        header('location:../register.php');
                    }
                }else{
                    $_SESSION['error'] = 'password must be less than 20 char!';
                    header('location:../register.php');
                }
            }else{
                $_SESSION['error'] = 'mobile number must be equal 11 char!';
                header('location:../register.php');
            }
        }else{
            $_SESSION['error'] = 'name must be more than 2 char!';
            header('location:../register.php');
        }
    }else{
        $_SESSION['error'] = 'Please Fill All Fields!';
        header('location:../register.php');
    }
}