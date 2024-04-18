<?php
include_once 'config.php';
include_once 'header.php';
session_start();

if (isset($_POST['update_pdt_qty'])) {  
    $update_value = $_POST['update_quantity'];
    $update_id = $_POST['update_qty_id'];
    $update_qty_query = mysqli_query($conn, "UPDATE addCart SET quantity = $update_value WHERE productID = $update_id");

    if ($update_qty_query) {
        $displayMsg = 'Cart updated Successfully!';
        // header('location:cartview.php');
    }
}
if (isset($_GET['remove'])) {
    $productID = $_GET['remove'];
        $select_products = "SELECT * FROM products WHERE productID  = $productID;";
        $get_product = mysqli_query($conn, $select_products);
        $row = mysqli_fetch_assoc($get_product);
        $quantity = $row['quantity'];

    $removeQuery = mysqli_query($conn, "DELETE FROM addCart WHERE productID = $productID");
    mysqli_query($conn, "UPDATE products SET quantity = $quantity+1 WHERE productID = $productID");
    $displayMsg = 'Product removed from the cart Successfully!';

}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>card</title>
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <section class="cart">
<!-- ......................................................... -->
    <?php
    if (isset($displayMsg)) {
        echo "<div class='error-msg'>
                <span>" . $displayMsg . "</span>
                <i class='fas fa-times' onclick='this.parentElement.style.display=`none`';></i>
            </div>";
    }
    ?>
<!-- ......................................................... -->
        <table>
            <?php
            $total = 0;
            $userID = $_SESSION['user_id'];

            $select_of_product = mysqli_query($conn, "SELECT * FROM addCart where userID ='$userID' ");
            if (mysqli_num_rows($select_of_product) > 0) {
                echo '
                <h1 class="heading">My Cart</h1>
                <thead>
                        <th>No</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Action</th>
                    </thead>
                    <tbody>';
                $i = 1;

                while ($fetch_prdt = mysqli_fetch_assoc($select_of_product)) {
            ?>
                    <tr>
                        <td>
                            <?php echo $i;
                            $i++;
                            ?>
                        </td>
                        <td><?php echo $fetch_prdt['productName']; ?> </td>
                        <td><img class="tableImage" src="product-images/<?php echo $fetch_prdt['image']; ?> "></td>
                        <td><?php echo $fetch_prdt['price']; ?> </td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" value="<?php echo $fetch_prdt['productID']; ?>" name="update_qty_id">
                                <div class="quantity_box">
                                    <input type="number" min="1" value="<?php echo $fetch_prdt['quantity']; ?>" name="update_quantity" class="quantity">
                                    <input type="submit" value="Update" name="update_pdt_qty" class="btn">
                                </div>
                            </form>
                        </td>
                        <td>
                            <?php echo $subtotal = $fetch_prdt['price'] * $fetch_prdt['quantity'] ?>
                        </td>
                        <td>
                            <a href="cartview.php?remove=<?php echo $fetch_prdt['productID']; ?> " onclick="return confirm('Are you sure want to delete this item')" class="cartRemove"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>

                <?php
                    $total = $total + $subtotal;
                }
                ?>

                </tbody>
        </table>

    <?php
                echo '<div class="heading">
        <span>GRAND total :  ' . $total . '</span>
        </div>
        <div class="purchase">
        <a href="checkout.php?total=' . $total . '" class="btn" id="checkout-btn">Checkout</a>
    </div>';
            } else {
                echo '<h1 class="heading">Cart is Empty</h1>';
            }
    ?>


    </section>
</body>

</html>