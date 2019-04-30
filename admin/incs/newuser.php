<?php
$userError = '';
if (isset($_POST["submitNewUser"])) {
    $userObj = new User();

    try {
        $userObj->addUser($_POST["username"], $_POST["password"], $_POST["firstName"], $_POST["lastName"], $_POST["email"], $_POST["role"]);
    } catch (Exception $e) {
        $userError = "Can not add user check if username or email is not duplicate!!!";
    }
    if (!$userError) {
        $pageName = $_SERVER["PHP_SELF"];
        header("Location: $pageName");
    }
}

?>
<span class="alert-danger"><?=$userError?></span>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="Username">Username:</label>
        <input type="text" class="form-control" name="username" id="Username">
    </div>
    <div class="form-group">
        <label for="Password">Password:</label>
        <input type="password" class="form-control" name="password" id="Password">
    </div>

    <div class="form-group">
        <label for="firstName">Firstname:</label>
        <input type="text" class="form-control" name="firstName" id="firstName">
    </div>
    <div class="form-group">
        <label for="lastName">Lastname:</label>
        <input type="text" class="form-control" name="lastName" id="lastName">
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" class="form-control">
    </div>
    <div class="form-group">
        <label for="role">Role:</label>
        <select class="form-control" name="role">
            <option value="subscriber">Subscriber</option>
            <option value="admin">Admin</option>
        </select>
    </div>

    <input type="submit" name="submitNewUser" value="Add User" class="btn btn-lg btn-primary">
</form>
