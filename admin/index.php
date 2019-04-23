<?php include "incs/header.php" ?>
<?php include "incs/navigation.php" ?>
<?php
$reportObj=new Report();
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
                                        <div class='h2'><?=$reportObj->getPostCount()?></div>
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
                                        <div class="h2"><?=$reportObj->getCommentCount()?></div>
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
                                        <div class='h2'><?=$reportObj->getUserCount()?></div>
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
                                        <div class='h2'><?=$reportObj->getCategoryCount()?></div>
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
                <div class="col-md-12" id="container"></div>
            </div>

            <!-- /.row -->


        </div>
        <script>
            var chart = Highcharts.chart('container', {

                chart: {
                    type: 'column'
                },

                title: {
                    text: 'گزارش کلی سیستم'
                },

                subtitle: {
                    text: 'اطلاعات کلی این سیستم به شرح زیر است'
                },

                legend: {
                    align: 'right',
                    verticalAlign: 'middle',
                    layout: 'vertical'
                },

                xAxis: {
                    categories: [],
                    labels: {
                        x: 0
                    }
                },

                yAxis: {
                    allowDecimals: false,
                    title: {
                        text: 'تعداد'
                    }
                },

                series: [{
                    name: 'Posts',
                    data: [<?=$reportObj->getPostCount()?>]
                }, {
                    name: 'Published Posts',
                    data: [<?=$reportObj->getActivePostCount()?>]
                },{
                    name: 'Draft Post',
                    data: [<?=$reportObj->getDraftPostCount()?>]
                },{
                    name: 'Users',
                    data: [<?=$reportObj->getUserCount()?>]
                },{
                    name: 'Admin Users',
                    data: [<?=$reportObj->getAdminUserCount()?>]
                },{
                    name: 'Subscriber',
                    data: [<?=$reportObj->getSubscriberCount()?>]
                }, {
                    name: 'Comments',
                    data: [<?=$reportObj->getCommentCount()?>]
                },{
                    name: 'Approved Comments',
                    data: [<?=$reportObj->getApprovedCommentCount()?>]
                },
                    {
                        name: 'Categories',
                        data: [<?=$reportObj->getCategoryCount()?>]
                    }],

                responsive: {
                    rules: [{
                        condition: {
                            maxWidth: 500
                        },
                        chartOptions: {
                            legend: {
                                align: 'center',
                                verticalAlign: 'bottom',
                                layout: 'horizontal'
                            },
                            yAxis: {
                                labels: {
                                    align: 'left',
                                    x: 0,
                                    y: -5
                                },
                                title: {
                                    text: null
                                }
                            },
                            subtitle: {
                                text: null
                            },
                            credits: {
                                enabled: false
                            }
                        }
                    }]
                }
            });

            $('#small').click(function () {
                chart.setSize(400, 300);
            });

            $('#large').click(function () {
                chart.setSize(600, 300);
            });

        </script>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->

        <?php include "incs/footer.php" ?>
