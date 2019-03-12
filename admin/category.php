<?php include "incs/header.php" ?>
<?php include "incs/navigation.php" ?>

<?php
$catObj = new Category();
$categories = $catObj->getAllCategories();
if (isset($_GET["delete"])) {

    $deleteId = $_GET["delete"];
    $catObj->deleteCategory($deleteId);
    $pageName = $_SERVER["PHP_SELF"];
    header("Location: $pageName");
}

if (isset($_POST["addCategorySubmit"])) {
    $name = $_POST["name"];
    $description = $_POST["description"];
    if ($name == "" || empty($name)) {
        $error = "Please Enter name";
    } else {
        $catObj->addCategory($name, $description);
        $pageName = $_SERVER["PHP_SELF"];
        header("Location: $pageName");
    }
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $selectedCategory = $catObj->getCategory($id);
    if (count($selectedCategory) > 0) {
        $selectedName = $selectedCategory[0]["name"];
        $selectedDescription = $selectedCategory[0]["description"];
        $selectedId = $selectedCategory[0]["id"];
    }
}

if (isset($_POST["editCategorySubmit"])) {
    $updateId=$_POST["editId"];
    $updateName=$_POST["name"];
    $updateDescription=$_POST["description"];
    if ($updateName=="" || empty($updateName)){
        $error="Enter Name of Category";
    }
    else{
        $catObj->updateCategory($updateId,$updateName,$updateDescription);
        $pageName = $_SERVER["PHP_SELF"];
        header("Location: $pageName");
    }
}
?>
<div id="wrapper">

    <!-- Sidebar -->
    <?php include "incs/sidebar.php" ?>

    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Category</li>
            </ol>
            <div class="row">
                <div class="col-md-5">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="nameInput">Name:</label>
                            <input type="text" class="form-control" name="name" id="nameInput">
                        </div>
                        <div class="form-group">
                            <label for="descriptionInput">Description:</label>
                            <input type="text" class="form-control" name="description">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" name="addCategorySubmit" type="submit">Add Category</button>
                        </div>
                    </form>
                    <?php
                    if (isset($_GET["edit"])) {
                        ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="nameInput">Name:</label>
                                <input type="text" class="form-control" value="<?php if (isset($selectedName)) {
                                    echo $selectedName;
                                }
                                ?>" name="name" id="nameInput">
                            </div>
                            <input type="hidden" name="editId"
                                   value="<?php if (isset($selectedId)) echo $selectedId; ?>">
                            <div class="form-group">
                                <label for="descriptionInput">Description:</label>
                                <input type="text" class="form-control" value="<?php if (isset($selectedDescription)) {
                                    echo $selectedDescription;
                                }
                                ?>"
                                       name="description">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-info" name="editCategorySubmit" type="submit">Update Category
                                </button>
                            </div>
                        </form>
                        <?php
                    }
                    ?>
                </div>
                <div class="col-md-5">
                    <table id="categoryTable" class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($categories as $category) {
                            echo "<tr>";
                            echo '<td>' . $category["id"] . '</td>';
                            echo '<td>' . $category["name"] . '</td>';
                            echo '<td>' . $category["description"] . '</td>';
                            echo '<td>' . '<a href="?delete=' . $category["id"] . ' " class="btn btn-danger">Delete</a>' . '</td>';
                            echo '<td>' . '<a href="?edit=' . $category["id"] . ' " class="btn btn-warning">Edit</a>' . '</td>';
                            echo "</tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php
            if (isset($error)) {
                echo "<span class='alert alert-danger'>$error</span>";
                unset($error);
            }
            ?>
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->

        <?php include "incs/footer.php" ?>
