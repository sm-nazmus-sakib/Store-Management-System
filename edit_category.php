<?php 
  require('connection.php');
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
    <title>Edit Category</title>
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

      <div class="row m-4 p-4">
      <?php 
        if(isset($_GET['id'])){
            $getid = $_GET['id'];

            $sql = "SELECT * FROM category WHERE category_id = $getid";
            $query = $conn->query($sql);
            $data = mysqli_fetch_assoc($query);

            $category_id  = $data['category_id'];
            $category_name = $data['category_name'];
            $category_entrydate = $data['category_entrydate'];
        }
        
        if(isset($_GET['category_name'])){
            $new_category_name = $_GET['category_name'];
            $new_category_entrydate = $_GET['category_entrydate'];
            $new_category_id = $_GET['category_id'];

            $sql1 = "UPDATE category SET 
            category_name = '$new_category_name', category_entrydate = '$new_category_entrydate'
            WHERE category_id = $new_category_id";

            if($conn->query($sql1)){
                echo 'Data Updated successfully';
            }

            else 'Data not updated';
        }
       
    ?>

    <form action="edit_category.php" method="GET">
        Category Name: <br>
        <input type="text" name="category_name" value="<?php echo $category_name ?>"> <br><br>

        Category Entry Date: <br>
        <input type="date" name="category_entrydate" value="<?php echo $category_entrydate ?>"> <br><br>

        <input type="text" name="category_id" value="<?php echo $category_id ?>" hidden> 

        <input type="submit" value="Update" class="btn btn-success">
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