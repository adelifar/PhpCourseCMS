<?php
$postObj = new Post();
if (isset($_GET["delete"])) {
    $id = $_GET["delete"];
    $postObj->deletePost($id);
    $pageName = $_SERVER["PHP_SELF"];
    header("Location: $pageName");
}
$posts = $postObj->getAllPosts();
$catObj = new Category();
?>
<table id="postTable" class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Title</th>
        <th>category</th>
        <th>Author</th>
        <th>Date</th>
        <th>Status</th>
        <th>Image</th>
        <th>tags</th>
        <th>Content</th>
        <th>Comment Count</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($posts as $post) {
        ?>
        <tr>
            <td><a href="../post.php?pid=<?= $post["id"] ?>"> <?= $post["title"] ?></a></td>
            <td><?php
                $cat = $catObj->getCategory($post["category_id"]);
                echo $cat[0]["name"];
                ?></td>
            <td><?= $post["author"] ?></td>
            <td><?= $post["date"] ?></td>
            <td><?= $post["status"] ?></td>
            <td><img class="img-fluid" width="100" src="../images/<?= $post["image"] ?>"></td>
            <td><?= $post["tags"] ?></td>
            <td><?= $post["content"] ?></td>
            <td><?= $post["comment_count"] ?></td>
            <td><a href="?type=editpost&pid=<?= $post["id"] ?>" class="btn btn-primary">Edit</a></td>
            <td><a href="?delete=<?= $post["id"] ?>" class="btn btn-danger">Delete</a></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>

