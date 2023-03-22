<?php include('inc/db.php');  ?>
<?php include('inc/header.php');
if (!isset($_SESSION['username'])) {
    header('location:login.php');
}
?>



<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <!-- <h1 class="text-center display-4 p-3 my-5 alert alert-success "> Login Successfully </h1> -->
            <?php if (isset($_SESSION['user']) && !empty($_SESSION['user'])) : ?>
                <h1 class="text-center display-4 p-3 my-5 alert alert-success "> Hello <?php echo $_SESSION['user']; ?> :) </h1>
            <?php endif; ?>
            <?php if (isset($_SESSION['admin']) && !empty($_SESSION['admin'])) : ?>
                <h1 class="text-center display-4 p-3 my-5 alert alert-success "> Hello <?php echo $_SESSION['admin']; ?> :) </h1>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include('inc/footer.php');  ?>