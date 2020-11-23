<?php
    include 'config/db.php';


        //getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$result = mysqli_query($db, "DELETE FROM cart-list WHERE customer_id=$product_id");
//redirecting to the display page (index.php in our case)
header("Location:cart-list.php");
?>