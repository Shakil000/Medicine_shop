<?php
    include '../config/db.php';

    if (isset($_GET['del'])){
        $id = $_GET['del'];

        $sql = "DELETE FROM branch WHERE id = '$id'";
        var_dump($sql);
        exit();

        if ($db->query($sql)){
            header('Location:branch-list.php');
        }
    }
?>

