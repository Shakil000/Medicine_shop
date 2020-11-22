<?php
   include 'includes/header.php';
   include 'config/db.php';
   session_start();
    if (!isset($_SESSION['customer'])){
        header('Location:login.php');
        
    }
        $id = $_SESSION['customer']['id'];

    

    $sql = "SELECT * FROM customers where id='$id'";
    
    $row = $db->query($sql);
    $data = $row->fetch_assoc();

?>
<link rel="stylesheet" type="text/css" href="bootstrap/css/4.0.0.bootstrap.min.css">
<script src="bootstrap/js/3.2.1jquery.min.js"></script>
<script src="bootstrap/js/4.0.0.bootstrap.min.js"></script>
<!--<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
<!------ Include the above in your HEAD tag ---------->

<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-<script src="bootstrap/js/3.3.1.jquery.min.js"></script>-->
  
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
</head>


<hr>
<div class="container bootstrap snippet">
    <div class="row">
      <div class="col-sm-10"><h1>User Profile</h1></div>
      
    </div>
    <div class="row">
      <div class="col-sm-3"><!--left col-->     
          
        </div><!--/col-3-->
      <div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
                <li><a data-toggle="tab" href="#profiles">Edit Profile</a></li>
                <li><a data-toggle="tab" href="#orders">My Order</a></li>
                <li><a href="logout.php">Logout</a></li>
              </ul>
              
          <div class="tab-content">
            <div class="tab-pane active" id="home">
               <div class="box-body no-padding">
                    <table class="table table-condensed">
                      <thead>
                        <tr>
                            
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Number</th>
                            
                            <th>Password</th>
                            
                            
                        </tr>
                      </thead>
                        <tbody>
                      
                             <tr>
                            
                            <td><?= $data['name'] ?></td>
                            <td><?= $data['email'] ?></td>
                            <td><?= $data['address'] ?></td>
                            <td><?= $data['number'] ?></td>
                            
                            <td><?= $data['password'] ?></td>
                      
                        </tr> 
                        </tbody></table>
                </div>
             </div><!--/tab-pane-->

             <div class="tab-pane" id="profiles">
               
                  <form class="form" action="" method="post" id="registrationForm">
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4>Name</h4></label>
                              <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $_SESSION['customer']['name']?>" placeholder="first name" title="enter your first name if any.">
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="phone"><h4>Phone</h4></label>
                              <input type="text" class="form-control" name="phone" id="phone" placeholder="enter phone" value="<?php echo $_SESSION['customer']['number']?>" title="enter your phone number if any.">
                          </div>
                      </div>
          
                      
                     <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Email</h4></label>
                              <input type="email" value="<?php echo $_SESSION['customer']['email']?>" class="form-control" name="email" id="email" style="background: #f1f1f1;width: 75%;margin: 0px 0 10px 0;" placeholder="email" title="enter your email.">
                          </div>
                      </div>
                      
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>Password</h4></label>
                              <input type="password" value="<?php echo $_SESSION['customer']['password']?>" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>Password</h4></label>
                              <input type="password" value="<?php echo $_SESSION['customer']['password']?>" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
                          </div>
                      </div>
                      
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                
                            </div>
                      </div>
                </form>
               
             </div><!--/tab-pane-->

             <div class="tab-pane" id="orders">
                <table class="table">
                  <tr>
                    <th>Order Number</th>
                    <th>Payment Method</th>
                    <th>Amount</th>

                    <th>Branch</th>
                  </tr>
                <?php
                $customer_id = $_SESSION['customer']['id'];
                  $query = "SELECT orders.customer_id,branch.location,orders.id,orders.paymentmethod, orders.amount FROM orders JOIN branch ON branch.id=orders.branch_id  WHERE orders.customer_id='$customer_id' ";


                  $row = $db->query($query);

                  while ($order = $row->fetch_assoc()) {
                    ?>
                      <tr>
                        <td><?= $order['id']; ?></td>
                        <td><?= $order['paymentmethod']; ?></td>
                        <td><?= $order['amount']; ?></td>
                        <td><?= $order['location']; ?></td>
                        <tr>
                    <?php
                  }

                ?>
              </thead>
                </table>
              </div><!--/tab-pane-->

          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
  </div><!--/row-->


