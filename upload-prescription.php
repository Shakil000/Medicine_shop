
<?php
$page_header = "Upload Prescription ";
session_start();
  include 'config/db.php';

    $sql = "SELECT * FROM hospital";
    $rows = $db->query($sql);
    $sql2= "SELECT * FROM branch";
    $rows2 = $db->query($sql2);

    if (isset($_POST['submit'])) {

        $phone = $_POST['phone'];
        $patient_name = $_POST['patient_name'];
        $doctor_name = $_POST['doctor_name'];
        $hospital_name = $_POST['hospital_name'];
        $location = $_POST['location'];
        $file_size = $_FILES['images']['size'];
        $customer = $_SESSION['customer']['id'];
        if ( !empty($hospital_name) && !empty($location) && !empty($file_size) &&!empty($patient_name) &&!empty($doctor_name)) {


            $target_dir = "branch/images/";

            $count = count($_FILES['images']['name']);

            $images = [];

            for ($i= 0 ; $i < $count; $i++){
                $target_file = $target_dir . basename($_FILES["images"]["name"][$i]);
                $images[] = $target_file;
                $file_name = $_FILES['images']['tmp_name'][$i];
                move_uploaded_file($file_name, $target_file);
            }

                $all_image = serialize($images);
                $sql = "INSERT INTO prescription(`phone`, `patient_name`,`doctor_name`, `images`, `hospital_id`, `branch_id`, `customer_id`)VALUES('$phone', '$patient_name', '$doctor_name', '$all_image', '$hospital_name',' $location',' $customer')";
                $count = $db->query($sql);
                $message = " Data Inserted Successfully!!";

        } 
        else {
            $message = "All fields are required!!";
        }
    }
    
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home page</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/4.3.1.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/owl.carousel.min.css">

    <link rel="stylesheet" type="text/css" href="includes/home.css">
    <link href="img/favicon.ico" rel="shortcut icon"/>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">


    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/font-awesome.min.css"/>
    <link rel="stylesheet" href="css/flaticon.css"/>
    <link rel="stylesheet" href="css/slicknav.min.css"/>
    <link rel="stylesheet" href="css/jquery-ui.min.css"/>
    <link rel="stylesheet" href="css/owl.carousel.min.css"/>
    <link rel="stylesheet" href="css/animate.css"/>
    <link rel="stylesheet" href="css/style.css"/>
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->


    <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
<!--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>-->
    <link rel="stylesheet" type="text/css" href="includes/style.css">
    <script src="bootstrap/js/3.3.1.slim.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>

    <script src="bootstrap/js/jquery-3.4.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/main.js"></script>
    <script src="bootstrap/js/owl.carousel.min.js"></script>


</head>
<body>
    <section>
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <!-- logo -->
                        <a href="index.php" class="site-logo">
                            <div class="logo">
                         <div class="logo"><img src="images/logo.png" alt="image"/></div>
                    </div>
                        </a>
                    </div>

                    <div class="col-md-4">
                            <form class="header-search-form" action="search.php" method="get">
                            <input type="text" name="search_word" placeholder="Search for medicine ....">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>

                    <div class="col-md-5">
                        <div class="user-panel">
                            <div class="up-item">
                                <div class="shopping-card">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>0</span>
                                </div>
                                <a href="cart-list.php">Shopping Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    </section>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="admin/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="admin/assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="admin/assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="admin/assets/dist/pre/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="admin/assets/dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="admin/assets/bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="admin/assets/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="admin/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="admin/assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">

    <link rel="stylesheet" href="admin/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">

    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">




    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <div class="row ">
        <div class="col-md-offset-3 col-md-6">
        <?php if (isset($message)){ ?>
            <div class="alert alert-success">
                <strong>Info:!</strong> <?= $message    ?>.
            </div>
        </div>
        <?php } ?>

        <div class="col-md-offset-3 col-md-6">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Upload Prescription</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" action="" enctype="multipart/form-data">
                    <div class="box-body">

                        <div class="form-group">
                            <label for="name">Phone</label>
                            <input type="text" name="phone" class="form-control" id="" placeholder="Enter Contact Number">
                        </div>

                        <div class="form-group">
                            <label for="name">Patient Name</label>
                            <input type="text" name="patient_name" class="form-control" id="" placeholder="Enter Name">
                        </div>

                        <div class="form-group">
                            <label for="name">Doctor Name</label>
                            <input type="text" name="doctor_name" class="form-control" id="" placeholder="Enter Name">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Hospital</label>
                            <select name="hospital_name" class="form-control">
                                <option value="" selected>Please select one</option>
                                <?php
                                    while ($data = $rows->fetch_assoc()){
                                ?>
                                    <option value="<?= $data['id']?>"><?= $data['hospital_name']?></option>
                                <?php } ?>
                            </select>
                        </div>

                             <div class="form-group">
                            <label for="exampleInputEmail1">Branch</label>
                            <select name="location" class="form-control">
                                <option value="" selected>Please select one</option>
                                <?php
                                    while ($data = $rows2->fetch_assoc()){
                                ?>
                                    <option value="<?= $data['id']?>"><?= $data['location']?></option>
                                <?php } ?>
                            </select>
                        </div>
<!---->


                        <div class="form-group">
                            <label for="exampleInputPassword1">Images</label>
                            <input type="file" name="images[]" class="form-control" id="exampleInputPassword1" placeholder="Enter Ending Time" multiple>
                        </div>
                        
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>