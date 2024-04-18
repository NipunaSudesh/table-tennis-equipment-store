<?php
@include 'config.php';
session_start();
//@include 'header.php';
// if(isset($_SESSION["user_id"])){
     $user_id = $_SESSION["user_id"];
    $user_query = mysqli_query($conn, "SELECT user_name FROM user_form WHERE id = '$user_id';");
    $user_row = mysqli_fetch_assoc($user_query);
     $username = $user_row['user_name'];
    if(isset($_POST['reviwe'])){
       // $name=mysqli_real_escape_string($conn ,$_POST['name']);
        $msg=mysqli_real_escape_string($conn ,$_POST['massage']);
        $star=mysqli_real_escape_string($conn ,$_POST['star']);
        $image=$_FILES['image']['name'];
        $image_size=$_FILES['image']['size'];
        $image_tmp_name=$_FILES['image']['tmp_name'];
        $image_folder='reviwes/'.$image;
    $insert=mysqli_query($conn,"INSERT INTO `reviwes`( `name`, `Image`, `massage`, `star`) VALUES ('$username','$image','$msg','$star')" );
    }
    else{
        echo "Error: " . mysqli_error($conn);
    }
   // }
// else{
//     header("location: login.php");
//     exit;
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="stylesheet" rel="style.css">
    <script src="https://kit.fontawesome.com/78f762bd78.js" crossorigin="anonymous"></script>

</head>
<body>
<section class="newsletter">
<form action="" method="post" enctype="multipart/form-data">
            <h3>Add Your Reviwes</h3>
        
            <!-- <input type="NAme" name="name" placeholder="Enter name" class="box" required> -->
            <textarea name="massage" placeholder="Enter your reviwe" class="box" required ></textarea>
            <input type="file" name="image" accept="image/jpg,image/jpeg, image/png" class="box">
            <select name="star" id="star" class="box">
            <option value="option1">1</option>
            <option value="option1">2</option>
            <option value="option1">3</option>
            <option value="option1">4</option>
            <option value="option1">5</option>
            </select>
            <input type="submit" name="reviwe" value="Reviwe Submit" class="btn" required>
            <p style="font-size: 1.7rem;color:aliceblue"> don't have an account ? <a href="rejister.php">Rejister Now</a></p>
        </form>

</section>
</body>
<!-- </html><form action="">
    <h3>Subscribe For Latest Updates</h3>
    <input type="email" name="" placeholder="Enter your email" class="box">
    <input type="submit" value="Subscribe" class="btn">
</form> -->