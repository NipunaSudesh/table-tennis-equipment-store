<?php
include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];
if(isset($_POST['update_profile'])){
   $update_name=mysqli_real_escape_string($conn,$_POST['update_name']);
   $update_email=mysqli_real_escape_string($conn,$_POST['update_email']);
   
   mysqli_query($conn, "UPDATE `user_form` SET user_name = '$update_name', 
   email = '$update_email' WHERE id = '$user_id'") or die('query failed1');

$old_pass = $_POST['old_pass'];
$update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
$new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
$confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));

if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){

   if($update_pass != $old_pass){
      $message[] = 'old password not matched!';
   }elseif($new_pass != $confirm_pass){
      $message[] = 'confirm password not matched!';
   }else{
      mysqli_query($conn, "UPDATE `user_form` SET pass = '$confirm_pass' WHERE id = '$user_id'") or die('query failed2');
      $message[] = 'password updated successfully!';
   }
}
$update_image = $_FILES['update_image']['name'];
$update_image_size = $_FILES['update_image']['size'];
$update_image_tmp_name = $_FILES['update_image']['tmp_name'];
$update_image_folder = 'uploaded_img/'.$update_image;


if(!empty($update_image)){
   if($update_image_size > 2000000){
      $message[] = 'image is too large';
   }else{
      $image_update_query = mysqli_query($conn, "UPDATE `user_form` SET user_img = '$update_image' WHERE id = '$user_id'") or die('query failed3');
      if($image_update_query){
         move_uploaded_file($update_image_tmp_name, $update_image_folder);
      }
      $message[] = 'image updated succssfully!';
   }
}
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="update-profile">
        <?php
            
            $select = mysqli_query($conn,"SELECT * FROM user_form WHERE id='$user_id'") or die('query failed');
                 
            if(mysqli_num_rows($select) >0){
               $fetch=mysqli_fetch_assoc($select);
            } 
               
        ?>
      <form action="" method="post" enctype="multipart/form-data">
        <?php
           if($fetch['user_img']==''){
            echo '<img src="image/avatar.jpg">';
         }else{
            echo '<img src="uploaded_img/'.$fetch['user_img'].'">';
         } 
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="massage">'.$message.'</div>';
            }
         }  
        ?>
        <div class="flex">
            <div class="inputBox">
                <span>User Name :</span>
                <input type="text" name="update_name" value="<?php echo $fetch['user_name'] ?>" class="box">
                <span>User email :</span>
                <input type="email" name="update_email" value="<?php echo $fetch['email'] ?>" class="box">
                <span>Update your pic :</span>
                <input type="file" name="update_image" accept="image/jpg,image/jpeg, image/png" class="box">
             </div>
           <div class="inputBox">
                <input type="hidden" name="old_pass" value="<?php echo $fetch['pass']; ?>">
                <span>Old Password :</span>
                <input type="password" name="update_pass" placeholder="enter previous password" class="box">
                <span>New Password :</span>
                <input type="password" name="new_pass" placeholder="enter new password" class="box">
                <span>Confirm Password :</span>
                <input type="password" name="confirm_pass" placeholder="confirm new password" class="box">
           </div>
        </div>
        <input type="submit" values="update profile" class="btn" name="update_profile">
        <a href="home.php" class="delete-btn">Go Back</a>
      </form>

    </div>

    
</body>
</html>