<?php 


   $hostname = 'localhost';
   $username = 'root';
   $password = '';
   $dbname = 'store_ms_db';

   $conn = new mysqli($hostname, $username,  $password , $dbname);

   if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }


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
    <title>Add Category</title>
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

        <div class="container m-4 p-4">
        <?php 
        if(isset($_GET['category_name'])){
            $category_name =  $_GET['category_name'];
            $category_entrydate=  $_GET['category_entrydate'];

        $sql = "INSERT INTO category (category_name, category_entrydate) VALUES
        ('$category_name', '$category_entrydate')";

        if($conn->query($sql) === TRUE){
                echo 'Data inserted successfully';
        }

        else{
            echo 'Data inserted not successfully';
        }
        }
       
    ?>

    <form action="add_category.php" method="GET">
        Category Name: <br>
        <input type="text" name="category_name"> <br><br>

        Category Entry Date: <br>
        <input type="date" name="category_entrydate"> <br><br>

        <input type="submit" value="submit" class="btn btn-success">
    </form>
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