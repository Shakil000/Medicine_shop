<?php
    include '../config/db.php';

    if (isset($_GET['del'])){
        $id = $_GET['del'];

        $sql = "DELETE FROM users WHERE id = '$id'";

        if ($db->query($sql)){
            header('Location:list.php');
        }
    }
?>