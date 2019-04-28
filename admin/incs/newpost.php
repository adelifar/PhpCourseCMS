<?php
if (isset($_POST["submitNewPost"])){
    $title=$_POST["title"];
    $categoryId=$_POST["categoryId"];
    $author=$_POST["author"];
    $status=$_POST["status"];
    $imageName=$_FILES["image"]["name"];
    $imageTemp=$_FILES["image"]["tmp_name"];
    $tags=$_POST["tags"];
    $content=$_POST["content"];

    move_uploaded_file($imageTemp,"../images/$imageName");
    $postObj=new Post();
    $postObj->addPost($title,$categoryId,$author,$status,$imageName,$tags,$content);
    $pageName=$_SERVER["PHP_SELF"];
    header("Location: $pageName");
}
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" class="form-control" name="title" id="title">
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
                echo "<option value='$catid'>$catText</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="author">Author:</label>
        <input type="text" class="form-control" name="author" id="author">
    </div>
    <div class="form-group">
        <label for="title">Status:</label>
        <select name="status" id="status" class="form-control" required>
            <option value="Draft">Draft</option>
            <option value="Published">Published</option>
        </select>
    </div>
    <div class="form-group">
        <label for="image">Image:</label>
        <input type="file" name="image">
    </div>
    <div class="form-group">
        <label for="tags">Tags:</label>
        <input type="text" class="form-control" name="tags" id="tags">
    </div>
    <div class="form-group">
        <label for="title">Content:</label>
        <textarea  cols="30" rows="10" class="form-control" name="content" id="editor"></textarea>
    </div>
    <input type="submit" name="submitNewPost" value="Add Post" class="btn btn-lg btn-primary">
</form>
