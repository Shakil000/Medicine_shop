<?php
    include '../config/db.php';

    if (isset($_GET['del'])){
        $id = $_GET['del'];

        $sql = "DELETE FROM delivery WHERE id = '$id'";

        if ($db->query($sql)){
            header('Location:delivery-person-list.php');
        }
    }
?>

