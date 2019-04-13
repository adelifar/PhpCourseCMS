<?php
$userObj=new User();
if (isset($_GET["uid"])){

    $user=$userObj->getUser($_GET["uid"]);
}
if (isset($_POST["submitEditUser"])){
    $userObj->updateUser($_GET["uid"],$_POST["username"],$_POST["password"],$_POST["firstName"],$_POST["lastName"],$_POST["email"],$_POST["role"]);
    $pageName=$_SERVER["PHP_SELF"];
    header("Location: $pageName");
}
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="Username">Username:</label>
        <input type="text" class="form-control" name="username" value="<?=$user["username"]?>" id="Username">
    </div>
    <div class="form-group">
        <label for="Password">Password:</label>
        <input type="password" class="form-control" value="value="<?=$user["password"]?>"" name="password" id="Password">
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

    <input type="submit" name="submitEditUser" value="Update User" class="btn btn-lg btn-primary">
</form>
