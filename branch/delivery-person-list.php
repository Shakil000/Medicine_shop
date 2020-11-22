<?php
$page_header = "Delivery Person List ";
include 'includes/header.php';


    $sql = mysqli_query($db,"SELECT delivery.branch_id, branch.location,branch.id, delivery.person_name,delivery.address,delivery.phone,delivery.email,delivery.images FROM delivery LEFT JOIN branch ON delivery.branch_id=branch.id where delivery.branch_id = ".$_SESSION['user']['id']." ");

?>

    <div class="row" >
        
            <div class="box col-md-12">
                <div class="box-header">
                    <h3 class="box-title">Delivery Persons</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body ">
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Person Name</th>
                            
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Location</th>
                    
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $serial =0;
                            while($row=mysqli_fetch_array ($sql))
                            {
                                $serial++;
                        ?>
                             <tr>
                           <td><?= $serial ?></td>
                           <td><img src="<?= unserialize($row['images'])[0] ?>" height="50" width="50"></td>
                            <td><?php echo $row['person_name'];?></td>
                            <td><?php echo $row["address"];?></td>
                            <td><?= $row['phone'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['location'] ?></td>                           
                            <!-- <td><span class="badge bg-red"></span></td> -->
                            <td class="text-center">
                                <a href="delivery-edit.php?edit=<?= $row['id']?>"><i class="fa fa-edit" style="font-size: 24px"></i></a>
                                <a href="delivery-delete.php?del=<?= $row['id']?>"><i class="fa fa-trash"style="font-size: 24px"></i></a>
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
