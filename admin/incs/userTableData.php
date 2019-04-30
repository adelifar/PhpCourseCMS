<?php
$userObj = new User();
if (isset($_GET["delete"])&& $userObj->isAdmin($_SESSION["username"])) {
    $id = $_GET["delete"];
    $userObj->deleteUser($id);
    $pageName = $_SERVER["PHP_SELF"];
    header("Location: $pageName");
}
$users = $userObj->getAllUsers();
//$catObj = new Category();
?>
<table id="postTable" class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($users as $user) {
        ?>
        <tr>
            <td><?= $user["id"] ?></td>

            <td><?= $user["username"] ?></td>
            <td><?= $user["first_name"] ?></td>
            <td><?= $user["last_name"] ?></td>
            <td><?= $user["email"] ?></td>
            <td><?= $user["role"] ?></td>
            <td><a href="?type=edituser&uid=<?= $user["id"] ?>" class="btn btn-primary">Edit</a></td>
            <td><a onclick="return confirmMessage()" href="?delete=<?= $user["id"] ?>" class="btn btn-danger">Delete</a></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>

