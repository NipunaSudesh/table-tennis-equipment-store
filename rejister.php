<?php

include 'config.php';

if(isset($_POST['submit'])){
    $name=mysqli_real_escape_string($conn ,$_POST['name']);
    $email=mysqli_real_escape_string($conn ,$_POST['email']);
    $pass=mysqli_real_escape_string($conn ,md5($_POST['password']));
    $cpass=mysqli_real_escape_string($conn ,md5($_POST['cpassword']));
    $image=$_FILES['image']['name'];
    $image_size=$_FILES['image']['size'];
    $image_tmp_name=$_FILES['image']['tmp_name'];
    $image_folder='uploaded_img/'.$image;

$select = mysqli_query($conn,"SELECT * FROM user_form WHERE email='$email' and pass='$pass'")  or die('query failed');
 

 
   if($pass != $cpass){
            $massage[]='confirm password not matched!';
        }
 else{
    if(mysqli_num_rows($select)>0){
        $massage[]='user already exist';
       }
    
    else if($image_size>200000){
        $massage[]='image size is too large!';
    }
    else{
        $insert=mysqli_query($conn,"INSERT INTO `user_form`( `user_name`, `email`, `pass`, `user_img`) VALUES ('$name','$email','$pass','$image')") ;
    if($insert){
        move_uploaded_file($image_tmp_name,$image_folder);
        $massage[]='Rejistered Successfully!';
        header('location:login.php');
    }
    else{
        $massage[]='Rejisterrstion Failed!';
        }
}
}
}

// $gett=mysqli_query($conn,"SELECT *FROM user_form WHERE id=1");

// if(mysqli_num_rows($gett)>0){
//     $row=mysqli_fetch_assoc($gett);

//     echo $row['id']."<br>";
//     echo $row['user_name']."<br>";
//     echo $row['email']."<br>";
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>rejister</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="form-container">
    <div id="close-login-btn" class="fa-solid fa-xmark"></div>
        <form action="" method="post" enctype="multipart/form-data">
            <h3>Rejister Now</h3>
            <input type="text" name="name" placeholder="Enter UserName" class="box" required>
            <input type="email" name="email" placeholder="Enter email" class="box" required>
            <input type="password" name="password" placeholder="Enter password" class="box" required >
            <input type="password" name="cpassword" placeholder="confirm password" class="box" required>
            <input type="file" name="image" accept="image/jpg,image/jpeg, image/png" class="box">
            <input type="submit" name="submit" value="Rejister Now" class="btn" required>
            <p> already have an account ? <a href="login.php">Login Now</a></p>
    </div>
    
</body>
</html>
