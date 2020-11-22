<?php
$page_header = "Prescription List ";
include 'includes/header.php';


    $sql = mysqli_query($db,"SELECT branch.id, prescription.images,customers.name, customers.address,prescription.phone,prescription.patient_name,hospital.hospital_name,prescription.doctor_name FROM prescription LEFT JOIN branch ON prescription.branch_id=branch.id LEFT JOIN hospital ON prescription.hospital_id=hospital.id LEFT JOIN customers ON prescription.customer_id=customers.id where branch.id = ".$_SESSION['user']['id']." ");
?>

    <div class="row" >
        
            <div class="box col-md-12">
                <div class="box-header">
                    <h3 class="box-title">Prescriptions</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body ">
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                            <th>#</th>
                            
                            <th>Customer name</th>
                            
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Patient Name</th>
                            <th>Hospital Name</th>
                            <th>Doctor Name</th>
                    
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
                           
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row["address"];?></td>
                            <td><?= $row['phone'] ?></td>
                            <td><?= $row['patient_name'] ?></td>
                            <td><?= $row['hospital_name'] ?></td>                           
                            <td><?= $row['doctor_name'] ?></td>                           
                            <!-- <td><span class="badge bg-red"></span></td> -->
                            <td class="text-center">
                                <a href="../details.php?edit=<?= $row['id']?>"><i class="fa fa-eye" style="font-size: 24px"></i></a>
                                
                                <a href="prescription-delete.php?del=<?= $row['id']?>"><i class="fa fa-trash"style="font-size: 24px"></i></a>
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
