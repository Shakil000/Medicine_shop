<?php
    session_start();
    
include 'config/db.php';
    if (isset($_POST['login'])){
         $email = $_POST['email'];
         $password = $_POST['password'];

        if (!empty($email) && !empty($password)){
            $sql = "SELECT * FROM customers WHERE `email` = '$email' AND `password`= '$password' AND `status` = 1";
            $data = $db->query($sql);
            if ($data->num_rows > 0 ){
                $_SESSION['customer'] = $data->fetch_assoc();
                header('Location:payment.php');
            }else{
                $message = "Email or Passwor Invalid";
            }
        }else{
            $message = "Email or Password can not be empty";
        }

    }
?>