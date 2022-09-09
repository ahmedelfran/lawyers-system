<?php
include "../shared/head.php";
include "../shared/Header.php";
include "../shared/Sidebar.php";
include "../genral/config.php";
include "../genral/functions.php";

if (isset($_POST['send'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    // img
    $image_name = time() . $_FILES['image']["name"];
    $image_tmp = $_FILES['image']['tmp_name'];
    $location = "./upload/";
    move_uploaded_file($image_tmp ,$location  . $image_name);

    $insert = "INSERT INTO `admin` VALUES(NULL , '$name' , '$email' , '$password' , '$image_name' role= '$role')";
    $i = mysqli_query($conn, $insert);
}

authrization(0);
?>


<main id="main" class="main">
<h1> Add New Admin </h1>
    <div class="container p-5">
        <div class="card p-4">
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="my-3">Name</label>
                        <input name="name" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="my-3">Email</label>
                        <input name="email" type="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="my-3">Password</label>
                        <input name="password" type="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="my-3">Image</label>
                        <input name="image" type="file" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="my-3">Role</label>
                        <select name="role"  required class="form-control" id="">
                            <option value="0"> All Access</option>
                            <option value="0"> with Out Admin</option>
                            <option value="0"> with Out Admin and Article</option>
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