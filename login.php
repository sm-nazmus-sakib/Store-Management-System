<?php 
  require('connection.php');
  session_start();
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Login</title>
</head>
<body>


<div class="container">
<div class="row mt-4 pt-4">
        <div class="col-sm-4"></div>
        <div class="col-sm-4 border border-primary">
            <h3 class="bg-success text-white text-center rounded p-1 mt-3">Please Login the System</h3>
        <?php 
        if(isset($_POST['user_email'])){
           
            $user_email        =  $_POST['user_email'];
            $user_password     =  $_POST['user_password'];

            $sql = "SELECT * FROM users WHERE user_email = '$user_email' AND user_password = '$user_password' ";
            $query = $conn->query($sql);
            if(mysqli_num_rows($query) > 0){

                $data = mysqli_fetch_array($query);

                $user_first_name = $data['user_first_name'];
                $user_last_name = $data['user_last_name'];

                $_SESSION['user_first_name'] = $user_first_name;
                $_SESSION['user_last_name'] = $user_last_name;

                header('location:index.php');
            }

            else{
                echo 'Not Ok';
            }

        
        }
    ?>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">

        User Email: <br>
        <input type="email" name="user_email"> <br><br>

        User Password: <br>
        <input type="password" name="user_password"> <br><br>

        <input type="submit" value="Login" class="btn btn-success mb-4">

    </form>
        </div>
        <div class="col-sm-4"></div>
    </div>
</div>
    

    

</body>
</html>

