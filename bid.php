<?php
    session_start();
    date_default_timezone_set('Asia/Dhaka');
    include 'config/db.php';

    $close_update = "UPDATE products SET status='2' WHERE ending_time < NOW() AND status != '2'";
    $db->query($close_update);
    $start_update = "UPDATE products SET status='1' WHERE starting_time < NOW() AND status = '0'";
    $db->query($start_update);

    if (!isset($_SESSION['customer'])){
        header('Location:login.php');
    }
    $user_id = $_SESSION['customer']['id'];
    


    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM products WHERE `id` = '$id'";
        $data = $db->query($sql)->fetch_assoc();
        if ($data == false){
            die('404');
        }
    }

    $product_id = $data['id'];
    $sql = "SELECT * FROM bids WHERE `product_id` = '$product_id' ORDER BY `id` DESC";
    $last_bid = $db->query($sql)->fetch_assoc();
    $last_bid_customer_id = $last_bid['customer_id'];

    $sql = "SELECT * FROM `customers` WHERE id = '$last_bid_customer_id'";
    $last_customer = $db->query($sql)->fetch_assoc();


    if (isset($_POST['bid'])) {
        $bid_price = $_POST['price'];
        $product_id = $_POST['product_id'];
        $customer_id = $_SESSION['customer']['id'];
//         var_dump( $bid_price, ' ', $last_bid['price']);
// die();
        if($data['ending_time'] > date('Y-m-d h:i:s')) {
            if ($last_bid['price'] < $bid_price && $data['starting_price'] < $bid_price) {
                $sql = "INSERT INTO bids (`customer_id`, `product_id`, `price`) VALUES ('$customer_id', '$product_id', '$bid_price')";
                if ($db->query($sql)) {
                    $_SESSION['message'] = "Your bid has been submitted";
                    $_SESSION['expire'] = time();
                    header('Location:bid.php?id='.$id);
                }
            }else{
                $_SESSION['expire'] = time();
                $_SESSION['message'] = "your bid Price must be greater than last bidding price!!";
            }

        } else {
            $_SESSION['expire'] = time();
            $_SESSION['message'] = "Bid Closed! You can not bid any more";
        }
        
    }
?>


<!--header part-->
<!DOCTYPE html>
<html>
<head>
    <title>Online Bidding</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/owl.carousel.min.css">

    <link rel="stylesheet" type="text/css" href="includes/header.css">

    <script src="bootstrap/js/jquery-3.4.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/main.js"></script>
    <script src="bootstrap/js/owl.carousel.min.js"></script>
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->


	<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
    <script src="bootstrap/js/3.3.1.slim.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/4.3.1.bootstrap.min.css">

    <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>-->
<!--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>-->
 

</head>
<body>
<section class="header-top-area">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <a href=""><i class="fa fa-envelope"></i>OnlineBidding@gmail.com</a><span class="seperator">|</span>
                <a href=""><i class="fa fa-phone"></i>Feel Free To Contact Us</a><span class="seperator">|</span>
                <a href=""><i class="fa fa-clock-o"></i>24 hours</a>

            </div>
            <div class="col-md-6 text-center">
                <div class="search-box">
                    <form action="">
                        <input type="text" placeholder="Search here">

                        <a href=""><i class="fa fa-search"></i></a>

                    </form>
                </div>
            </div>
        </div>

    </div>
</section>
<section class="mainmenu-area">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="logo">
                    <h2>Online Bidding</h2>
                </div>
            </div>
            <div class="col-md-8">
                <div class="menu">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="gallery.php">Gallery Bidding</a></li>
                        <li><?php
                        if (isset($_SESSION['customer'])){
                            ?>
                            <a href="my-account.php"><?= $_SESSION['customer']['name']  ?></a>
                        <?php }else{
                            ?>
                            <a href="login.php">LogIn</a>
                            <?php


                        }?>
                    </li>
                        <li><a href="register.php">Register</a></li>
                        <li><a href="">About Us</a></li>
                        <!--<li><?php
                        if (isset($_SESSION['customer'])){
                            ?>
                            <a href="my-account.php"><?= $_SESSION['customer']['name']  ?></a>
                        <?php } ?></li>-->
                    </ul>
                    
                </div>

            </div>
        </div>

    </div>
</section>

	<section>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-4">
					<div class="card shadow" style="width: 31rem;margin-top: 75px;">
  						<div class="inner">
  							<img src="admin/<?=  $images = unserialize($data['images'])[0]; ?>" class="card-img-top" alt="...">
  						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card" style="width: 49rem;margin-top: 75px; height: 39rem;font-size: 17px;">
                    <li class="list-group-item">Bidder Name: <?= $last_customer['name']?>
                            
                     </li>
                    <li class="list-group-item">Bidding Price: <?= $last_bid['price']?></li> 
                            <p class="text-danger alert_message">
                                <?php
                                    if (isset($_SESSION['message'])) {
                                        echo $_SESSION['message'];
                                        
                                        if ((time() - $_SESSION['expire']) > 10) {
                                            unset($_SESSION['message']);
                                        }
                                    }
                                ?>
                            </p>

                            <?php 
                                if ($data['status'] == 2) {
                                    $product_id = $data['id'];
                                    $query = "SELECT * from bids where  product_id='$product_id'  ORDER BY `price` DESC LIMIT 1";
                                    $run = $db->query($query);
                                    if($run->num_rows > 0) {

                                        $result = $run->fetch_assoc();
    // echo '<pre>';
    //     print_r($result);
    // echo '</pre>';
                                        if($result['customer_id'] == $user_id) {
                                            echo 'Congrats!! You are Winner!';
                                        } else {
                                            ?>
                                                <button class="btn btn-danger">Closed</button>
                                            <?php
                                        }
                                    }
                                } else  {
                                    ?>
                                    <form method="post" action="">
                                      <div class="card-body" style="padding: 2.25rem;">
                                        <input type="text" id="username" name="price" placeholder="Enter Price" /><br>
                                        <input type="hidden" name="product_id" value="<?= $data['id']?>">
                                        <button type="submit" name="bid" class="btn btn-warning" style="margin-top: 20px;font-size: 17px;width: 180px;padding: 10px;">Bid Now</button>
                                      </div>
                                  </form>
                                    <?php
                                }
                             ?>

						  
						  <ul class="list-group list-group-flush">
						    <li class="list-group-item">Product Name: <?= $data['product_name']?></li>
						    <li class="list-group-item">Starting Price: <?= $data['starting_price']?></li>
						    <!--<li class="list-group-item">Afer started the bid you can bid maximum 100tk at a time</li>
						    <li class="list-group-item">Afer started the bid within 10sec you can't bid!</li>-->
						    
						  </ul>
						  
					</div>
				</div>
			</div>
		</div>
	</section>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('.alert_message').hide(300);
            }, 3000);
        });
    </script>>
</body>
</html>

