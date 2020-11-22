<?php
session_start();
$page_header = "Hospital Information Updation ";
    include 'config/db.php';
    include 'includes/header.php';

        $id =  $_POST['delivery_id'];
        $order =  $_SESSION['order'];
        
    if (isset($_POST['update'])){
        if ( !empty($id)){
            $sql = "UPDATE orders SET `delivery_id` = '$id' WHERE `id` = '$order'";

            if($db->query($sql)){
                header('location:branch/index.php');
              }
          }
    }
?>
