<?php
include 'config.php';
session_start();
if(isset($_POST['submit'])){
    $email=mysqli_real_escape_string($conn ,$_POST['email']);
    $pass=mysqli_real_escape_string($conn ,md5($_POST['password']));
$sql = "SELECT * FROM user_form WHERE email='$email' AND pass='$pass'" ;
// $sql =SELECT * FROM user_form WHERE email='$email' and pass='$pass';
 $select = mysqli_query($conn,$sql);
 
 if (!$select) {
    // Check for query error
   echo "Error: " . mysqli_error($conn);
} else {
    if (mysqli_num_rows($select) != 0) {
        $row = mysqli_fetch_assoc($select);
        $_SESSION['user_id'] = $row['id'];
        header('location: home.php');
        exit();
    } else {
        $massage[] = 'incorrect email or password';
    }
}
}
//  if(mysqli_num_rows($select)!=0){
//    $row = mysqli_fetch_assoc($select);
//     $_SESSION['user_id']=$row['id'];
//     header('location:home.php');
// }
//    else{
//     $massage[]='incorrect email or password';
//    }
// }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style2.css">
    <script src="https://kit.fontawesome.com/78f762bd78.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="form-container">
    <!-- <div id="close-login-btn" class="fa-solid fa-xmark"></div> -->
        <form action="" method="post" enctype="multipart/form-data">
            <h3>Login Now</h3>
            <?php
              if(isset($massage)){
                foreach($massage as $massage){
                    echo '<div class="massage">'.$massage.'</div>';
                }
              }
            ?>
        
            <input type="email" name="email" placeholder="Enter email" class="box" required>
            <input type="password" name="password" placeholder="Enter password" class="box" required >
            <input type="submit" name="submit" value="Login Now" class="btn" required>
            <p> don't have an account ? <a href="rejister.php">Rejister Now</a></p>
            <p><a href="home.php">home page</a></p>
    </div>
    <script src="script.js"></script>
</body>
</html>

<script>
 document.getElementById('#close-login-btn').addEventListener('click', function() {
            // Navigate back to the main page (replace 'main_page.html' with your main page URL)
            window.location.href = 'index.php';
        });
</script>
