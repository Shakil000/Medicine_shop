
<?php
include 'config/db.php';
include 'includes/card_bootstrap.php';
    $sql = "SELECT * FROM products";
    $rows = $db->query($sql);
    if (isset($_GET['edit'])){
        $id = $_GET['edit'];
        $sql = mysqli_query($db,"SELECT prescription.images, prescription.hospital_id,prescription.id, hospital.id as hos,hospital.hospital_name FROM prescription LEFT JOIN hospital ON prescription.hospital_id=hospital.id where prescription.id ='$id' ");
        $datas = mysqli_fetch_assoc($sql);
        if ($datas == false){
            die('404');
        }
    }
?>


    <div class="container show-area">
        <div class="row">
            <div class="col-md-5">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                      <?php
                        $images = unserialize($datas['images']);

                        foreach ($images as $key => $value){
							
                      ?>
                        <div class="carousel-item <?php if ($key == 0){ echo 'active'; } ?>">
                          <img src="<?php echo $value ?>" height="600" width="400">
                        </div>

                      <?php } ?>
                  </div>
>
                </div>
            </div>
            <div class="col-md-7">
                
                <h2>Hospital Name: <?= $datas['hospital_name']?></h2>
               <form action="cart.php" method="post" >
  <div class="form-group">
    <select name="name" class="form-control">
                                <option value="" selected>Please select medicine</option>
                                <?php

                                    while ($data = $rows->fetch_assoc()){
                                ?>
                                    <option value="<?= $data['id']?>"><?= $data['medicine_name']?></option>
                                <?php 
                            } ?>
                            </select>
  </div>
  <div class="form-group">
    <label for="pwd">Quantity</label>
    <input type="number" name="quantity" class="form-control" placeholder="Enter Qunatity" id="pwd">
  </div>
  <input type="hidden" name="id" value="<?php echo $_GET['edit']; ?> ">

  <button type="submit" name="submit" class="btn btn-danger">Add to cart</button>
</form>
                
            </div>
        </div>
        
    </div>








