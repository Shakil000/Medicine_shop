<?php
$page_header = "Medicine List ";
include 'includes/header.php';


    $sql = "SELECT * FROM products";
    $row = $db->query($sql);
?>

    <div class="row" >
        
            <div class="box col-md-12">
                <div class="box-header">
                    <h3 class="box-title">Medicine List</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body ">
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Medicine Name</th>
                            <th>Medicine Group</th>
                            <th>Power</th>
                            <th>Company</th>
                            <th>Price/Piece</th>
                            <th>Expair Date</th>
                            <th>Description</th>
                    
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
                            <td><?= $data['medicine_name'] ?></td>
                            <td><?= $data['group'] ?></td>
                            <td><?= $data['power'] ?></td>
                            <td><?= $data['company'] ?></td>
                            <td><?= $data['price'] ?></td>
                            <td><?= $data['exp_date'] ?></td>
                            <td><?= $data['description'] ?></td>
                            <td><span class="badge bg-red"></span></td>
                            <td class="text-center">
                                <a href="medicine-edit.php?edit=<?= $data['id']?>"><i class="fa fa-edit" style="font-size: 24px"></i></a>
                                <a href="medicine-delete.php?del=<?= $data['id']?>"><i class="fa fa-trash"style="font-size: 24px"></i></a>
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
