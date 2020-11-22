<?php
$page_header = "Hospital Information Updation ";
    include '../config/db.php';
    include 'includes/header.php';
    


    if (isset($_GET['edit'])){
        $id =  $_GET['edit'];


        $sql = "SELECT * FROM hospital WHERE id = '$id'";
        $row = $db->query($sql);
        $data = $row->fetch_assoc();
    }

    if (isset($_POST['update'])){
        $hospital_name = $_POST['hospital_name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
       
        

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

        if (!empty($hospital_name) && !empty($address) && !empty($phone) && !empty($email)){


            $sql = "UPDATE hospital SET `hospital_name` = '$hospital_name', `address` = '$address', `phone` = '$phone', `images` = '$images', `email` = '$email' WHERE `id` = '$id'";

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
                    <h3 class="box-title">Hospital Detail</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" action="" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="product_name">Hospital Name</label>
                            <input type="text" value="<?= $data['hospital_name'] ?>" name="hospital_name" class="form-control" id="" placeholder="Enter Hospital Name">
                        </div>

                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" value="<?= $data['address']?>" name="address" class="form-control" id="" placeholder="Enter Hospital Address">
                           
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" value="<?= $data['phone']?>" name="phone" class="form-control" id="" placeholder="Enter Phone Number">
                        </div>


                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" value="<?= $data['email']?>" name="email" class="form-control" id="" placeholder="Enter Branch Address">
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
