<?php
    $page_header = "Dashboard";
    include 'includes/header.php';
?>

    <!-- Main content -->
       <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-product-hunt"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Medicine</span>
              <span class="info-box-number">
                <?php 
                  $run = $db->query("SELECT count(id) as product_number FROM products");
                  $product = $run->fetch_assoc();
                  echo $product['product_number']                  
                ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-shopping-bag"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Orders</span>
              <span class="info-box-number">
                <?php 
                  $run = $db->query("SELECT count(id) as order_number FROM orders");
                  $order_number = $run->fetch_assoc();
                  echo $order_number['order_number']                  
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


             <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-home"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Branches</span>
              <span class="info-box-number"><?php 
                  $run = $db->query("SELECT count(id) as branch FROM branch");
                  $branches = $run->fetch_assoc();
                  echo $branches['branch']                  
                ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Members</span>
              <span class="info-box-number"><?php 
                  $run = $db->query("SELECT count(id) as member FROM customers");
                  $members = $run->fetch_assoc();
                  echo $members['member']                  
                ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->


    



<?php include 'includes/footer.php'?>
