<?php
$commentObj = new Comment();

if (isset($_GET["delete"])&& isset($_SESSION["role"]) && $_SESSION["role"]=="admin") {
    $id = $_GET["delete"];
    $commentObj->deleteComment($id);
    $pageName = $_SERVER["PHP_SELF"];
    header("Location: $pageName");
}
if (isset($_GET["approveid"])){
    $id=$_GET["approveid"];
    $commentObj->ChangeStatus($id);
    $pageName = $_SERVER["PHP_SELF"];
    header("Location: $pageName");
}
$comments = $commentObj->getAllComments();
?>
<table id="postTable" class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Id</th>
        <th>Post</th>
        <th>Author</th>
        <th>Date</th>
        <th>Status</th>
        <th>Email</th>
        <th>Content</th>
        <th>Approve</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($comments as $comment) {
        ?>
        <tr>
            <td><?= $comment["id"] ?></td>
            <td><a href="../post.php?pid=<?= $comment["post_id"] ?>"> <?= $comment["post_title"] ?></a></td>
            <td><?= $comment["author"] ?></td>
            <td><?= $comment["date"] ?></td>
            <td><?= $comment["status"]==1?"Approved":"UnApproved" ?></td>
            <td><?= $comment["email"] ?></td>
            <td><?= $comment["content"] ?></td>

            <td><?php
                if ($comment["status"]==1){
                    ?>
                    <a href="?approveid=<?= $comment["id"] ?>" class="btn btn-warning">UnApprove</a>
                <?php
                }
                else{
                    ?>
                    <a href="?approveid=<?= $comment["id"] ?>" class="btn btn-primary">Approve</a>
                <?php
                }
                ?>
            </td>
            <td><a onclick="return confirmMessage()" href="?delete=<?= $comment["id"] ?>" class="btn btn-danger">Delete</a></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>

