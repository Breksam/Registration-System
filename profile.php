<?php include('inc/header.php'); 
    if(!isset($_SESSION['username'])){
        header('location:login.php');
    }
?>


    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="text-center display-4  my-5 ">Profile</h1>
                <div>
                    <h2> Name : <?php echo $_SESSION['username']; ?></h2>
                    <h2> Email : <?php echo $_SESSION['user_email']; ?></h2>
                    <?php if($_SESSION['username'] != "Breksam Hassan"):?>
                    <h2> Mobile : <?php echo $_SESSION['user_phone']; ?></h2>
                    <?php else: echo "<h2>You Are Admin</h2>" ?>
                    <?php endif;?>
                </div>
                <?php if(isset($_SESSION['user'])):?>
                <a href="changePassword.php" class=" btn btn-info">Change Password</a>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php  include('inc/footer.php');  ?> 
