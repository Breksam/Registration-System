<?php include('inc/header.php'); 
    if(!isset($_SESSION['username']) or !isset($_SESSION['admin'])){
        header('location:login.php');
    }
$sql = mysqli_query($connection, "SELECT * FROM users");
$users = [];
if (mysqli_num_rows($sql) > 0) {
    while ($row = mysqli_fetch_assoc($sql)) {
        $users[] = $row;
    }
}
$i = 1;
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center display-4  my-5 ">All Users</h1>
        </div>
        <div class="col-sm-10 mx-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <th scope="row"><?php echo $i++; ?></th>
                            <td><?php echo $user['name'] ?></td>
                            <td><?php echo $user['email'] ?></td>
                            <td><?php echo $user['phone'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>