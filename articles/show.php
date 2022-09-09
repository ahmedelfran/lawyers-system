<?php
include "../shared/head.php";
include "../shared/Header.php";
include "../shared/Sidebar.php";
include "../genral/config.php";
include "../genral/functions.php";

//show

if (isset($_GET['show'])) {
    $id = $_GET['show'];
    $select = "SELECT * FROM articles where id = $id ";
    $s = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($s);
    $image = $row['image'];
    $title = $row['title'];
    $description = $row['description'];
    $auther = $_SESSION['admin'];

};

?>


<main id="main" class="main">
    <h1> Edit Articles </h1>
    <div class="container p-5">
        <div class="card p-4">
            <img src="./upload/<?php echo $image ?>" class="img-top" alt="">
            <div class="card-body">
                <p>Title :  <?php echo $title ?></p>
                <p>Description :  <?php echo $description ?></p>
                <p>Auther :  <?php echo $auther ?></p>
            </div>
        </div>
    </div>
</main>





<?php
include "../shared/Footer.php";
include "../shared/script.php";
?>