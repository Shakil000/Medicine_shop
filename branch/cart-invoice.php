<?php
include '../includes/card_bootstrap.php';
include '../config/db.php';

session_start();
$id = $_GET['id'];

    $sql = "SELECT carts.*,products.medicine_name,products.price,products.id as product, customers.name, customers.id as customer FROM carts LEFT JOIN products on carts.product_id = products.id LEFT JOIN customers ON carts.customer_id=customers.id where customers.id = $id ";
    $row = $db->query($sql);

    $result = mysqli_query($db,"SELECT SUM(amount) AS amounts FROM carts where customer_id = '$id' "); 
    $summation = mysqli_fetch_assoc($result); 
    $_SESSION['price']=$summation['amounts'];
?>

           <style>
              .s{
              border:3px solid black;
              height:100% px;
              width:800px;
              align:center;
              background-color:white;
            }
            @media print
{    
    .no-print, .no-print *
    {
        display: none !important;
    }
}
  </style>
  <center>
  <div class="s" >  
                <h1 style="text-align: center; color: red">Invoice</h1>
                <!-- /.box-header -->
                <h1>Customer Name:
                <?php 
                echo $_SESSION['customer'];
                ?></h1>
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                            <th style="text-align: center;">#</th>
                            <th style="text-align: center;">Medicine Name</th>
                            <th style="text-align: center;">Unit Price</th>
                            <th style="text-align: center;">Quantity</th>
                            <th style="text-align: center;">Amount</th>
                    
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i=0;
                            while ($data = $row->fetch_assoc()){
                                $i++
                        ?>
                             <tr>
                           <td style="text-align: center;"><?= $i ?></td>
                            <td style="text-align: center;"><?= $data['medicine_name'] ?></td>
                            <td style="text-align: center;"><?= $data['price'] ?></td>
                            <td style="text-align: center;"><?= $data['quantity'] ?></td>
                            
                            <td style="text-align: center;"><?= $data['amount'] ?></td>
                         

                        </tr>
                        <?php } ?>
                        <tr class="bg-gray">
                            <td></td><td>Total</td>
                            <td></td><td></td>
                            <td><?= $summation['amounts'] ?></td>
                        </tr>
                        </tbody></table>
                      </div>
</div>
               <button type="button"   onclick="window.print()" class="btn btn-primary no-print">Print</button>
</center>
   