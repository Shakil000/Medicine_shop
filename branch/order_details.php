<?php
$page_header = "";
include 'includes/header.php';
include '../config/db.php';
    $branch = $_SESSION['user']['id'];
        $sql = mysqli_query($db,"SELECT orders.*, branch.id as branch, customers.id as customer,customers.name  FROM orders join customers on customers.id = orders.customer_id join branch on branch.id = orders.branch_id where branch.id = '$branch' ");

        $delivery = "SELECT * FROM delivery where branch_id = '$branch' ";
    $rows = $db->query($delivery);


?>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Order Details</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="bidDetailsTable" class="table table-condensed">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Customer Name</th>
                                <th>Order Id</th>
                                <th>Payment</th>
                                <th>CountDown</th>
                                <th>Details</th>
                                <th>Delivery Person</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 1;
                            while($row=mysqli_fetch_array ($sql)){
                            ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['id'] ?></td>
                                    <td><?php echo $row['amount'] ?></td>
                                    <td><p><h6 id="clock"></h6></p></td>
                                    <td><a href="cart-invoice.php?id=<?php echo $row['customer']?>" class="btn btn-primary">Cart Details</a><?php 
                                        $_SESSION['customer'] = $row['name'];
                                        $_SESSION['order'] = $row['id'];
                                    ?></td>
                                    <td>
                                        <?php if (!$row['delivery_id']) { ?>
                                            <a href="#" data-toggle="modal" data-target='#delivery-persons' class="btn btn-primary">Select Delivery Person</a>
                                        <?php } else { 
                                 // $id = $row['delivery_id'];
                                 //                $sql = mysqli_query($db,"SELECT * from delivery where id = '$id' ");
                                 //                $deliver = mysqli_fetch_assoc($sql);
                                 //                echo $deliver['person_name'];
                                            echo "Delivered";
                                        }?></td>
                                            
                                </tr>
                                <div class="modal" id="delivery-persons">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title">Delivery Persons</h3>
                                        <button type="button" class="close" data-dismiss="modal" arial-label="Close"><span aria-hidden="true">&times;</span>   
                                        </button>
                                        
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="../place-order.php?id=<?php echo $_SESSION['order']?>">
                                          <select name="delivery_id" class="form-control">
                                <option value="" selected>Please select one</option>
                                <?php
                                    while ($data = $rows->fetch_assoc()){
                                ?>
                                    <option value="<?= $data['id']?>"><?= $data['person_name']?></option>
                                <?php } ?>
                                          
                            </select>
                                    </div>
                                    <div class="modal-footer">
                                         <button type="button" style="width: 73px;" class="btn btn-secondary"data-dismiss="modal">Close</button>
                                            <input type="submit" name="update" class="pull-right btn btn-primary" >
                                        </form>

                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        </tbody></table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>

    </div>

<?php include 'includes/footer.php'?>
