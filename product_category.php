<?php
   include 'includes/header.php';
   $close_update = "UPDATE products SET status='2' WHERE ending_time < NOW() AND status != '2'";
   $db->query($close_update);
   $start_update = "UPDATE products SET status='1' WHERE starting_time < NOW() AND status = '0'";
   $db->query($start_update);
?>



<div class="container selected">
        <div class="row">
            <?php

            	//find category
            	if(isset($_GET['category_id'])){
            		$category = $_GET['category_id'];

            	}

                $sql = "SELECT * FROM products WHERE category_id='$category'";
                $row = $db->query($sql);

                while ($data= $row->fetch_assoc()){

                $current_time = strtotime(date('Y-m-d h:i:s'));
                $start = strtotime($data['starting_time']);
                $end = strtotime($data['ending_time']);
                    

            ?>
<style>
    .btn{
        padding: 1.375rem 0.75rem;
    font-size: 13px;
    width: 91px;
    }
</style>
            <div class="col-md-3">
                <!--bootstrap card-->
                <div class="card" style="width: 22rem;">
                    <a href="show.php?id=<?= $data['id']?>"><img src="admin/<?= unserialize($data['images'])[0]?>" class="card-img-top" alt="..."></a>
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= $data['product_name']?></h5>
                        <p class="card-text">Starting Price: <?= $data['starting_price']?></p>
                        <p class="countDownTime"></p>
                        <p class="expire_time" data-ending_time="<?= $data['ending_time']; ?>" data-starting_time="<?= $data['starting_time']; ?>" data-product_id="<?= $data['id']; ?>"></p>

                        <?php
                            if(($current_time - $start) < 0) {

                                echo '<a href="#" class="btn btn-warning" data-toggle="modal" data-target="#myModal">Bid Not Start</a>';
                            } else if (($end - $current_time) < 0) {
                               echo '<a href="bid.php?id='.$data['id'].'" class="btn btn-danger">Bid Closed</a>';
                            } else {
                                echo '<a href="show.php?id='.$data['id'].'" class="btn btn-success">Bid Here</a>';
                            }
                        ?>
                        

                        <!--<div class="modal" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title">Bid Not Started</h3>
                                        <button type="button" class="close" data-dismiss="modal" arial-label="Close"><span aria-hidden="true">&times;</span>   
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>You have to wait for starting the bid!!</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" style="width: 73px;" class="btn btn-secondary"data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>-->

                    </div>
                </div>
            </div>
            <?php  } ?>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('.expire_time').each(function() {
                var _self = $(this);
                var ending_time = $(this).data('ending_time');
                var starting_time = $(this).data('starting_time');
                var product_id = $(this).data('product_id');
                var now = new Date().getTime();

                var check_start = new Date(starting_time).getTime();
                var check_end = new Date(ending_time).getTime();
                var target_time = ending_time;
                var ab = 'end_time';

                if (now < check_start) {
                    target_time = starting_time;
                    var ab = 'start_time';
                }


                var countDownTime = new Date(target_time).getTime();
                 //var starting_time = $(this).data('starting_time');
                //var inTime = new Date(starting_time).getTime();

                 var x = setInterval(function() {
                    var now = new Date().getTime();
                    var distance = countDownTime - now;
                    //var distance = inTime - now;

                    var days = Math.floor(distance/(1000*60*60*24));
                    var hours = Math.floor((distance % (1000*60*60*24)) / (1000*60*60));
                    var minutes = Math.floor((distance % (1000*60*60)) / (1000*60));
                    var seconds = Math.floor((distance % (1000*60)) / (1000));

                    if (distance < 0) {
                        clearInterval(x);
                        if ('start_time' == ab) {
                            $(_self).siblings('.btn').removeClass('btn-warning').addClass('btn-success').html('Bid Here').attr('href', 'show.php?id='+product_id);
                            countDownTime = ending_time;
                        } else {
                            $(_self).siblings('.countDownTime').html('Expired');
                            $(_self).siblings('.btn').removeClass('btn-success').addClass('btn-danger').html('Bid Closed').attr('href', 'bid.php?id='+product_id);
                        }
                        
                    } else {
                         $(_self).siblings('.countDownTime').html(days + 'd ' + hours + ' : ' + minutes + ' : ' + seconds );
                    }
                   

                 }, 1000);
            });
        });
    </script>