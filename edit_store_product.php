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
    <title>Edit Store Product</title>
</head>
<body>

    <?php 
        if(isset($_GET['id'])){
            $getid = $_GET['id'];
    
            $sql = "SELECT * FROM store_product WHERE store_product_id = $getid";
            $query = $conn->query($sql);
            $data = mysqli_fetch_assoc($query);
    
            $store_product_id               = $data['store_product_id'];
            $store_product_name             = $data['store_product_name'];
            $store_product_quentity         = $data['store_product_quentity'];
            $store_product_entry_date      = $data['store_product_entry_date'];
        }


        if(isset($_GET['store_product_name'])){
            $new_store_product_name = $_GET['store_product_name'];
            $new_store_product_quentity= $_GET['store_product_quentity'];
            $new_store_product_entry_date  = $_GET['store_product_entry_date'];
            $new_store_product_id  = $_GET['store_product_id'];
            
    
            $sql1 = "UPDATE store_product SET store_product_name='$new_store_product_name', 
            store_product_quentity = '$new_store_product_quentity', 
            store_product_entry_date='$new_store_product_entry_date'
            WHERE store_product_id = $new_store_product_id ";
    
            
            if ($conn->query($sql1) === TRUE) {
                echo "Record updated successfully";
              } else {
                echo "Error updating record: " . $conn->error;
              }
    
    
        }
       
    ?>

    

    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="GET">
        Product: <br>

        <select name="store_product_name">
            <?php 
                $sql = "SELECT * FROM product";
                $query = $conn->query($sql);
            
                while($data = mysqli_fetch_array($query)){
                    $data_id = $data['product_id'];
                    $data_name = $data['product_name'];
                ?>
                
                <option value='<?php echo $data_id ?>' <?php if($store_product_name == $data_id){echo 'selected';} ?>> <?php echo $data_name ?>
            </option>
               <?php }?>
            
        </select> <br><br>

        Product Quentity: <br>
        <input type="number" name="store_product_quentity" value="<?php echo $store_product_quentity  ?>"> <br><br>

        Store Entry Date: <br>
        <input type="date" name="store_product_entry_date" value="<?php echo $store_product_entry_date  ?>"> <br><br>
        
        <input type="text" name="store_product_id" value="<?php echo $store_product_id  ?>" hidden>

        <input type="submit" value="submit">
    </form>
</body>
</html>


<?php 
}
else{
  header('location:login.php');
}
?>