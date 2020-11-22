<?php
    include '../config/db.php';

    if (isset($_GET['del'])){
        $id = $_GET['del'];

        $sql = "DELETE FROM hospital WHERE id = '$id'";

        if ($db->query($sql)){
            header('Location:hospital-list.php');
        }
    }
?>

