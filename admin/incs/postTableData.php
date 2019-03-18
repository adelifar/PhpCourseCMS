<?php
$postObj = new Post();
$posts = $postObj->getAllPosts();
?>
<table id="postTable" class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Title</th>
        <th>category Id</th>
        <th>Author</th>
        <th>Date</th>
        <th>Status</th>
        <th>Image</th>
        <th>tags</th>
        <th>Content</th>
        <th>Comment Count</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($posts as $post) {
        ?>
        <tr>
            <td><?= $post["title"] ?></td>
            <td><?= $post["category_id"] ?></td>
            <td><?= $post["author"] ?></td>
            <td><?= $post["date"] ?></td>
            <td><?= $post["status"] ?></td>
            <td><img class="img-fluid" src="../images/<?= $post["image"] ?>"></td>
            <td><?= $post["tags"] ?></td>
            <td><?= $post["content"] ?></td>
            <td><?= $post["comment_count"] ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>