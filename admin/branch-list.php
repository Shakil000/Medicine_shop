<?php
$page_header = "Branch List ";
include 'includes/header.php';


    $sql = "SELECT * FROM branch";
    $row = $db->query($sql);
?>

    <div class="row" >
        
            <div class="box col-md-12">
                <div class="box-header">
                    <h3 class="box-title">Branches</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body ">
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Manager Name</th>
                            <th>Pharmacy</th>
                            <th>Location</th>
                            
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Password</th>
                    
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            while ($data = $row->fetch_assoc()){
                        ?>
                             <tr>
                           <td><?= $data['id'] ?></td>
                           <td><img src="<?= unserialize($data['images'])[0] ?>" height="50" width="50"></td>
                            <td><?= $data['manager_name'] ?></td>
                            <td><?= $data['pharmacy'] ?></td>
                            <td><?= $data['location'] ?></td>
                            
                            <td><?= $data['address'] ?></td>
                            <td><?= $data['phone'] ?></td>
                            <td><?= $data['email'] ?></td>
                            <td><?= $data['password'] ?></td>
                           
                            <td><span class="badge bg-red"></span></td>
                            <td class="text-center">
                                <a href="branch-edit.php?edit=<?= $data['id']?>"><i class="fa fa-edit" style="font-size: 24px"></i></a>
                                <a href="branch-delete.php?del=<?= $data['id']?>"><i class="fa fa-trash"style="font-size: 24px"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                        </tbody></table>
               
                <!-- /.box-body -->
                 <!-- /.box-body -->
            
            </div>
        </div>

    </div>


<?php include 'includes/footer.php'?>
