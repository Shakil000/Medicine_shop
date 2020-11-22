<?php
$page_header = "Medicine Updation ";
    include '../config/db.php';
    include 'includes/header.php';
    


    if (isset($_GET['edit'])){
        $id =  $_GET['edit'];


        $sql = "SELECT * FROM products WHERE id = '$id'";
        $row = $db->query($sql);
        $data = $row->fetch_assoc();
    }

    if (isset($_POST['update'])){
        $medicine_name = $_POST['medicine_name'];
        $group = $_POST['group'];
        $power = $_POST['power'];
        $company = $_POST['company'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        

        if(isset($_FILES['images']) && $_FILES['images']['error'][0]==0) {
            //upload iamge here
            $target_dir = "images/";

            $count = count($_FILES['images']['name']);

            $img_name = [];

            for ($i= 0 ; $i < $count; $i++){
                $target_file = $target_dir . basename($_FILES["images"]["name"][$i]);
                $img_name[] = $target_file;
                $file_name = $_FILES['images']['tmp_name'][$i];
                move_uploaded_file($file_name, $target_file);
            }

            $images = serialize($img_name);

        } else {

            $images = $_POST['old_image'];

        }

        if (!empty($medicine_name) && !empty($images) && !empty($company) && !empty($price) && !empty($description)){


            $sql = "UPDATE products SET `medicine_name` = '$medicine_name', `group` = '$group', `power` = '$power', `images` = '$images', `company` = '$company', `price` = '$price', `description` = '$description' WHERE `id` = '$id'";

            if($db->query($sql)){
                $msg = "Updated Successfully!";
              
            }else{
                echo "Something went wrong!!";
            }
        } else {
            echo "No Field Can be Empty";
        }
    }
?>

<div class="row content">
        <?php if (isset($msg)){ ?>
            <div class="alert alert-success">
                <strong>Info:!</strong> <?= $msg    ?>.
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
                            <input type="text" value="<?= $data['medicine_name'] ?>" name="medicine_name" class="form-control" id="" placeholder="Enter Medicine Name">
                        </div>

                        <div class="form-group">
                            <label for="">Group</label>
                            <input type="text" value="<?= $data['group']?>" name="group" class="form-control" id="" placeholder="Enter Medicine Group">
                           
                        </div>
                        <div class="form-group">
                            <label for="">Power</label>
                            <input type="text" value="<?= $data['power']?>" name="power" class="form-control" id="" placeholder="Enter power">
                        </div>


                        <div class="form-group">
                            <label for="">Company</label>
                            <input type="text" value="<?= $data['company']?>" name="company" class="form-control" id="" placeholder="Enter Company Name">
                        </div>



                        <div class="form-group">
                            <label for="">Price</label>
                            <input type="text" value="<?= $data['price'] ?>" name="price" class="form-control" id="description"  placeholder="Enter Price"  >
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <input type="text" value="<?= $data['description'] ?>" name="description" class="form-control" id="description" >
                        </div>



                        <div class="form-group">
                            <label for="exampleInputPassword1">Images</label>
                            <input type="hidden" name="old_image" value='<?= $data['images']?>'>
                            <input type="file" name="images[]" class="form-control" id="exampleInputPassword1" placeholder="Enter Ending Time" multiple>
                        </div>
                        
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

   

    <script type="text/javascript">
        
        // $(document).on('keyup', '#keyword', function() {
        //     var keyword = $(this).val();

        //     $.ajax({
        //         url: 'search.php',
        //         method:'POST',
        //         data: {keyword:keyword},
        //         success: function(result) {
        //             $('#search_list').html(result);
        //         }
        //     });
        // });

        // $(document).on('click', '.search-item', function() {
        //     var keyword = $(this).html();

            
        // })


    </script>
