<?php include "incs/header.php" ?>
<?php include "incs/navigation.php" ?>


<div id="wrapper">

    <!-- Sidebar -->
    <?php include "incs/sidebar.php" ?>

    <?php
    $userObj= new User();
    if (isset($_SESSION['username'])){
        $user= $userObj->getUserByUsername($_SESSION['username']);
    }
    if (isset($_POST["submitEditUser"])){
        $userObj->updateUser($user["id"],$_POST["username"],$_POST["password"],$_POST["firstName"],$_POST["lastName"],$_POST["email"],$_POST["role"]);
        $pageName=$_SERVER["PHP_SELF"];
        header("Location: $pageName");
    }

    ?>
    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">User Profile</li>
            </ol>
            <div class="row">
                <div class="col">

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="Username">Username:</label>
                            <input type="text" class="form-control" name="username" value="<?=$user["username"]?>" id="Username">
                        </div>
                        <div class="form-group">
                            <label for="Password">Password:</label>
                            <input type="password" class="form-control"  name="password" id="Password" required>
                        </div>

                        <div class="form-group">
                            <label for="firstName">Firstname:</label>
                            <input type="text" class="form-control" name="firstName" value="<?=$user["first_name"]?>" id="firstName">
                        </div>
                        <div class="form-group">
                            <label for="lastName">Lastname:</label>
                            <input type="text" class="form-control" name="lastName" value="<?=$user["last_name"]?>" id="lastName">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" class="form-control" value="<?=$user["email"]?>">
                        </div>
                        <div class="form-group">
                            <label for="role">Role:</label>
                            <select class="form-control" name="role">

                                <option value="subscriber" <?php if ($user["role"]=="subscriber") echo "selected"?>>Subscriber</option>
                                <option value="admin" <?php if ($user["role"]=="admin") echo "selected"?>>Admin</option>
                            </select>
                        </div>

                        <input type="submit" name="submitEditUser" value="Update Profile" class="btn btn-lg btn-primary">
                    </form>
                </div>
            </div>
            <!-- Icon Cards-->


        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->

        <?php include "incs/footer.php" ?>
