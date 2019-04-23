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
                <li class="breadcrumb-item active">Admin</li>
            </ol>
            <h1>Welcome <?= $_SESSION["firstName"] . " " . $_SESSION["lastName"] ?></h1>


            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="card bg-primary text-white">
                        <div class="card-heading">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-3">
                                        <i class="fa fa-file fa-5x" aria-hidden="true"></i>
                                    </div>
                                    <div class="col-md-9 text-right">
                                        <div class='h2'>12</div>
                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="post.php">
                            <div class="card-footer text-dark">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card bg-success">
                        <div class="card-heading">
                            <div class="container">
                                <div class="row text-white">
                                    <div class="col-md-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-md-9 text-right">
                                        <div class="h2">23</div>
                                        <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="comment.php">
                            <div class="card-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card bg-warning text-white">
                        <div class="card-heading">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-md-9 text-right">
                                        <div class='h2'>23</div>
                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="user.php">
                            <div class="card-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card bg-danger text-white">
                        <div class="card-heading">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-md-9 text-right">
                                        <div class='h2'>13</div>
                                        <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="category.php">
                            <div class="card-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- /.row -->


        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->

        <?php include "incs/footer.php" ?>
