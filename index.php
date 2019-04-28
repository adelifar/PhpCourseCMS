<?php include "inc/header.php" ?>
<?php include "inc/navigation.php" ?>

<?php include_once "classes/Category_cls.php" ?>
<?php
include_once "classes/DB.php";
include_once "classes/Post_cls.php";
$postObj = new Post();
if (isset($_GET["catid"])) {
    $posts = $postObj->getPosts($_GET["catid"]);
}elseif (isset($_GET["author"])){
    $posts=$postObj->getPostsByAuthor($_GET["author"]);
}
else {
    $posts = $postObj->getAllPosts();
}


?>
    <!-- Page Content -->
    <div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
            </h1>

            <?php
            foreach ($posts as $post) {
                if($post["status"]!="Published"){
                    continue;
                }
                ?>
                <h2>
                    <a href="post.php?pid=<?= $post["id"] ?>"><?= $post["title"] ?></a>
                </h2>
                <p class="lead">
                    by <a href="?author=<?= $post["author"] ?>"><?= $post["author"] ?></a>
                </p>
                <p><span class="fa fa-clock"></span> Posted on <?= $post["date"] ?></p>
                <hr>
                <img class="img-fluid" src="images/<?= $post["image"] ?>" alt="">
                <hr>
                <p><?= substr($post["content"], 0, 70) ?></p>
                <a class="btn btn-primary" href="post.php?pid=<?= $post["id"] ?>">Read More <span
                            class="fa fa-angle-right"></span></a>

                <hr>
                <?php
            }
            ?>
            <!-- First Blog Post -->


            <!-- Second Blog Post -->


            <!-- Third Blog Post -->

            <hr>

            <!-- Pager -->
            <ul class="">
                <li class="btn  btn-outline-primary">
                    <a href="#">&larr; Older</a>
                </li>
                <li class="btn float-md-right btn-outline-primary">
                    <a href="#">Newer &rarr;</a>
                </li>
            </ul>

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include "inc/sidebar.php" ?>

    </div>
    <!-- /.row -->

<?php include "inc/footer.php" ?>