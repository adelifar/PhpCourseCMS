<?php include "inc/header.php" ?>
<?php include "inc/navigation.php" ?>

<?php include_once "classes/Category_cls.php" ?>
<?php
include_once "classes/DB.php";
include_once "classes/Post_cls.php";
$postObj = new Post();
$pageLength = 5;
$page=1;
if (isset($_GET["page"])){
    $page=$_GET["page"];
}
$queryString='';
if (isset($_GET["catid"])) {
    $catid=$_GET["catid"];
    $queryString="catid={$catid}&";
    $postCount = $postObj->getAllCatPostCount($_GET["catid"]);
    $pageCount = ceil($postCount / $pageLength);
    $posts = $postObj->getCategoryPostsByPage($_GET["catid"],$pageLength,$page);

} elseif (isset($_GET["author"])) {
    $authorName=$_GET["author"];
    $queryString="author={$authorName}&";
    $postCount = $postObj->getAuthorPostCount($_GET["author"]);
    $pageCount = ceil($postCount / $pageLength);
//    $posts = $postObj->getPostsByAuthor($_GET["author"]);
    $posts=$postObj->getAuthorPostsByPage($_GET["author"],$pageLength,$page);
} else {
$queryString='';
    $postCount = $postObj->getAllPostCount();
    $pageCount = ceil($postCount / $pageLength);


    $posts = $postObj->getAllPostsByPage($pageLength,$page);
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
                if ($post["status"] != "Published") {
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
            <nav>
                <ul class="pagination">
                    <?php
                    for ($i = 1; $i <= $pageCount; $i++) {

                        ?>
                        <li class="page-item <?php if ($i==$page) echo "active" ?>"><a href="?<?=$queryString?>page=<?=$i?>" class="page-link "><?=$i?></a></li>
                        <?php
                    }
                    ?>
                </ul>
            </nav>
            <!-- First Blog Post -->


            <!-- Second Blog Post -->


            <!-- Third Blog Post -->


            <!-- Pager -->
            <!--            <ul class="">-->
            <!--                <li class="btn  btn-outline-primary">-->
            <!--                    <a href="#">&larr; Older</a>-->
            <!--                </li>-->
            <!--                <li class="btn float-md-right btn-outline-primary">-->
            <!--                    <a href="#">Newer &rarr;</a>-->
            <!--                </li>-->
            <!--            </ul>-->

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include "inc/sidebar.php" ?>

    </div>
    <!-- /.row -->

<?php include "inc/footer.php" ?>