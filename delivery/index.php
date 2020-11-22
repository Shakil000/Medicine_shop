<?php
    $page_header = "Dashboard";
    include 'includes/header.php';
?>



    

    <!-- Main content -->
       <div class="row">

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Orders</span>
              <span class="info-box-number">
                <?php 
    $delivery = $_SESSION['user']['id'];

              $sql = mysqli_query($db,"SELECT orders.*,customers.name, customers.id as id,customers.number from orders left join customers on orders.customer_id = customers.id where orders.delivery_id = '$delivery'");
                echo mysqli_num_rows($sql);  
                                  
                ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>


            
        
<?php include 'includes/footer.php'?>
