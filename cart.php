<?php
include 'includes/card_bootstrap.php';
include 'config/db.php';
session_start();
 if (isset($_POST['submit']))
    {
        $id= $_POST['id'];
        $prescription=mysqli_query($db,"select * from prescription where id='$id'");
        $row=mysqli_fetch_assoc($prescription);
        $customer = $row['customer_id'];

        $quantity = $_POST['quantity'];

        $name=$_POST['name'];
        $result=mysqli_query($db,"select * from products where id='$name'");
        $row=mysqli_fetch_assoc($result);
        $quantity = $_POST['quantity'];
        $price = $row['price'];
                 $amount = $quantity * $price;
            
                 if($quantity<1){
                    echo "Please input a valid number";
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