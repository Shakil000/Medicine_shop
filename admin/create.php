<?php
$page_header = "New Admin Create ";
  include 'includes/header.php';
  

   if (isset($_POST['submit'])) {

        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = ($_POST['password']);
        $confirm_password = ($_POST['confirm_password']);
        $status = $_POST['status'];
        $file_size = $_FILES['images']['size'];

        if (!empty($name) && !empty($address) && !empty($phone) && !empty($email) && !empty($password) && !empty($status)&& !empty($confirm_password)) {


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
                $sql = "INSERT INTO users(`name`, `address`,`phone`, `images`, `email`, `password`, `status`)VALUES('$name', '$address', '$phone', '$all_image', '$email','$password','$status')";
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
                <strong>Info:!</strong> <?= $message    ?>
            </div>
        <?php } ?>

        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Users's Details</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" action="" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="product_name">Name</label>
                            <input type="text" name="name" class="form-control" id="" placeholder="Enter Name">
                        </div>

  
                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" name="address" class="form-control" id="" placeholder="Enter Address">
                        </div>

                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="number" name="phone" class="form-control" id="" placeholder="Enter  Phone">
                           

                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" id="" placeholder="Enter email">
                        </div>

                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control" id="" placeholder="Enter Password">
                        </div>

                          <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control" id="" placeholder="Enter Password">
                        </div>

                       
                           <div class="form-group">
                                <label for="">Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" selected>Active</option>
                                    <option value="0" >Inactive</option>
                                </select>
                            </div>

                        <div class="form-group">
                            <label for="">Images</label>
                            <input type="file" name="images[]" class="form-control" id="" placeholder="Enter Ending Time" multiple>
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
