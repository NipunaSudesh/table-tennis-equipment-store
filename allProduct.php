<?php
@include 'config.php';
@include 'header.php';
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
<section class="product">
<div class="product-slider">

<?php

$select_product=mysqli_query($conn,"SELECT * FROM products where  quantity>0");
if(mysqli_num_rows($select_product)>0){
   // echo ' <h1 class="heading"><span>'.$type.'</span></h1>';
    while($row= mysqli_fetch_assoc($select_product)){
        echo'

        <div class="box">
            <div class="icons">
                <a href="#" class="fa-solid fa-magnifying-glass"></a>
                <a href="#" class="fa-regular fa-heart"></a>
                <a href="#" class="fa-regular fa-eye"></a>
            </div>
            <div class="image">
                <img src="uploaded_img/'. $row['image'].'" alt="">
            </div>
            <div class="content">
                <h3>'.$row['productName'].'</h3>
                <div class="price">Rs.'.$row['price'].' <span>Rs.'.$row['OldPrice'].'</span></div>
                <a href="cardViwe.php?allProductID='.$row['productID'].'"><button class="btn">Add Card</button></a>
            </div>
        </div>
        ';
    }
  }
        ?>
    

</div>

</section>
    
</body>
</html>