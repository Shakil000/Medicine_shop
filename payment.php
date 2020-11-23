<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="./css/form-validation.css" rel="stylesheet">
    
    <title>Checkout</title>
  </head>
  <body class="bg-light">


<?php
              session_start();
  include 'config/db.php';
    $sql2= "SELECT * FROM branch";
    $rows2 = $db->query($sql2);

    if (isset($_POST['submit'])) {
           $branch=$_POST['branch_id'];
           $amount=$_POST['amount'];
          $address = $_POST['address'];
           $paymentmethod=$_POST['paymentmethod'];

           $card_name=$_POST['card_name'];
           $card_number=$_POST['card_number'];
           $expiration=$_POST['expiration'];
           $cvv=$_POST['cvv'];
           $customer =$_SESSION['customer']['id'];
          
                $sql = "INSERT INTO orders ( `amount`, `address`,`card_name`,`card_number`,`expiration`,`cvv`,`paymentmethod`, `branch_id`,`customer_id`,`order_date`)VALUES('$amount', '$address', '$card_name', '$card_number', '$expiration','$cvv','$paymentmethod','$branch','$customer',now())";
                $count = $db->query($sql);
            $cart = mysqli_query($db,"UPDATE carts SET `customer_id` = '$customer' WHERE `customer_id` is null");
                header('location:index.php');

    }
    
?>

    <div class="container">
      <div class="py-5 text-center">
       <h1>Payment</h1>
  <a href="cart-list.php" class="btn btn-success">Back To Cart</a>

      </div>

      <div class="row">
        


        <div class="col-md-12 order-md-1">
          <h4 class="mb-3">Billing address</h4>
          <form  class="needs-validation" method="post" action="">
               <div class="mb-3">
              <label for="branch">Branch <span class="text-muted"></span></label>
              <select name="branch_id" class="form-control">
                                <option value="" selected>Please select one</option>
                                <?php
                                    while ($data = $rows2->fetch_assoc()){
                                ?>
                                    <option value="<?= $data['id']?>"><?= $data['location']?></option>
                                <?php } ?>
                            </select>
          
            </div>

             
             

            <div class="mb-3">
              <label for="amount">Amount</label>
              <input type="number" class="form-control" name="amount" value="<?php echo $_SESSION['price']?>" readonly>
              <div class="invalid-feedback">
              </div>
            </div>

               <div class="mb-3">
              <label for="address">Address</label>
              <input type="text" class="form-control" name="address" id="address" placeholder="1234 Main St" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>


          


            <h4 class="mb-3">Payment Type</h4>

            <div class="d-block my-3">
              <input type="radio" name="paymentmethod" value="credit" onclick="show1();">Credit Card
              <input type="radio" name="paymentmethod" value="debit" onclick="show2();">Payment on Dleivery
             </div>


            <hr class="mb-4">
            <div id="card_details" style="display: none">
            <h4 class="mb-3" >Card Details</h4>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="cc-name">Name on card</label>
                <input type="text" class="form-control" name="card_name" id="cc-name" placeholder="" >
                <small class="text-muted">Full name as displayed on card</small>
                <div class="invalid-feedback">
                  Name on card is required
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cc-number">Credit card number</label>
                <input type="text" class="form-control" name="card_number" id="cc-number" placeholder=""  id="card_number">
                <div class="invalid-feedback">
                  Credit card number is required
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">Expiration</label>
                <input type="date" class="form-control" name="expiration" id="expiry" placeholder="" >
                <div class="invalid-feedback">
                  Expiration date required
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">CVV</label>
                <input type="text" class="form-control" name="cvv" id="cvv" placeholder="" >
                <div class="invalid-feedback">
                  Security code required
                </div>
              </div>
            </div>
          </div>
            <hr class="mb-4">
            <input type="submit" name="submit">
            <!-- *********************************Work From Here************************************************************* -->



















            
          </form>
        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        
      </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.4/holder.min.js" integrity="sha256-ifihHN6L/pNU1ZQikrAb7CnyMBvisKG3SUAab0F3kVU=" crossorigin="anonymous"></script>
<script type="text/javascript">
      function show1(){
  document.getElementById('card_details').style.display ='block';
}
  function show2(){
  document.getElementById('card_details').style.display ='none';
}
    </script>
  </body>
</html>