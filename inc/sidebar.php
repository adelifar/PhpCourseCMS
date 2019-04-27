<div class="col-md-4">

    <div class="card bg-light mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h4>Login</h4>
                </div>
                <div class="col-md-6">
                    <a href="register.php" class="btn btn-secondary">Register</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form method="post" action="login.php">
                <input class="form-control mb-1" name="username" placeholder="Username">
                <div class="input-group">

                    <input name="password" type="password" class="form-control" placeholder="Password">
                    <button name="loginSubmit" class="btn btn-primary" type="submit">
                        Login
                    </button>

                </div>
            </form>
        </div>
        <!-- /.input-group -->
    </div>
    <!-- Blog Search Well -->
    <div class="card bg-light">
        <div class="card-header">
            <h4>Blog Search</h4>
        </div>
        <div class="card-body">
            <form method="post" action="/cms/search.php">
                <div class="input-group">

                    <input name="searchQuery" type="text" class="form-control">
                    <span class="btn-group">
                            <button name="searchSubmit" class="btn btn-primary" type="submit">
                                <span class="fa fa-search"></span>
                        </button>
                        </span>

                </div>
            </form>
        </div>
        <!-- /.input-group -->
    </div>

    <!-- Blog Categories Well -->
    <div class="card bg-light mt-4">
        <div class="card-header">
            <h4>Blog Categories</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <?php
                include_once "classes/DB.php";
                include_once "classes/Category_cls.php";

                $cat = new Category();
                $cats = $cat->getAllCategories();
                //                foreach ($cats as $c) {
                //                    ?>
                <!--                    <li class="nav-item">-->
                <!--                        <a class="nav-link" href="#">--><? //= $c["name"] ?><!--</a>-->
                <!--                    </li>-->
                <!--                    --><?php
                //                }
                $cnt = count($cats);
                ?>
                <div class="col-lg-6">
                    <ul class="list-unstyled">
                        <?php
                        for ($i = 0; $i <= $cnt / 2; $i++) {
                            ?>
                            <li><a href="index.php?catid=<?= $cats[$i]["id"] ?>"><?= $cats[$i]["name"] ?></a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>

                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <ul class="list-unstyled">
                        <?php
                        for ($i = $cnt / 2 + 1; $i < $cnt; $i++) {
                            $href = "index.php?catid={$cats[$i]["id"]}";
                            echo '<li><a href="' . $href . '">' . $cats[$i]["name"] . '</a> </li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <div class="card bg-light mt-4">
        <div class="card-header">
            <h4>Side Widget Well</h4>
        </div>
        <div class="card-body">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci
                accusamus
                laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
        </div>
    </div>

</div>