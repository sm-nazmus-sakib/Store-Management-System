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
    <title>List of Users</title>
</head>
<body>

    <?php 
        $sql = "SELECT * FROM users";
        $query = $conn->query($sql);

        echo"<table border='1'> 
        <tr> 
            
            <th>First Name</th> 
            <th>Last Name</th> 
            <th>Email</th> 
            <th>Action</th> 
        </tr>";

        while($data = mysqli_fetch_assoc($query)){
        
        $user_id            = $data['user_id'];
        $user_first_name    = $data['user_first_name'];
        $user_last_name     = $data['user_last_name'];
        $user_email         = $data['user_email'];

        echo "<tr>
            <td>$user_first_name</td>
            <td>$user_last_name</td>
            <td>$user_email</td>
            <td> <a href='edit_users.php?id=$user_id'> Edit </a> </td>
            
        </tr>";
        }

        echo "</table>";
    ?>

    
</body>
</html>

<?php 
}
else{
  header('location:login.php');
}
?>