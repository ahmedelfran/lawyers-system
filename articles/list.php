<?php
include "../shared/head.php";
include "../shared/Header.php";
include "../shared/Sidebar.php";
include "../genral/config.php";
include "../genral/functions.php";

// Read 
$select = "SELECT * FROM `articles`";
$s = mysqli_query($conn, $select);

//Delete
if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $delete = "DELETE FROM articles where id = $id";
    $d = mysqli_query($conn, $delete);
    go("/articles/list.php");
};

authrization(0 , 1 , 2);

?>


<main id="main" class="main">
    <div class="container p-5">
        <div class="card p-4">
            <div class="card-body">
                <table class="table table-hover text-center">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th colspan="3" scope="col">Action</th>
                        </tr>
                    </thead>
                    <?php foreach ($s as $data) { ?>
                    <tr>
                        <th> <?php echo $data['id'] ?> </th>
                        <th> <?php echo $data['title'] ?> </th>
                        <th> <a href="/lawyer/articles/show.php?show=<?php echo $data['id'] ?>" class="btn btn-primary"> Show </a > </th>
                        <th> <a href="/lawyer/articles/update.php?edit=<?php echo $data['id'] ?>" class="btn btn-info"> Edit </a > </th>
                        <th> <a href="/lawyer/articles/list.php?delete=<?php echo $data['id'] ?>" class="btn btn-danger"> Delete </a > </th>
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