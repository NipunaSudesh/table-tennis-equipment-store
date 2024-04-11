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
    <script src="https://kit.fontawesome.com/78f762bd78.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">

    
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
                    <thead
                    <th>No<th>
                    <th>Product name<th>
                    <th>Product image<th>
                    <th>Product price<th>
                    <th>Product quantity<th>
                    <th>total price<th>
                    <th>action<th>
                    </thead>
                    <tbody>
                    ';
                    $i=1;
                    $grandTotal=0;
                    while($row=mysqli_fetch_assoc($select)){
                        ?>
                        <tr> <?php $i;
                        $i++;
                        ?>
                        </tr>
                        <tr><?php echo$row['product name']; ?></tr>
                        <tr> <img src="uploaded_img/<?php echo $row['product image']; ?>"</tr>
                        <tr><?php echo $row['product price'] ?></tr>
                        
                        <from action="" method="post">
                        <input type="hidden" value="<?php echo $row['productId'];?> "  name="update_quantity" >
                        <input type="submit" value="update" name="update_pdt_qty">
                    </div>
                    </from>
                    <td><?php echo $subtotal= $row['Product price']*$row['Product Quantity']?></td>
                    
                        
                    
                    }
                }
                
            </table>
        </div>
    </section>
</body>
</html>