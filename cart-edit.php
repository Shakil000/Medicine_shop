<?php
$page_header = "Hospital Information Updation ";
    include 'config/db.php';
    include 'includes/header.php';

        $id =  $_GET['id'];

        $cart = mysqli_query($db,"SELECT * FROM carts WHERE id = '$id' ");
        $row=mysqli_fetch_assoc($cart);
        $product_id=$row['product_id'];
        $price = mysqli_query($db,"SELECT * FROM products WHERE id = '$product_id' ");
        $result=mysqli_fetch_assoc($price);
        $amount=$result['price'];

    if (isset($_POST['update'])){
        $quantity = $_POST['quantity'];
       $amounts = $quantity*$amount;
        if ( !empty($quantity)){


            $sql = "UPDATE carts SET `quantity` = '$quantity',`amount` = '$amounts' WHERE `id` = '$id'";

            if($db->query($sql)){
                header('location:cart-list.php');
              }
          }
    }
?>
