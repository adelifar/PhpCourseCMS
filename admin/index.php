<?php include "incs/header.php"?>
<?php include "incs/navigation.php"?>


  <div id="wrapper">

    <!-- Sidebar -->
    <?php include "incs/sidebar.php"?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Admin</li>
        </ol>
          <h1>Welcome <?=$_SESSION["firstName"]." ".$_SESSION["lastName"]?></h1>

        <!-- Icon Cards-->


      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->

 <?php include "incs/footer.php" ?>
