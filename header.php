
<?php
@include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="style2.css"> -->
    <link rel="icon" href="photo/ttlogo.png">
</head>
<body>
<header class="header">
        <div class="header-1">
            <img src="photo/ttlogo.png" height="100px" width="100px">
            <form action="" class="search-form">
                <input type="search" name="" id="search-box" placeholder="Search here....">
                <label for="search-box" class="fa-solid fa-magnifying-glass"></label>
            </form>
            <div class="icons">
                <div id="search-btn" class="fa-solid fa-magnifying-glass"></div>
                <a href="" id="heart"><i class="fa-solid fa-heart"></i></a>
               <a href="" id="shopping-cart"><i class="fa-solid fa-cart-shopping"></i></a>
                <div id="login-btn" ><i class="fa-solid fa-user"></i></div>
            </div>
        </div>

        <div class="header-2">
            <nav class="navbar">
                <a href="#home.php">Home</a>
                <a href="#featured">featured</a>
                <a href="#arrivals">arrivals</a>
                <a href="update_profile.php">profile</a>
                <?php

                    if(isset($_SESSION['userID'])){
                        $userID= $_SESSION['userID'];

                        $sql = "SELECT * from users where userID= '$userID' ;";
                        $select_user = mysqli_query($connect,$sql);

                        if(mysqli_num_rows($select_user)>0){
                            $row =mysqli_fetch_assoc($select_user);
                            $email=$row['email'];
                            $pass=$row['password'];
                            $select_admin = mysqli_query($connect,"SELECT * from admins where email='$email'and password='$pass'");

                            if(mysqli_num_rows($select_admin)>0){
                                echo '<a href="addproduct.php">Add Product</a>';
                            }

                            $select_super_admin = mysqli_query($connect,"SELECT * from superadmin where email='$email'and password='$pass'");

                            if(mysqli_num_rows($select_super_admin)>0){
                                echo '<a href="addadmin.php">Add Admin</a>';
                            }
                        }

                    }

                ?>
            </nav>
        </div>
    </header>
</body>
</html>