<?php 
  require('connection.php');
  session_start();
  $user_first_name =  $_SESSION['user_first_name'];
  $user_last_name = $_SESSION['user_last_name'];

  if(!empty($user_first_name && $user_last_name)){

    $sql3= "SELECT * FROM product";
    $query3 = $conn->query($sql3);

    $data_list = array();

    while($data3 = mysqli_fetch_assoc($query3)){
    $product_id = $data3['product_id'];
    $product_name = $data3['product_name'];
    
    $data_list[$product_id ]= $product_name;

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title> Report </title>
</head>
<body>



<!-- Container start -->
<div class="container bg-light">

<!-- Top bar start -->
  <div class="container-fluid border-bottom border-success table-hover">
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

      <div class="row m-4 p-4 border border-primary">
      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="GET">
    <select name="product_name">
        Select Product Name:

        <?php 
            $sql = "SELECT * FROM product";
            $query = $conn->query($sql);

            while($data = mysqli_fetch_assoc($query)){
        
            $product_id = $data['product_id'];
            $product_name = $data['product_name'];
            
        ?>
            <option value="<?php echo $product_id; ?>">
                    <?php echo $product_name;  ?>
            </option>
            <?php  } ?>
        </select>
        <input type="submit" value="Generate Report" class="btn btn-success mb-3">
    </form>
    <h5 class="bg-primary text-white p-1"> Store product </h5>
    <?php 
    // Report store data
        if(isset($_GET['product_name'])){
             $product_name = $_GET['product_name'];
             $sql1 = "SELECT * FROM store_product WHERE store_product_name = '$product_name' ";
             $query1 = $conn->query($sql1);

             while($data1 = mysqli_fetch_array($query1)){
                $store_product_name         = $data1['store_product_name'];
                $store_product_quentity     = $data1['store_product_quentity'];
                $store_product_entry_date	 = $data1['store_product_entry_date'];

                echo "<h3> $data_list[$store_product_name] </h3>";
                echo "<table class='table table-success table-striped table-hover'> 
                <tr>
                    <th>Store Date</th>
                    <th>Ammount</th>
                </tr>";

                echo "<tr> 
                    <td>$store_product_entry_date</td>
                    <td>$store_product_quentity</td>
                </tr>";

                echo "</table>";
             }
        }

        
    ?>

   <hr class="border-bottom border-primary"> 
    
    <h5 class="bg-primary text-white p-1"> Spend product </h5>
    <?php 
    // Report Spend data
        if(isset($_GET['product_name'])){
             $product_name = $_GET['product_name'];
             $sql4 = "SELECT * FROM spend_product WHERE spend_product_name = '$product_name' ";
             $query4 = $conn->query($sql4);

             while($data4 = mysqli_fetch_array($query4)){
                $spend_product_name         = $data4['spend_product_name'];
                $spend_product_quentity     = $data4['spend_product_quentity'];
                $spend_product_entry_date	 = $data4['spend_product_entry_date'];

                echo "<h3> $data_list[$spend_product_name] </h3>";
                echo "<table class='table table-success table-striped table-hover'> 
                <tr>
                    <th>Spend Date</th>
                    <th>Ammount</th>
                </tr>";

                echo "<tr> 
                    <td>$spend_product_entry_date</td>
                    <td>$spend_product_quentity</td>
                </tr>";

                echo "</table>";
             }
        }
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