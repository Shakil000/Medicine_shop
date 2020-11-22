<?php
$page_header = "Upload Medicine ";
  include 'includes/header.php';
  


    if (isset($_POST['submit'])) {

        $medicine_name = $_POST['medicine_name'];
        $group = $_POST['group'];
        $power = $_POST['power'];
        $company = $_POST['company'];
        $price = ($_POST['price']);
        $code = ($_POST['code']);
        $description = ($_POST['description']);
        $file_size = $_FILES['images']['size'];

        if (!empty($medicine_name) && !empty($file_size) && !empty($company) && !empty($price) && !empty($description)) {


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
                $sql = "INSERT INTO products(`medicine_name`, `group`,`power`, `images`, `company`, `price`, `description`,`code`)VALUES('$medicine_name', '$group', '$power', '$all_image', '$company',' $price','$description','$code')";
                
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
                    <h3 class="box-title">Medicine's Details</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" action="" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="product_name">Medicine Name</label>
                            <input type="text" name="medicine_name" class="form-control" id="" placeholder="Enter Medicine Name">
                        </div>

  
                        <div class="form-group">
                            <label for="exampleInputEmail1">Group</label>
                            <input type="text" name="group" class="form-control" id="" placeholder="Enter Medicine">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Power</label>
                            <input type="text" name="power" class="form-control" id="" placeholder="Enter Medicine Power">
                           

                        <div class="form-group">
                            <label for="">Company</label>
                            <input type="text" name="company" class="form-control" id="" placeholder="Enter Company Name">
                        </div>

                        <div class="form-group">
                            <label for="">Price</label>
                            <input type="number" name="price" class="form-control" id="" placeholder="Enter Price/Piece">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Description</label>
                            <input type="text" name="description" class="form-control" id="" placeholder="Enter Description">
                        </div>
                        <div class="form-group">
                            <label for="">code</label>
                            <input type="number" name="code" class="form-control" id="" placeholder="Enter code">
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
