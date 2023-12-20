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
    <title>Add User</title>
</head>
<body>

<div class="container">
<div class="row mt-4 pt-4">
        <div class="col-sm-4"></div>
        <div class="col-sm-4 border border-primary">
            <h3 class="bg-success text-white text-center rounded p-1 mt-3">Add Users</h3>

            <?php 
        if(isset($_GET['user_first_name'])){
            $user_first_name            =  $_GET['user_first_name'];
            $user_last_name             =  $_GET['user_last_name'];
            $user_email                 =  $_GET['user_email'];
            $user_password              =  $_GET['user_password'];

        $sql = "INSERT INTO users(user_first_name,user_last_name, 
        user_email, user_password)
         VALUES
        ('$user_first_name', '$user_last_name', 
        '$user_email', '$user_password')";

        if($conn->query($sql) === TRUE){
                echo 'Data inserted successfully';
        }

        else{
            echo 'Data inserted not successfully';
        }
        }
       
    ?>

    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="GET">

        User First Name: <br>
        <input type="text" name="user_first_name"> <br><br>

        User Last Name: <br>
        <input type="text" name="user_last_name"> <br><br>

        User Email: <br>
        <input type="email" name="user_email"> <br><br>

        User Password: <br>
        <input type="password" name="user_password"> <br><br>

        <input type="submit" value="Add User" class="btn btn-success mb-4">
    </form>

        </div>
        <div class="col-sm-4"></div>
    </div>
</div>

</body>
</html>

<?php 
}
else{
  header('location:login.php');
}
?>