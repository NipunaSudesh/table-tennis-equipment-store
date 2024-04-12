<?php
include 'config.php';
session_start();

if(isset($_SESSION['user_id'])){
    $user_id=$_SESSION['user_id'];
}


if(!isset($user_id)){
     header('location:login.php');
}
if(isset($_GET['logout'])){
    unset($user_id);
    session_destroy();
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style2.css">
</head>

     <div class="container">
      <div id="close-login-btn" class="fa-solid fa-xmark"></div>
        <div class="profile">
            <?php 

                 $select = mysqli_query($conn,"SELECT * FROM user_form WHERE id='$user_id'") or die('query failed');
                 
                 if(mysqli_num_rows($select) >0){
                    $fetch=mysqli_fetch_assoc($select);
                 } 
                 if($fetch['user_img']==''){
                    echo '<img src="image/avatar.jpg">';
                 }else{
                    echo '<img src="uploaded_img/'.$fetch['user_img'].'">';
                 }         
            ?>
            <h3> <?php echo $fetch['user_name']; ?></h3>
            <a href="update_profile.php" class="btn">Update Profile</a>
            <a href="index.php" class="btn">home page</a>
            <a href="home.php?logout=<?php echo $user_id; ?> "class="delete-btn">Logout</a>
            <p>new <a href="login.php">Login</a> or <a href="rejister.php">Rejister</a></p>
        </div>
      - </div> 
    
</body>
</html>