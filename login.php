<?php include('inc/header.php'); 
    if(isset($_SESSION['username'])){
        header('location:index.php');
    }
?>

<div class="container">
    <div class="row">
        <div class="col-12 ">
            <h1 class="text-center display-4 my-5 p-2"> Login</h1>
        </div>
        <div class="col-sm-6 mx-auto">
            <?php if(isset($_SESSION['error']) && !empty($_SESSION['error'])):?>
                <p class="alert alert-danger"><?php echo $_SESSION['error']; ?></p>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>
                <form method="POST" action="handler/login.php">
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary mt-2 w-100" value="Log In">
                    </div>
                </form>
        </div>
    </div>
</div>

<?php include('inc/footer.php');  ?>