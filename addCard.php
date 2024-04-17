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
        mysqli_query($conn, "UPDATE products SET quantity = $quantity-1 WHERE productID = $productID");
        $displayMsg = 'Added To Cart Successfully!';
        header('location:index.php?msg='.$displayMsg.'');
        // added to cart successfully
    }else{
        $displayMsg = 'Please login to the system!';
        header('location:login.php?msg='.$displayMsg.'');
        }

    }
}

    if (isset($_GET['WishproductID'])) {
        $productID = $_GET['product_id'];
        $select_products = "SELECT * FROM products WHERE productID  = $productID;";
        $get_product = mysqli_query($conn, $select_products);
        $row = mysqli_fetch_assoc($get_product);
        $productName = $row['productName'];
        $image = $row['image'];
        $price = $row['price'];
        $userID = $_SESSION['userID'];
    
    
        $sqlcheckCart = "SELECT * FROM addCart WHERE productID = $productID";
        $checkcart = mysqli_query($conn, $sqlcheckCart);
        if (mysqli_num_rows($checkcart) == 0) {
            $sqlAdcart = "INSERT INTO addCart (productID,userID,productName,image,price) VALUES ('$productID','$userID','$productName','$image','$price')";
            $addCart = mysqli_query($conn, $sqlAdcart);
            mysqli_query($conn, "DELETE FROM wishlist WHERE productID = $productID");
            $displayMsg = 'Product removed from the whishlist.?msg='.$displayMsg.'';
        } elseif (mysqli_num_rows($checkcart) > 0) {
            $rowQty = mysqli_fetch_assoc($checkcart);
            $pQty = $rowQty['quantity'];
            $pQty++;
            $updateCart = mysqli_query($conn, "UPDATE addCart SET quantity = $pQty WHERE productID = $productID");
            mysqli_query($conn, "DELETE FROM wishlist WHERE productID = $productID");
            $displayMsg = 'Added To Cart Successfully!';
    
        }
        header('location:wishlistview.php?msg='.$displayMsg.'');
      }

      if (isset($_GET['allProductID'])) {

        if (isset($_SESSION['userID'])) {
            $userID = $_SESSION['userID'];
    
            $productID = $_GET['allProductID'];
            $select_products = "SELECT * FROM products WHERE productID  = $productID;";
            $get_product = mysqli_query($conn, $select_products);
            $row = mysqli_fetch_assoc($get_product);
            $productName = $row['productName'];
            $image = $row['image'];
            $price = $row['price'];
            $quantity = $row['quantity'];
            $category = $row['category'];
    
    
            $sqlcheckCart = "SELECT * FROM addCard WHERE productID = $productID and userID = $userID";
            $checkcart = mysqli_query($conn, $sqlcheckCart);
            if (mysqli_num_rows($checkcart) == 0) {
                $sqlAdcart = "INSERT INTO addCard (productID,userID,productName,image,price) VALUES ('$productID','$userID','$productName','$image','$price')";
                $addCart = mysqli_query($conn, $sqlAdcart);
            } else {
                $rowQty = mysqli_fetch_assoc($checkcart);
                $pQty = $rowQty['quantity'];
                $pQty++;
                $updateCart = mysqli_query($conn, "UPDATE addCard SET quantity = $pQty WHERE productID = $productID");
            }
            mysqli_query($conn, "UPDATE products SET quantity = $quantity-1 WHERE productID = $productID");
            $displayMsg = 'Added To Cart Successfully!';
    
            header("location:allProducts.php?msg=".$displayMsg."");
        } else {
    
            $displayMsg = 'Please loging the system!';
            header("location:loginForm.php?msg=".$displayMsg."");
        }
    }

    
    ?>

