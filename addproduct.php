<?php
    @include_once 'config.php';
    @include 'header.php';
    
    session_start();

    if(isset($_SESSION['userID'])){
        $userID=$_SESSION['userID'];
    }


    if(isset($_POST['add'])){
        $productName = mysqli_real_escape_string($conn,$_POST['productName']);
        $producttype = mysqli_real_escape_string($conn,$_POST['producttype']);
        $price = mysqli_real_escape_string($conn,$_POST['price']);
        $OldPrice = mysqli_real_escape_string($conn,$_POST['OldPrice']);
        $quantity = mysqli_real_escape_string($conn,$_POST['quantity']);
        $image = $_FILES['img']['name'];
        $description = mysqli_real_escape_string($conn,$_POST['description']);
        $image_folder='uploaded_img/'.$image;
        $temp_image = $_FILES['img']['tmp_name'];

        $insert = "INSERT INTO `products`(`productID`, `productName`,`productType`, `quantity`, `price`, `image`, `description`, `OldPrice`) 
        VALUES ('$productName','$producttype','$quantity','$price','$image','$description','$OldPrice');";
        $result_insert = mysqli_query($conn,$insert);

        if($result_insert){
            move_uploaded_file($temp_image,$image_folder);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>>Document</title>
    <link rel="stylesheet" href="style_login.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>


    <section id="add-product">
        <div class="form-container">
            <form enctype="multipart/form-data" method="post">
                <h3>Add products</h3>
                <?php
              if(isset($massage)){
                foreach($massage as $massage){
                    echo '<div class="massage">'.$massage.'</div>';
                }
              }
            ?>
                <input type="text" class="box" name="productName" placeholder="Product Name" required>
                <input type="text" class="box" name="producttype" placeholder="Product type" required>
                <input type="text" class="box" name="price" placeholder="Price" >
                <input type="text" class="box" name="OldPrice" placeholder="old Price" >
                <input type="text" class="box" name="quantity" placeholder="Quantity" >
                <input type="file" class="box" name="img" accept="image/png,image/jpg,image/jpeg" required>
                <input type="text" class="box" name="description" placeholder="Description" >

                <input type="submit" name="add" value="Add product" class="btn">
            </form>
        </div>
    </section>

    
   
</body>
</html>