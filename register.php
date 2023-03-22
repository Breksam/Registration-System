<?php include('inc/header.php'); 
    if(isset($_SESSION['username'])){
        header('location:index.php');
    }
?>

<div class="container">
    <div class="row">
        <div class="col-12 ">
            <h1 class="text-center display-4 my-5 p-2"> Register</h1>
        </div>
        <div class="col-sm-6 mx-auto">
            <?php if(isset($_SESSION['success']) && !empty($_SESSION['success'])):?>
                <p class="alert alert-success"><?php echo $_SESSION['success']; ?></p>
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>
            <?php if(isset($_SESSION['error']) && !empty($_SESSION['error'])):?>
                <p class="alert alert-danger"><?php echo $_SESSION['error']; ?></p>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>
                <form action="handler/register.php" method="POST">
                <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="mobile">Mobile</label>
                        <input type="tel" name="mobile" class="form-control" id="mobile" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary mt-2 w-100" value="Sign Up">
                    </div>
                </form>
        </div>
    </div>
</div>

<?php include('inc/footer.php');  ?>