<?php
include 'includes/card_bootstrap.php';
include 'config/db.php';
session_start();
 if (isset($_POST['submit']))
    {
        $id=$_GET['id'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
                $amount = $quantity * $price;
        

         if($quantity<1){
            // echo "<h1 style='color:red;text-align:center;margin:400px;font-size:500%;'>Please input a valid number</h1> ";
            header('location: medicine.php?result=wrongquantity');
           
        }else{
            if(!empty($quantity))
            {   
              $sql = "INSERT INTO carts (`product_id`,`quantity`,`amount`)VALUES('$id','$quantity','$amount')";
              if ($db->query($sql)){
                                         $msg = "Added to Cart successfully !";
                                     }
              header('location:medicine.php');
        }


            }
        }
?>
<div >
<!-- Make Back Button   -->
<!-- <button 
style=
'color:Black;              
margin-left:50%;
margin-top:-15%;
background-color: #4CAF50;
border: none;
color:white;
text-decoration: none;
cursor: pointer;
font-size:200%;'
><a href="medicine.php">Back</a></button> -->
<div class="d-flex justify-content-center">
<a href="medicine.php" class="btn btn-primary">Back</a>
</div>


</div>
<!-- Finish Back Button  -->
<div class="modal" id="closedBidModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title">Proceed Checkout</h3>
                                        <button type="button" class="close" data-dismiss="modal" arial-label="Close"><span aria-hidden="true">&times;</span>   
                                        </button>
                                        
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="customer_login.php">
                                            <input type="email" name="email" class="form-control" placeholder="Email.......">
                                            <input type="password" placeholder="password" name="password" class="form-control">
                                    </div>
                                    <div class="modal-footer">
                                         <button type="button" style="width: 73px;" class="btn btn-secondary"data-dismiss="modal">Close</button>
                                            <input type="submit" name="login" class="pull-right btn btn-primary" >
                                        </form>

                                       
                                    </div>
                                </div>
                            </div>
                        </div>