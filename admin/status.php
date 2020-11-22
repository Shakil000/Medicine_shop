<?php
    include '../config/db.php';

    if (isset($_GET['edit'])){
        $id = $_GET['edit'];

        $sql = "UPDATE users SET `status`= 1 WHERE id = '$id'";

        if ($db->query($sql)){
            header('Location:list.php');
        }
    }
?>