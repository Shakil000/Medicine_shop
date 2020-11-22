<?php
$page_header = "Add New Hospital Information ";
  include 'includes/header.php';
  


    if (isset($_POST['submit'])) {

        $hospital_name = $_POST['hospital_name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        $file_size = $_FILES['images']['size'];

        if (!empty($hospital_name) && !empty($address) && !empty($phone) && !empty($email)) {


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
                $sql = "INSERT INTO hospital (`hospital_name`, `address`,`phone`, `images`, `email`)VALUES('$hospital_name', '$address', '$phone', '$all_image', '$email')";
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
                    <h3 class="box-title">Hospital Details</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" action="" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="product_name">Hospital Name</label>
                            <input type="text" name="hospital_name" class="form-control" id="" placeholder="Enter Hospital Name">
                        </div>

                           

                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" name="address" class="form-control" id="" placeholder="Enter Hospital Address">
                        </div>

                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" name="phone" class="form-control" id="" placeholder="Enter Hospital Contact Number">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="email" name="email" class="form-control" id="" placeholder="Enter Hospital Email">
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
