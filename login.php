
<?php 
session_start();

if (isset($_SESSION['customer'])) {
  header('location:upload-prescription.php');
} ?>
<?php
    
    include 'config/db.php';
    if (isset($_POST['login'])){
         $email = $_POST['email'];
         $password = $_POST['password'];

        if (!empty($email) && !empty($password)){
            $sql = "SELECT * FROM customers WHERE `email` = '$email' AND `password`= '$password' AND `status` = 1";
            $data = $db->query($sql);
            if ($data->num_rows > 0 ){
                $_SESSION['customer'] = $data->fetch_assoc();
                header('Location:index.php');
            }else{
                $message = "Email or Passwor Invalid";
            }
        }
        else{
            $message = "Email or Password can not be empty";
        }

    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home page</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/4.3.1.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/owl.carousel.min.css">

	<link rel="stylesheet" type="text/css" href="includes/home.css">
    <link href="img/favicon.ico" rel="shortcut icon"/>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">


    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/font-awesome.min.css"/>
    <link rel="stylesheet" href="css/flaticon.css"/>
    <link rel="stylesheet" href="css/slicknav.min.css"/>
    <link rel="stylesheet" href="css/jquery-ui.min.css"/>
    <link rel="stylesheet" href="css/owl.carousel.min.css"/>
    <link rel="stylesheet" href="css/animate.css"/>
    <link rel="stylesheet" href="css/style.css"/>
<link rel="stylesheet" type="text/css" href="includes/log.css">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="includes/style.css">
    <script src="bootstrap/js/3.3.1.slim.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>

	<script src="bootstrap/js/jquery-3.4.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="bootstrap/js/main.js"></script>
	<script src="bootstrap/js/owl.carousel.min.js"></script>


</head>
<body>
<section>
    <header class="header-section">
        <div class="header-top">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <!-- logo -->
                        <a href="index.php" class="site-logo">
                            <div class="logo">
                        <div class="logo"> <a href="index.php"><img src="images/logo.png" alt="image"/></a> </div>
                    </div>
                        </a>
                    </div>

                    <div class="col-md-4">
                            <form class="header-search-form" action="search.php" method="get">
                            <input type="text" name="search_word" placeholder="Search for medicine ....">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>

                    <div class="col-md-5">
                        <div class="user-panel">
                            <div class="up-item">
                                <div class="shopping-card">
                                    <i class="fa fa-shopping-cart"></i>
                                    
                                </div>
                                <a href="cart-list.php">Shopping Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    </section>
    <section class="mainmenu-area">
		<div class="">
			<div class="row">
				<div class="col-md-12">
					<div class="menu">
						<ul class="d-flex justify-content-center">
							<li><a href="index.php">Home</a></li>
                            <li><a href="medicine.php">Medicine</a></li>
                            <li><a href="aboutus.php">About Us</a></li>
							<li><a href="login.php">Upload Prescription</a></li>
                            <li>
                            <a href="my-account.php"> <?php if(isset($_SESSION['customer'])){
                                ?>
                                <?php
                                 echo $_SESSION['customer']['name'];?></a>
                                <?php  
                            }else{
                                ?>
                                <a href="login.php">Sign in</a></a>
                            <?php }?></li>
				
						</ul>
					</div>
					
				</div>
			</div>
			
		</div>
	</section>



    <!--//*** Header Part**//-->





      <div class="main">
         <div class="col-md-12">
            <div id='frame'>
               <div class='search'><h1>Sign In Here</h1>
                   <p style="color: red; margin-left: 15px">

                   <?php
                   if (isset($message)){
                       echo $message;
                   }
                   ?>
                   </p>
                  <form method="POST" action="">
                     <div class="content">
                       <input type="text" class="box" id="username" name="email" placeholder="Enter Email"/>
                       <input type="password" class="box" id="password" name="password" placeholder="Enter Password"/> 
                       <input type="submit" name="login" value="Login">
                       <a href="register.php">Don't have account?</a>
                      </div>
                  </form>
               </div>
            </div>  
                                
         </div> 
      </div>
 
