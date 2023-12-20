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
    <title>Edit Product</title>
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

        $sql = "SELECT * FROM product WHERE product_id = $getid";
        $query = $conn->query($sql);
        $data = mysqli_fetch_assoc($query);

        $product_id  = $data['product_id'];
        $product_name = $data['product_name'];
        $product_category = $data['product_category'];
        $product_code = $data['product_code'];
        $product_entry_date = $data['product_entry_date'];
    }

    if(isset($_GET['product_name'])){
        $new_product_name = $_GET['product_name'];
        $new_product_category= $_GET['product_category'];
        $new_product_code = $_GET['product_code'];
        $new_product_entry_date = $_GET['product_entry_date'];
        $new_product_id = $_GET['product_id'];

        $sql1 = "UPDATE product SET product_name='$new_product_name', 
        product_category = '$new_product_category', 
        product_code='$new_product_code', 
        product_entry_date='$new_product_entry_date', 
        product_id='$new_product_id' 
        WHERE product_id= $new_product_id ";

        
        if ($conn->query($sql1) == TRUE) {
            echo "Record updated successfully";
          } else {
            echo "Error updating record: " . $conn->error;
          }


    }
    ?>

    <?php 
        $sql = "SELECT * FROM category";
        $query = $conn->query($sql);
    ?>

    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="GET">
        Product Name: <br>
        <input type="text" name="product_name" value="<?php echo $product_name ?>"> <br><br>

        Product Category: <br>

        <select name="product_category">
            <?php 
                while($data = mysqli_fetch_array($query)){
                $category_id = $data['category_id'];
                $category_name = $data['category_name'];
            ?>

        <option value="<?php echo $category_id ?>" <?php if($category_id === $product_category){echo 'Selected';} ?>>
            <?php echo $category_name ?>
        </option>

            <?php     }?>
            
        </select> <br><br>

        Product Code: <br>
        <input type="text" name="product_code" value="<?php echo $product_code ?>"> <br><br>

        Product Entry Date: <br>
        <input type="date" name="product_entry_date" value="<?php echo $product_entry_date ?>"> <br><br>

        <input type="text" name="product_id" value="<?php echo $product_id ?>" hidden> 

        <input type="submit" value="Submit" class="btn btn-success">
    </form>

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