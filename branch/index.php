<?php
    $page_header = "Dashboard";
    include 'includes/header.php';
?>



    

    <!-- Main content -->
       <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Delivery Persons</span>
              <span class="info-box-number">
                <?php 
                  $branch = $_SESSION['user']['id'];

                  $run = mysqli_query($db,"SELECT * FROM delivery where branch_id ='$branch' ");
                  echo mysqli_num_rows($run);                
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
    $branch = $_SESSION['user']['id'];

                  $run = mysqli_query($db,"SELECT * FROM orders where branch_id ='$branch' ");
                  echo mysqli_num_rows($run);                  
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
