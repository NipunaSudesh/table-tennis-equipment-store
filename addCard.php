<?php
   session_start();
    @include_once 'config.php';
    // @include 'header.php';

    if(isset($_GET['productID'])){
        $userId=$_SESSION['user_id'];
        $productID=$_GET['productID'];
        $selectProduct="SELECT * FROM products WHERE productId=$productID;";
        $getProduct=mysqli_query($conn,$selectProduct);
        $row=mysqli_fetch_assoc($getProduct);
        $productName =$row['productName'];
        $image=$row['iamge'];
        $price=$wow['price'];
        $quantity=$wow['quantity'];

        $sqlcheckCart = "SELECT * FROM addCart WHERE productID = $productID and userID = $userID";
        $checkCard =mysqli_query($conn,$checkCard);
        if(mysqli_num_rows($checkCard)==0){
            $sqlAddCard = "INSERT INTO addCart (productID,userID,productName,image,price) VALUES ('$productID','$userID','$productName','$image','$price')";
            $addToCart = mysqli_query($conn, $sqlAdcart);
        }else{
            $rowQty=mysqli_fetch_assoc($checkcart);
            $productQty = $rowQty['quantity'];
            $productQty++;
            $updateCart = mysqli_query($conn, "UPDATE addCart SET quantity = $pQty WHERE productID = $productID");
        if($updateCart){
        mysqli_query($connect, "UPDATE products SET quantity = $quantity-1 WHERE productID = $productID");
        $displayMsg = 'Added To Cart Successfully!';
        header('location:index.php?msg='.$displayMsg.'');
        // added to cart successfully
    }else{
        $displayMsg = 'Please login to the system!';
        header('location:login.php?msg='.$displayMsg.'');
        }

    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add card</title>
    <script src="https://kit.fontawesome.com/78f762bd78.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    
</body>
</html>