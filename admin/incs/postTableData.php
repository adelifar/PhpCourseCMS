<?php
$postObj = new Post();
if (isset($_GET["delete"]) && isset($_SESSION["role"]) && $_SESSION["role"]=="admin") {
    $id = $_GET["delete"];
    $postObj->deletePost($id);
    $pageName = $_SERVER["PHP_SELF"];
    header("Location: $pageName");
}
$posts = $postObj->getAllPosts();
$catObj = new Category();


if (isset($_POST['bulkSubmit'])) {
    if (!isset($_POST['checks'])) {
        echo("no item selected");
    } else {
        switch ($_POST['operationType']) {
            case 'Published':
                $postObj->changePostStatus($_POST['checks'], "Published");
                break;
            case 'Draft':
                $postObj->changePostStatus($_POST['checks'], "Draft");
                break;
            case 'Delete':
                $postObj->deleteBulkPost($_POST['checks']);
                break;
        }
        $pageName = $_SERVER["PHP_SELF"];
        header("Location: $pageName");
    }

}
?>
<form action="" method="post">
    <div class="row">
        <div class="col-md-3">
            <select class="form-control " name="operationType" required>
                <option value="">Select Option...</option>
                <option value="Published">Publish</option>
                <option value="Draft">Draft</option>
                <option value="Delete">Delete</option>
            </select>
        </div>
        <div class="col-md-3">
            <input type="submit" name="bulkSubmit" value="Apply" class="btn btn-success">
            <a href="?type=newpost" class="btn btn-primary">Add new</a>
        </div>
    </div>
    <table id="postTable" class="table table-bordered table-hover">
        <thead>
        <tr>
            <td><input type="checkbox" id="bulkCheckBoxHeader"></td>
            <th>Title</th>
            <th>category</th>
            <th>Author</th>
            <th>Date</th>
            <th>Status</th>
            <th>Image</th>
            <th>tags</th>
            <th>Content</th>
            <th>Comments</th>
            <th>Views</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($posts as $post) {
            ?>
            <tr>
                <td><input class="post_check" type="checkbox" value="<?= $post["id"] ?>" name="checks[]"/></td>
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
                <td><?=$post["view_count"]?></td>
                <td><a href="?type=editpost&pid=<?= $post["id"] ?>" class="btn btn-primary">Edit</a></td>
                <td><a onclick="return confirmMessage()" href="?delete=<?= $post["id"] ?>" class="btn btn-danger">Delete</a></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</form>
<script>
    $(document).ready(function () {
        $('#bulkCheckBoxHeader').click(function () {
            if (this.checked){
               $('.post_check').each(function () {
                   this.checked=true
               })
            } else{
                $('.post_check').each(function () {
                    this.checked=false;
                })
            }
        })
    })
</script>