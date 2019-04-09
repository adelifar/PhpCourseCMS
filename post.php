<?php include "inc/header.php" ?>
<?php include "inc/navigation.php" ?>
<?php
include_once "classes/DB.php";
include_once "classes/Post_cls.php";
if (isset($_GET["pid"])) {
    $postObj = new Post();
    $post = $postObj->getPost($_GET["pid"])[0];
}
?>
    <div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">




            <h2>
                <a href="post.php?pid=<?= $post["id"] ?>"><?= $post["title"] ?></a>
            </h2>
            <p class="lead">
                by <a href="index.php"><?= $post["author"] ?></a>
            </p>
            <p><span class="fa fa-clock"></span> Posted on <?= $post["date"] ?></p>
            <hr>
            <img class="img-fluid" src="images/<?= $post["image"] ?>" alt="">
            <hr>
            <p><?= $post["content"] ?></p>


            <hr>


            <!-- Pager -->

            <div class="card bg-light">
                <div class="card-header">
                    <h4>Leave a comment</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="">
                        <div class="input-group">

                            <textarea name="commentText" class="form-control"></textarea>
                            <span class="btn-group">

                        </span>

                        </div>
                        <div class="form-group mt-3">
                            <input type="submit" class="btn btn-lg btn-primary" value="Send Comment">
                        </div>
                    </form>
                </div>
                <!-- /.input-group -->
            </div>
        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include "inc/sidebar.php" ?>

    </div>
    <!-- /.row -->

<?php include "inc/footer.php" ?>