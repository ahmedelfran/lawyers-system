<?php
include "../shared/head.php";
include "../shared/Header.php";
include "../shared/Sidebar.php";
include "../genral/config.php";
include "../genral/functions.php";

//Update
$title = "";
$description = "";
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $select = "SELECT * FROM articles where id = $id ";
    $s = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($s);
    $title = $row['title'];
    $description = $row['description'];

    if (isset($_POST['update'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
         // img
        $image_name = time() . $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $location = "../upload/";
        move_uploaded_file($image_tmp, $location . $image_name);
        $update = "UPDATE articles SET title = '$title' , description = '$description' , image = '$image_name'   where  id = $id";
        $u = mysqli_query($conn, $update);
        go("/articles/list.php");
    };
};

?>


<main id="main" class="main">
    <h1> Edit Articles </h1>
    <div class="container p-5">
        <div class="card p-4">
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label class="my-3">Title</label>
                        <input name="title" value="<?php echo $title ?>" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="my-3">Description</label>
                        <input name="description" value="<?php echo $description ?>" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="my-3">Image</label>
                        <input name="image" value="<?php echo $image ?>" type="file" class="form-control">
                    </div>
                    <button name="update" class="btn btn-primary mt-4"> Update </button>
                </form>
            </div>
        </div>
    </div>
</main>





<?php
include "../shared/Footer.php";
include "../shared/script.php";
?>