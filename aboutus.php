<?php
    session_start();
    include 'config/db.php';
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
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->


    <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
<!--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>-->
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
    <h2 class="g">Our Image Gellery</h2>
    <!-- <p class="paragraph">
  The American Association of Colleges of Pharmacy recommends that consumers choose a pharmacy at which they can have a consulting relationship with the pharmacist.Anyone using drugs benefits when they have easier access to a pharmacist. Being timely includes both processing the request quickly and having drug stock available to fill the prescription. Some consumers need drugs delivered to their home, perhaps by mail, and may select a pharmacy which offers that service. Different pharmacies may charge different prices for the same drugs, so shopping for lower prices may identify a pharmacy offering better value. In addition to fulfilling prescriptions, a pharmacy might offer preventive healthcare services like vaccinations. Up-to-date technology at a pharmacy can assist a patient with prescription reminders and alerts about potential negative drug interactions, thereby reducing medical errors.
  </p> -->
    <section>
<style>
    .paragraph{
        margin: 10px;
    }
.g{
    text-align: center;
    color: red;
    padding: 35px;
    }
div.gallery {
  margin: 50px;
  border: 1px solid #ccc;
  float: left;
  width: 370px;
  align-items: center;
  padding:15px;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.desc {
  padding: 15px;
  text-align: center;
  font-size: 30px;
  color: green;
}
</style>

<div class="gallery">
    <img src="images/1.jpg" alt="" width="400" height="400">

  <div class="desc">Online Medicine Shop</div>
  <p>
  The American Association of Colleges of Pharmacy recommends that consumers choose a pharmacy at which they can have a consulting relationship with the pharmacist.Anyone using drugs benefits when they have easier access to a pharmacist. Being timely includes both processing the request quickly and having drug stock available to fill the prescription.
  </p>
</div>

<div class="gallery">

    <img src="images/2.jpg" alt="" width="400" height="400">

  <div class="desc">Online Medicine Shop</div>
  <p>
  The American Association of Colleges of Pharmacy recommends that consumers choose a pharmacy at which they can have a consulting relationship with the pharmacist.Anyone using drugs benefits when they have easier access to a pharmacist. Being timely includes both processing the request quickly and having drug stock available to fill the prescription.
  </p>
</div>

<div class="gallery">

    <img src="images/3.jpg" alt="" width="600" height="400">

  <div class="desc">Online Medicine Shop</div>
  <p>
  The American Association of Colleges of Pharmacy recommends that consumers choose a pharmacy at which they can have a consulting relationship with the pharmacist.Anyone using drugs benefits when they have easier access to a pharmacist. Being timely includes both processing the request quickly and having drug stock available to fill the prescription.
  </p>
</div>

<div class="gallery">

    <img src="images/4.jpg" alt="" width="600" height="400">

  <div class="desc">Online Medicine Shop</div>
  <p>
  The American Association of Colleges of Pharmacy recommends that consumers choose a pharmacy at which they can have a consulting relationship with the pharmacist.Anyone using drugs benefits when they have easier access to a pharmacist. Being timely includes both processing the request quickly and having drug stock available to fill the prescription.
  </p>
</div>

</body>
</html> 

    </section>

    <?php include 'includes/footer.php';?>