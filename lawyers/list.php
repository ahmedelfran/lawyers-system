<?php
include "../shared/head.php";
include "../shared/Header.php";
include "../shared/Sidebar.php";
include "../genral/config.php";
include "../genral/functions.php";

// Read 
$select = "SELECT * FROM `lawyers`";
$s = mysqli_query($conn, $select);

//Delete
if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $delete = "DELETE FROM lawyers where id = $id";
    $d = mysqli_query($conn, $delete);
    go("/lawyers/list.php");
};

?>


<main id="main" class="main">
    <div class="container p-5">
        <div class="card p-4">
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                        </tr>
                    </thead>
                    <?php foreach ($s as $data) { ?>
                    <tr>
                        <th> <?php echo $data['id'] ?> </th>
                        <th> <?php echo $data['name'] ?> </th>
                        <th> <?php echo $data['email'] ?> </th>
                        <th> <a href="/lawyer/lawyers/list.php?delete=<?php echo $data['id'] ?>" class="btn btn-danger"> Delete </a > </th>
                        <th> <a href="/lawyer/lawyers/update.php?edit=<?php echo $data['id'] ?>" class="btn btn-info"> Update </a > </th>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</main>





<?php
include "../shared/Footer.php";
include "../shared/script.php";
?>