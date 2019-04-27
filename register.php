<?php include "inc/header.php" ?>
<?php include "inc/navigation.php" ?>


<?php
include_once "classes/DB.php";
include_once "classes/User_cls.php";
$errorMsg='';
if (isset($_POST["register"])){
    $username=$_POST["username"];
    $password=$_POST["password"];
    $passwordConfirm=$_POST["passwordConfirm"];
    $email=$_POST["email"];
    if (empty($username) || empty($password) || empty($passwordConfirm) || empty($email)){
        die("Please fill out all fields");
    }
    if ($password!==$passwordConfirm){
        $errorMsg="password is not equal to password confirm";
    }
    $userObj=new User();
    $ops=["cost"=>11];
    $hash = password_hash($password, PASSWORD_BCRYPT, $ops);
    $userObj->registerUser($username,$email,$hash);
    header("Location: index.php");
}

?>
    <!-- Page Content -->
    <div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
      <div class="container">
          <div class="row">
              <div class="col-md-6 m-auto ">
                  <span class=" alert-danger"><?=$errorMsg?></span>
                  <form action="" method="post" autocomplete="off">
                      <div class="form-group">
                          <label for="">Username:</label>
                          <input type="text" class="form-control" placeholder="Username" name="username" required>
                      </div>
                      <div class="form-group">
                          <label for="">Email:</label>
                          <input type="email" class="form-control" placeholder="Email" name="email"  required>
                      </div>
                      <div class="form-group">
                          <label for="">Password:</label>
                          <input type="password" class="form-control" placeholder="Password" name="password"  required>
                      </div>
                      <div class="form-group">
                          <label for="">Password Confirm:</label>
                          <input type="password" class="form-control" placeholder="Password Confirm" name="passwordConfirm"  required>
                      </div>
                      <input type="submit" value="Register" name="register" class="btn btn-success btn-lg">
                  </form>
              </div>
          </div>
      </div>

    </div>
    <!-- /.row -->

<?php include "inc/footer.php" ?>