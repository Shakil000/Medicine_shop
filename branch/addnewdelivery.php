<?php
$page_header = "Add Delivery Person ";
  include 'includes/header.php';
  


    if (isset($_POST['submit'])) {

        $person_name = $_POST['person_name'];
        $address = $_POST['address'];
        $phone = ($_POST['phone']);
        $email = ($_POST['email']);
        $password = ($_POST['password']);
        $branch = $_SESSION ['user']['id'];
        $file_size = $_FILES['images']['size'];

        if (!empty($person_name) && !empty($address) && !empty($phone) && !empty($email) && !empty($password)) {


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
                $sql = "INSERT INTO delivery (`person_name`, `address`,`phone`, `images`, `email`, `password`, `branch_id`)VALUES('$person_name', '$address', '$phone', '$all_image', '$email',' $password','$branch')";
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
                    <h3 class="box-title">Delivery Person Detail</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" action="" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="product_name">Delivery Person Name</label>
                            <input type="text" name="person_name" class="form-control" id="" placeholder="Enter Person Name">
                        </div>

  
                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" name="address" class="form-control" id="" placeholder="Enter Address Name">
                        </div>

                       

                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" name="phone" class="form-control" id="" placeholder="Enter Contact Number">
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
