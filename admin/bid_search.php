<?php
$page_header = "Search Details";
include 'includes/header.php';

    if (isset($_GET['from_date'])) {
        $from_date = $_GET['from_date'];
        $to_date = $_GET['to_date'];

        $category = 1;

        $from_date = date('Y-m-d', strtotime($from_date));
        $to_date = date('Y-m-d', strtotime($to_date));

    }

    $sql = "SELECT * from orders WHERE order_date >= '$from_date' AND order_date <= '$to_date' ";
    
    $row = $db->query($sql);

    

?>
    <div class="box box-success">
        <div class="box-body">
            <form action="bid_search.php" method="get">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>From Date</label>
                            <input class="form-control datepicker" name="from_date" type="text" placeholder="From Date" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>To Date</label>
                            <input class="form-control datepicker" type="text"  name="to_date" placeholder="To Date" autocomplete="off">
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
                    <h3 class="box-title">Bid Details</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="bidDetailsTable" class="table table-condensed">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Branch</th>
                                <th>Customer</th>
                                <th>Amount</th>
                                <th>Address</th>
                                <th>Order Date</th>
                                <th>Delivery Person</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        if($row->num_rows > 0) {
                        $i = 1;
                            while ($data = $row->fetch_assoc()){
                                $branch_id=$data['branch_id'];
                                $customer_id=$data['customer_id'];
                                $delivery_id=$data['delivery_id'];
                                $branch = mysqli_query($db,"SELECT * from branch where id = '$branch_id' ");
                                $branch_name = mysqli_fetch_assoc($branch);
                                $customer = mysqli_query($db,"SELECT * from customers where id = '$customer_id' ");
                                $customer_name = mysqli_fetch_assoc($customer);
                                $delivery = mysqli_query($db,"SELECT * from delivery where id = '$delivery_id' ");
                                $delivery_name = mysqli_fetch_assoc($delivery);

                            ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $branch_name['location'] ?></td>
                                    <td><?php echo $customer_name['name'] ?></td>
                                    <td><?php echo $data['amount'] ?></td>
                                    <td><?php echo $data['address'] ?></td>
                                    <td><?php echo $data['order_date'] ?></td>
                                    <td><?php echo $delivery_name['person_name'] ?></td>
                                </tr>
                            <?php
                        ?>
                            
                        <?php } 
                    } ?>
                        </tbody></table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>

    </div>

<?php include 'includes/footer.php'?>
