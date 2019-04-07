<?php include "incs/header.php" ?>
<?php include "incs/navigation.php" ?>


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
                <li class="breadcrumb-item active">Post</li>
            </ol>
            <div class="row">
                <div class="col">
                    <?php
                    if (isset($_GET["type"])) {
                        switch ($_GET["type"]) {
                            case "newpost":
                                include "incs/newpost.php";
                                break;
                            case "editpost":
                                include "incs/editpost.php";
                                break;
                            default:
                                include "incs/postTableData.php";
                                break;
                        }
                    } else {
                        include "incs/postTableData.php";
                    }


                    ?>
                </div>
            </div>
            <!-- Icon Cards-->


        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->

        <?php include "incs/footer.php" ?>
