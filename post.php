<?php include "inc/header.php" ?>
<?php include "inc/navigation.php" ?>
<?php
include_once "classes/DB.php";
include_once "classes/Post_cls.php";
include_once "classes/Comment_cls.php";
if (isset($_GET["pid"])) {
    $postObj = new Post();
    $post = $postObj->getPost($_GET["pid"])[0];
    $postObj->incrementView($_GET["pid"]);
}
$commentObj = new Comment();
if (isset($_POST["sendComment"])) {
    $author = $_POST["author"];
    $email = $_POST["email"];
    $content = $_POST["content"];
    $postId = $_GET["pid"];

    $commentObj->addComment($author, $email, $content, $postId);
}

$postComments = $commentObj->getPostComments($_GET["pid"]);
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
                        <div class="form-group">
                            <label>Author:</label>
                            <input type="text" class="form-control" name="author" required>
                        </div>
                        <div class="form-group">
                            <label for="">Email:</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="content">Content:</label>
                            <textarea name="content" class="form-control" required></textarea>
                            <span class="btn-group">

                        </span>

                        </div>
                        <div class="form-group mt-3">
                            <input name="sendComment" type="submit" class="btn btn-lg btn-primary" value="Send Comment">
                        </div>
                    </form>
                </div>
                <!-- /.input-group -->
            </div>
            <?php
            foreach ($postComments as $comment) {
                ?>
                <div class="card">
                    <div class="card-body">
                        <div>
                            <span class="font-weight-bolder p-3"><?= $comment["author"] ?></span>

                            <div>
                                <span class="small"><?= $comment["date"] ?></span><br>
                                <span class=""><?= $comment["content"] ?></span></div>
                        </div>
                    </div>
                </div>

                <?php
            }
            ?>

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include "inc/sidebar.php" ?>

    </div>
    <!-- /.row -->

<?php include "inc/footer.php" ?>