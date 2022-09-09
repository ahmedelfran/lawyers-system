<?php
include "./shared/head.php";
include "./genral/config.php";

$error = " ";
if (isset($_POST['login'])) {
  $name = $_POST['username'];
  $password = $_POST['password'];
  $typelogin = $_POST['type'];

  if($typelogin == 1){
  $select = "SELECT * FROM `admin` where name = '$name' and password = '$password'";
  $s = mysqli_query($conn, $select);
  $numRows = mysqli_num_rows($s);
  $_row = mysqli_fetch_assoc($s);


  if ($numRows > 0) {
    echo "<script>
    window.location.replace('/lawyer/');
    </script>";
    $_SESSION['admin'] = $name;
    $_SESSION['image'] = $_row['image'];
    $_SESSION['role'] = $_row['role'];
    $_SESSION['adminid'] = $_row['id'];
  } else {
    $error = "Please Enter Correct Data";
  }

  }else{
  $select = "SELECT * FROM `lawyers` where name = '$name' and password = '$password'";
  $s = mysqli_query($conn, $select);
  $numRows = mysqli_num_rows($s);
  $_row = mysqli_fetch_assoc($s);
  if ($numRows > 0) {
    echo "<script>
    window.location.replace('/lawyer/');
    </script>";
    $_SESSION['admin'] = $name;
    $_SESSION['role'] = 2;
  } else {
    $error = "Please Enter Correct Data";
  }
  }


}







?>

<main>
  <div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="d-flex justify-content-center py-4">
              <a href="index.html" class="logo d-flex align-items-center w-auto">
                <img src="assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">Lawyer</span>
              </a>
            </div><!-- End Logo -->

            <div class="card mb-3">

              <div class="card-body">

                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                </div>

                <form class="row g- needs-validation" method="POST">

                <div class="col-12">
                    <button name="login" class="btn btn-primary w-100" type="submit">Login</button>
                  </div>

                  <div class="col-12">
                    <label for="yourUsername" class="form-label">Username</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend">@</span>
                      <input type="text" name="username" class="form-control" id="yourUsername" required>
                    </div>
                    <div class="text-danger"><?php echo $error ?></div>
                  </div>

                  <div class="col-12">
                    <label for="yourPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="yourPassword" required>
                    <div class="text-danger"><?php echo $error ?></div>
                  </div>
                  
                  <div class="col-12">
                    <label for="yourPassword" class="form-label"> Login Type</label>
                    <select name="type" class="form-control" id="yourPassword" required>
                      <option value="1"> Admin </option>
                      <option value="2"> Lawyers </option>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</main><!-- End #main -->

<?php
include "./shared/script.php";
?>