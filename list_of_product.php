<?php
  session_start();
  $user_first_name =  $_SESSION['user_first_name'];
  $user_last_name = $_SESSION['user_last_name'];

  if(!empty($user_first_name && $user_last_name)){
?>

<?php 
    require('connection.php');
    $sql1= "SELECT * FROM category";
    $query1 = $conn->query($sql1);

    $data_list = array();

    while($data1 = mysqli_fetch_assoc($query1)){
    $category_id = $data1['category_id'];
    $category_name = $data1['category_name'];
    
    $data_list[$category_id ]= $category_name;

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <title>List of Product</title>
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
        $sql = "SELECT * FROM product";
        $query = $conn->query($sql);

        echo"<table class='table table-success table-striped table-hover'> 
        <tr> 
            <th> ID </th>
            <th>Product Name</th> 
            <th>Product Category</th> 
            <th>Product Code</th> 
            <th>Product Entrydate</th> 
            <th>Action</th> 
        </tr>";

        while($data = mysqli_fetch_assoc($query)){
    
        $product_id = $data['product_id'];
        $product_name = $data['product_name'];
        $product_category = $data['product_category'];
        $product_code = $data['product_code'];
        $product_entry_date = $data['product_entry_date'];

        echo "<tr>
            <td>$product_id</td>
            <td>$product_name</td>
            <td>$data_list[$product_category]</td>
            <td>$product_code</td>
            <td>$product_entry_date</td>
            <td> <a href='edit_product.php?id=$product_id' class='btn btn-success'> Edit  
             </a> <a href='#' class='btn btn-danger'> Delete </a>
            </a> </td>
            
        </tr>";
        }

        echo "</table>";
    ?>
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