<?php
@include 'config.php';
@include 'header.php';
if(isset($_GET['productID'])){
    $productID=$_GET['productID'];

    $select_product=mysqli_query($conn,"SELECT * FROM products WHERE productID='$productID'");
    if(mysqli_num_rows($select_product)>0){
        $row= mysqli_fetch_assoc($select_product);

    $productName = $row['productName'];
    $productImage = $row['image'];
    $productPrice = $row['price'];

    $insertQuery = "INSERT INTO addcard (productName, Image, Price,Quantity) VALUES ('$productName', '$productImage', '$productPrice',1)";
    if (mysqli_query($conn, $insertQuery)) {
        echo "Product added to card successfully.";
    } else {
        echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
    }
}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card</title>
    <script src="https://kit.fontawesome.com/78f762bd78.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style2.css">

    
</head>
<body>
    <section>
        <div class="card">
            <h1 class="heading">My card</h1>
            <table>
                <?php
                $select=mysqli_query($conn,"SELECT * FROM addcard");
                if(mysqli_num_rows($select)>0){
                    echo '
                    <thead>
                    <tr>
                    <th>No</th>
                    <th>Product name</th>
                    <th>Product image</th>
                    <th>Product price</th>
                    <th>Product quantity</th>
                    <th>Total price</th>
                    <th colspan="2" >Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    ';
                    $i=1;
                    $grandTotal=0;
                    while($row=mysqli_fetch_assoc($select)){
                        ?>
                        <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['ProductName']; ?></td>
                        <td><img src="uploaded_img/<?php echo $row['Image']; ?>"</td>
                        <td><?php echo $row['Price']; ?></td>
                        <td><?php echo $row['Quantity']; ?></td>
                        <td><?php echo $subtotal= $row['Price'] * $row['Quantity']; ?></td>
                        <td>
                            <form action="" method="post" class="btn-list">
                                <!-- <input type="hidden" value="<?php echo $row['productId']; ?>" name="update_quantity"> -->
                                <input type="submit" value="Update" name="update_pdt_qty" class="btn">
                                <input type="submit" value="Remove" name="Remove_pdt_qty" class="delete-btn">
                            </form>
                        </td>
                        </tr>
                        <?php
                        $i++;
                        $grandTotal += $subtotal;
                    }
                }
                ?>

                </tbody>
            </table>
        </div>
    </section>
</body>
</html>
