<?php include('inc/header.php'); 
    if(!isset($_SESSION['username'])){
        header('location:login.php');
    }
?>

<div class="container">
    <div class="row">
        <div class="col-12 ">
            <h1 class="text-center display-4 my-5 p-2">Change Password</h1>
        </div>
        <div class="col-sm-6 mx-auto">
            <?php if (isset($_SESSION['success']) && !empty($_SESSION['success'])) : ?>
                <p class="alert alert-success"><?php echo $_SESSION['success']; ?></p>
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>
            <?php if (isset($_SESSION['error']) && !empty($_SESSION['error'])) : ?>
                <p class="alert alert-danger"><?php echo $_SESSION['error']; ?></p>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>
            <form method="POST" action="handler/changePassword.php">
                <div class="form-group">
                    <label for="password">Old Password</label>
                    <input type="password" name="old_password" class="form-control" id="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" name="new_password" class="form-control" id="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="password">Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control" id="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary mt-2 w-100" value="Change Password">
                </div>
            </form>
        </div>
    </div>
</div>

<?php include('inc/footer.php');  ?>