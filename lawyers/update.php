<?php
include "../shared/head.php";
include "../shared/Header.php";
include "../shared/Sidebar.php";
include "../genral/config.php";
include "../genral/functions.php";

//Update
$name = "";
$email = "";
$password = "";
if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $select = "SELECT * FROM lawyers where id = $id ";
    $s = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($s);
    $name = $row['name'];
    $email = $row['email'];
    $password = $row['password'];
    if (isset($_POST['update'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $update = "UPDATE lawyers SET name = '$name' , email = '$email' , password = '$password'  where  id = $id";
        $u = mysqli_query($conn, $update);
        go("/lawyers/list.php");
    }; 
        
};

?>


<main id="main" class="main">
    <h1> Edit Lawyer </h1>
    <div class="container p-5">
        <div class="card p-4">
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label class="my-3">Name</label>
                        <input name="name" value="<?php echo $name ?>" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="my-3">Email</label>
                        <input name="email" value="<?php echo $email ?>" type="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="my-3">Password</label>
                        <input name="password"value="<?php echo $password ?>" type="password" class="form-control">
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