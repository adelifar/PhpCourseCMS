<?php
$postObj = new Post();
if (isset($_GET["pid"])) {

    $currentPost = $postObj->getPost($_GET["pid"]);
}
if (isset($_POST["submitEditPost"])){
    if (!empty($_FILES["image"]["name"])){

        move_uploaded_file($_FILES["image"]["tmp_name"],"../images/{$_FILES["image"]["name"]}");
        $postObj->updatePost($_POST["id"],$_POST["title"],$_POST["categoryId"],$_POST["status"],$_FILES["image"]["name"],$_POST["tags"],$_POST["content"]);
    }else{
        $postObj->updatePost($_POST["id"],$_POST["title"],$_POST["categoryId"],$_POST["status"],$_POST["lastImage"],$_POST["tags"],$_POST["content"]);
    }


    $pageName=$_SERVER["PHP_SELF"];
    header("Location: $pageName");
}
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" class="form-control" name="title" id="title" value="<?= $currentPost[0]["title"] ?>">
    </div>
    <div class="form-group">
        <label for="categoryId:">Category Id:</label>
        <select class="form-control" name="categoryId">
            <?php
            $catObj = new Category();
            $cats = $catObj->getAllCategories();
            foreach ($cats as $cat) {
                $catid = $cat["id"];
                $catText = $cat["name"];
                if ($currentPost[0]["category_id"] == $catid) {
                    echo "<option value='$catid' selected>$catText</option>";
                } else {


                    echo "<option value='$catid'>$catText</option>";
                }
            }
            ?>
        </select>
    </div>
<!--    <div class="form-group">-->
<!--        <label for="author">Author:</label>-->
<!--        <input type="text" class="form-control" name="author" id="author" value="--><?//= $currentPost[0]["author"] ?><!--">-->
<!--    </div>-->
    <div class="form-group">
        <label for="title">Status:</label>
        <select name="status" id="status"  class="form-control" required>
            <?php
            if ($currentPost[0]["status"]=="Draft"){
                ?>
                <option value="Draft" selected>Draft</option>
                <option value="Published">Published</option>
            <?php
            }else{
               ?>
                <option value="Draft" >Draft</option>
                <option value="Published" selected>Published</option>
            <?php
            }
            ?>
            

        </select>
    </div>
    <img src="../images/<?=$currentPost[0]['image']?>" width="150">
    <div class="form-group">

        <label for="image">Image:</label>
        <input type="file" name="image">
    </div>
    <div class="form-group">
        <label for="tags">Tags:</label>
        <input type="text" class="form-control" name="tags" id="tags" value="<?= $currentPost[0]["tags"] ?>">
    </div>
    <input type="hidden" name="id" value="<?= $currentPost[0]["id"] ?>">
    <input type="hidden" name="lastImage" value="<?= $currentPost[0]["image"] ?>">
    <div class="form-group">
        <label for="title">Content:</label>
        <textarea cols="30" rows="10" class="form-control" name="content"
                  id="editor"><?= $currentPost[0]["content"] ?></textarea>
    </div>
    <input type="submit" name="submitEditPost" value="Update Post" class="btn btn-lg btn-primary">
</form>