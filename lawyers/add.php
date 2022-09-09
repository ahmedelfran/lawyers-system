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


    $insert = "INSERT INTO lawyers VALUES(NULL , '$name' ,  '$email' , '$password')";
    $i = mysqli_query($conn, $insert);
    testMessage($i , "insert");

}

?>


<main id="main" class="main">
<h1> Add New Lawyer </h1>
    <div class="container p-5">
        <div class="card p-4">
            <div class="card-body">
                <form action="" method="POST">
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