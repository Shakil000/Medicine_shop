<?php
$page_header = "Order Details";
include 'includes/header.php';
include '../config/db.php';
    $branch = $_SESSION['user']['id'];
        $sql = mysqli_query($db,"SELECT orders.id as order_number,orders.amount as amount,orders.address as address,  branch.id as branch,branch.location, customers.id as customer,customers.name,customers.number,delivery.id as deliver,delivery.person_name,orders.delivery_id,orders.branch_id FROM orders join customers on customers.id = orders.customer_id join branch on branch.id = orders.branch_id join delivery on orders.delivery_id = delivery.id  ");

?>
    <div class="box box-success">
        <div class="box-body">
            <form action="bid_search.php" method="get">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>From Date</label>
                            <input class="form-control datepicker" name="from_date" type="date" autocomplete="off" placeholder="From Date">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>To Date</label>
                            <input class="form-control datepicker" type="date" autocomplete="off" name="to_date" placeholder="To Date">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <br>
                            <button type="submit" name="bid_search" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

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
                                <th>Customer Phone</th>
                                <th>Address</th>
                                <th>Amount</th>
                                <th>Branch</th>
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
                                    <td><?php echo $row['number'] ?></td>
                                    <td><?php echo $row['address'] ?></td>
                                    <td><?php echo $row['amount'] ?></td>
                                    <td><?php echo $row['location'] ?></td>
                                    <td><?php echo $row['person_name'] ?></td>
                                    <td><h4 id="clock"></h4></td>
                                   
                                            
                                </tr>
                                
                        <?php } ?>
                        </tbody></table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>

    </div>

<?php include 'includes/footer.php'?>
