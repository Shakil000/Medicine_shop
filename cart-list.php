<?php
include 'includes/card_bootstrap.php';
include 'config/db.php';

session_start();
    $sql = "SELECT carts.id, carts.customer_id,carts.product_id,products.id as product_id,carts.quantity ,carts.amount,products.images,products.medicine_name,products.price FROM carts LEFT JOIN products ON carts.product_id=products.id ";
    $row = $db->query($sql);

    $result = mysqli_query($db,'SELECT SUM(amount) AS amounts FROM carts where customer_id IS NULL '); 
    $summation = mysqli_fetch_assoc($result); 
    $_SESSION['price']=$summation['amounts'];
?>

    <div class="row" >
        
            <div class="box col-md-12">
                <div class="box-header">
                    <h3 class="box-title">Carts</h3>
                    <a href="medicine.php" class="btn btn-primary" style="margin-bottom: 10px">Back to Shopping</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body ">
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                            <th style="text-align: center;">#</th>
                            <th style="text-align: center;">Image</th>
                            <th style="text-align: center;">Medicine Name</th>
                            <th style="text-align: center;">Unit Price</th>
                            <th style="text-align: center;">Quantity</th>
                            
                            <th style="text-align: center;">Amount</th>
                    
                            <th style="text-align: center; ">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i=0;
                            while ($data = $row->fetch_assoc()){
                                $i++
                        ?>
                             <tr>
                           <td style="text-align: center;"><?= $i ?></td>
                           <td style="text-align: center;"><img src="admin/<?= unserialize($data['images'])[0]?>" height="50" width="50"></td>
                            <td style="text-align: center;"><?= $data['medicine_name'] ?></td>
                            <td style="text-align: center;"><?= $data['price'] ?></td>
                            <td style="text-align: center;"><?= $data['quantity'] ?></td>
                            
                            <td style="text-align: center;"><?= $data['amount'] ?></td>
                            <td style="text-align: center ;">
                                <a href="cart-delete.php?id=<?php echo $data['id'];?>" class="btn btn-danger btn-sm" onclick = "return confirm('Are you sure you want to remove this item')">Delete</a>
                                <a href="#" data-toggle="modal" data-target="#edit"  class="btn btn-warning btn-sm">Edit</a>
                                
                            </td>

                        </tr>
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="cart-edit.php?id=<?php echo $data['id'];?>"> 
            <input type="number" name="quantity" value="<?php echo $data['quantity']; ?>" placeholder="Quantity">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit"  name="update" class="btn btn-primary">
        </form>

      </div>
    </div>
  </div>
</div> 
                        <?php } ?>
                        <tr class="bg-grey">
                            <td>Total</td>
                            <td></td><td></td><td></td><td></td>
                            <td><?= $summation['amounts'] ?></td>
                        </tr>
                        </tbody></table>

               
                <!-- /.box-body -->
                 <!-- /.box-body -->
            
            </div>
        </div>

    </div>
 <?php if(empty($_SESSION['customer'])){?>
                        <a href="#" data-target="#login" data-toggle="modal" class="btn btn-success">Login Too CHeckout</a>
                    <?php } else{?>
                        <a href="payment.php" class="btn btn-success">CHeckout</a>
                    <?php } ?>

<?php include 'includes/footer.php'?>
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="customer_login.php">
            <input type="email" name="email" placeholder="EMail" style="padding: 5px;width: 60%">
            <input type="password" placeholder="password" name="password" style="padding: 5px;width: 60%;margin-top: 15px">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="login" class="btn btn-primary">
        </form>

      </div>
    </div>
  </div>
</div>