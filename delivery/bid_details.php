<?php
$page_header = "Order Details";
include 'includes/header.php';
include '../config/db.php';
    $delivery = $_SESSION['user']['id'];
        $sql = mysqli_query($db,"SELECT orders.*,customers.name, customers.id as id,customers.number from orders left join customers on orders.customer_id = customers.id where orders.delivery_id = '$delivery' ");

?>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-danger">
                <div class="box-heade">
                    <h3 class="box-title">Order Details</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="bidDetailsTable" class="table table-condensed">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Customer Name</th>
                                <th>Address</th>
                                <th>Phone</th>
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
                                    <td><?php echo $row['address'] ?></td>
                                    <td><?php echo $row['number'] ?></td>
                                    
                                
                                    
                                            
                                </tr>
   <?php } ?>

                            </tbody>
                        </table>
<?php include 'includes/footer.php'?>
