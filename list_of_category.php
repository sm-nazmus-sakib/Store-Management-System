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
    <title> List of Category </title>
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
        $sql = "SELECT * FROM category";
        $query = $conn->query($sql);

        echo"<table class='table table-success table-striped table-hover'> 
        <tr> 
            <th> ID </th>
            <th>Category Name</th> 
            <th>Category Entrydate</th> 
            <th>Action</th> 
        </tr>";

        while($data = mysqli_fetch_assoc($query)){
    
        $category_id = $data['category_id'];
        $category_name = $data['category_name'];
        $category_entrydate = $data['category_entrydate'];

        echo "<tr>
            <td>$category_id</td>
            <td>$category_name</td>
            <td>$category_entrydate</td>
            <td> <a href='edit_category.php?id=$category_id' class='btn btn-success'> Edit </a> <a href='#' class='btn btn-danger'> Delete </a>  </td>
            
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