<?php
include "../shared/head.php";
include "../shared/Header.php";
include "../shared/Sidebar.php";
include "../genral/config.php";
include "../genral/functions.php";

if (isset($_POST['send'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $auther = $_SESSION['admin'];
    // img
    $image_name = time() . $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $location = "./upload/";
    move_uploaded_file($image_tmp ,"$location/$image_name");

    $insert = "INSERT INTO articles VALUES(NULL , '$title' ,  '$description' , '$auther' , '$image_name' , default)";
    $i = mysqli_query($conn, $insert);
    
}

authrization(0 , 1 , 2);
?>


<main id="main" class="main">
<h1> Add New articles </h1>
    <div class="container p-5">
        <div class="card p-4">
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="my-3">Title</label>
                        <input name="title" type="text" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="my-3">Description</label>
                        <input name="description" type="text" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="my-3">Image</label>
                        <input name="image" type="file" required class="form-control">
                    </div>
                    <button name="send" class="btn btn-info mt-4"> Send Data </button>
                </form>
            </div>
        </div>
    </div>
</main>





<?php
include "../shared/Footer.php";
include "../shared/script.php";
?>