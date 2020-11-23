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


    <!--//*** Header Part**//-->


    <!--//*** Header Part**//-->
    <div class="section-header text-center">
      <h1 style="font-size: 70px">Find Your Medicine </h><h2>From Here</h2>
    </div>
                       


                           <?php
                        if (isset($_GET['result'])) {
                            if ($_GET['result'] == 'wrongquantity') {
                                echo '<h1 style="color:red;text-align:center;">Please Input Valid Number</h1>';
                            }
                            
                        }
                        ?>
   <div class="container selected">
        <div class="row">
            <?php
                $sql = "SELECT * FROM products ORDER BY `id` DESC";
                $row = $db->query($sql);

                while ($data= $row->fetch_assoc()){
            ?>

            <div class="col-md-3">
                <!--bootstrap card-->
                <div class="card" style="width: 25rem;">
                    <a href="stockshow.php?id=<?= $data['id']?>"><img src="admin/<?= unserialize($data['images'])[0]?>" class="card-img-top" alt="..."></a>
                    <div class="card-body text-center">
                        <h5 class="card-title">Name:<?= $data['medicine_name']?></h5>
                        <p class="card-text">Group: <?= $data['group']?></p>
                        <p class="card-text">Company: <?= $data['company']?></p>
                        <p class="card-text">Price:<b>&#2547;</b> <?= $data['price']?></p>
                        <p class="card-text">Expair Date: <?= $data['exp_date']?></p>
                        <form style="display: inline;" method="post" action="carts.php?id=<?= $data['id']?>">
                            <input type="number" name="quantity" style="padding: 5px;width: 60%;font-size: 15px" placeholder="quantity" required><br>
                            <input type="hidden" name="price" value="<?= $data['price']?>">
                            <input type="submit" class="btn btn-danger btn-sm" style="margin-top: 20px" name="submit" value="Add to Cart">
                        </form> 
                        
                        
                    </div>
                </div>
            </div>
            <?php  } ?>
        </div>
    </div>
<?php include 'includes/footer.php';?>

</body>
</html>


