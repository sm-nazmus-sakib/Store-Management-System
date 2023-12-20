<?php
  session_start();
  $user_first_name =  $_SESSION['user_first_name'];
  $user_last_name = $_SESSION['user_last_name'];

  if(!empty($user_first_name && $user_last_name)){
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title> Store Management System | SMS </title>
</head>
<body>

    <!-- Container start -->
    <div class="container bg-light">

    <!-- Top bar start -->
      <div class="container-fluid border-bottom border-success">
          <?php include('topbar.php'); ?>
      </div>
    <!-- Top bar End -->

      <div class="container-fluid">
        <div class="row">

          <!-- Left Bar start-->
          <div class="col-sm-3 bg-light p-0 m-0">
              <?php include('leftbar.php'); ?>
          </div>


          <!-- Left Bar End-->

          <!-- Right bar start -->
          <div class="col-sm-9 border-start border-success">

              <div class="row p-4">
                <div class="col-sm-3">
                    <a href="add_category.php"><i class="fas fa-folder-plus fa-4x text-success"></i></a>
                  <p>Add Category</p>
                </div>
                <div class="col-sm-3">
                    <a href="list_of_category.php"><i class="fa-regular fa-folder-open fa-4x text-success"></i></a>
                  <p>Category list</p>
                </div>
                <div class="col-sm-3">
                    <a href="add_product.php"> <i class="fa-solid fa-box-open fa-4x text-success"></i></a>
                    <p>Add Product</p>
                </div>
                <div class="col-sm-3">
                    <a href="list_of_product.php"> <i class="fa-solid fa-bars-staggered fa-4x text-success"></i></a>
                    <p>Product list</p>
                    
                </div>
              </div>
              <hr>

              <div class="row p-4">
                <div class="col-sm-3">
                    <a href="add_store_product.php">
                    <i class="fas fa-folder-plus fa-4x text-success"></i>
                    </a>
                  <p>Store Product</p>
                </div>
                <div class="col-sm-3">
                    <a href="list_of_entry_product.php">
                      <i class="fa-solid fa-box fa-4x text-success"></i>
                    </a>
                  <p>Store Product List</p>
                </div>
                <div class="col-sm-3">
                    <a href="add_spend_product.php"> 
                      <i class="fa-solid fa-share-from-square fa-4x text-success"></i>
                    </a>
                    <p>Spend Product</p>
                </div>
                <div class="col-sm-3">
                    <a href="list_of_spend_product.php"> 
                      <i class="fa-regular fa-window-restore fa-4x text-success"></i>
                    </a>
                    <p>Spend Product list</p>
                    
                </div>
              </div>
              <hr>
              <div class="row p-4">
                <div class="col-sm-3">
                    <a href="report.php">
                      <i class="fa-solid fa-chart-line fa-4x text-success"></i>
                    </a>
                  <p>Report</p>
                </div>
                <div class="col-sm-3">
                    
                </div>
                <div class="col-sm-3">
                    
                </div>
                <div class="col-sm-3">
                    
                    
                </div>
              </div>
              <hr>

              <div class="row p-4">
                <div class="col-sm-3">
                    <a href="add_users.php">
                        <i class="fa-solid fa-user-plus fa-4x text-success"></i>
                      
                    </a>
                  <p>Add User</p>
                </div>
                <div class="col-sm-3">
                  <a href="list_of_users.php">
                      <i class="fa-solid fa-users-line fa-4x text-success"></i>
                    </a>
                  <p>List of Users</p>
                </div>
                <div class="col-sm-3">
                    
                </div>
                <div class="col-sm-3">
                    
                    
                </div>
              </div>


          </div>
          <!-- Right bar End -->
        </div>
      </div>

      <div class="container-fluid border-top border-success">
        <?php include('bottombar.php'); ?> 
      </div>

    </div>
    <!-- Container End -->
    
    
</body>
</html>

<?php 
}
else{
  header('location:login.php');
}
?>