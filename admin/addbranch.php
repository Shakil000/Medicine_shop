<?php
$page_header = "Add Branch ";
  include 'includes/header.php';
  


    if (isset($_POST['submit'])) {

        $manager_name = $_POST['manager_name'];
        $pharmacy = $_POST['pharmacy'];
        $location = $_POST['location'];
        $address = $_POST['address'];
        $phone = ($_POST['phone']);
        $email = ($_POST['email']);
        $password = ($_POST['password']);
        $file_size = $_FILES['images']['size'];

        if (!empty($manager_name) && !empty($pharmacy) && !empty($location) && !empty($phone) && !empty($email) && !empty($password)) {


            $target_dir = "images/";

            $count = count($_FILES['images']['name']);

            $images = [];

            for ($i= 0 ; $i < $count; $i++){
                $target_file = $target_dir . basename($_FILES["images"]["name"][$i]);
                $images[] = $target_file;
                $file_name = $_FILES['images']['tmp_name'][$i];
                move_uploaded_file($file_name, $target_file);
            }

                $all_image = serialize($images);
                $sql = "INSERT INTO branch (`manager_name`, `pharmacy`,`location`, `images`, `address`, `phone`, `email`,`password`)VALUES('$manager_name', '$pharmacy', '$location', '$all_image', '$address',' $phone','$email','$password')";
                $count = $db->query($sql);
                $message = " Data Inserted Successfully!!";

        } else {
            $message = "All fields are required!!";
        }
    }
    
?>

    <div class="row ">
        <?php if (isset($message)){ ?>
            <div class="alert alert-success">
                <strong>Info:!</strong> <?= $message    ?>.
            </div>
        <?php } ?>

        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Branch Detail</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" action="" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="product_name">Manager Name</label>
                            <input type="text" name="manager_name" class="form-control" id="" placeholder="Enter Manager Name">
                        </div>

  
                        <div class="form-group">
                            <label for="">Pharmacy</label>
                            <input type="text" name="pharmacy" class="form-control" id="" placeholder="Enter Pharmacy Name">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Location</label>
                            <input type="text" name="location" class="form-control" id="" placeholder="Enter Exact Location">
                           

                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" name="address" class="form-control" id="" placeholder="Enter Branch Address">
                        </div>

                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" name="phone" class="form-control" id="" placeholder="Enter Brach Contact Number">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="email" name="email" class="form-control" id="" placeholder="Enter Valid Email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="" placeholder="Enter password">
                        </div>


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

<?php include 'includes/footer.php'; ?>
