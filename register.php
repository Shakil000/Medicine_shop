<?php
    
    include 'config/db.php';

     if (isset($_POST['submit']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $number = $_POST['number'];
        $password = ($_POST['password']);
        $confirm_password = ($_POST['confirm_password']);
        
       if(!empty($name) && !empty($email) && !empty($address) && !empty($number) && !empty($password) && !empty($confirm_password))
       {
             
            if ($password == $confirm_password)
            {
               
                    $result="SELECT `email` FROM customers WHERE `email` ='$email'";
                    $count=$db->query($result);
                        if($count->num_rows  > 0)
                        {
                            $msg="Sorry Email <font color=red> $_POST[email]</font> Already Taken";
                        }else
                            {
                            $sql = "INSERT INTO customers (`name`,`email`,`address`, `number`, `password`)VALUES('$name','$email','$address', '$number', '$password')";
                                if ($db->query($sql)){
                                    $msg = "Data Inserted successfully !";
                                    header('location:index.php');
                                }
                                else
                                {
                                    $msg = "Something went wrong!";
                                }
                            }
//                echo $sql;die();
                
            }
            else
            {
                $msg = "Password doesn't match !";
            }
        }
    }
?>

<style>
#frame {
            width: 450px;
            margin: auto;
            margin-top: 8px;
            border: solid 1px #CCC; /* SOME CSS3 DIV SHADOW */
            -webkit-box-shadow: 0px 0px 10px #CCC;
            -moz-box-shadow: 0px 0px 10px #CCC;
            box-shadow: 0px 0px 10px #CCC; /* CSS3 ROUNDED CORNERS */
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
            -khtml-border-radius: 5px;
            border-radius: 5px;
            background-color: #FFF;
        }
  #frame h1 {
            text-align: center;
        }
          #frame form {
            text-align: center;
            margin-bottom: 30px;
        }
    
input[type=submit] {
    width: 30%;
    background-color: black;
    color: white;
    padding: 8px 14px;
    margin: 7px 166px;
    border: none;
    border-radius: 11px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}
.content {
max-width:500px;
margin: auto;
margin-top: 8%;

}

/* Full-width input fields */
  .reg {
  width: 78%;
  padding: 16px;
  margin: 0px 0 10px 0;
  border: none;
  background: #f1f1f1;
  border-radius: 5px;
   font-size: 14px;
}

.reg:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit button */
.btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}
.content a{
  text-decoration: none;
  font-size: 14px;
  line-height: 20px;
  color: black ;
}
.content a:hover{
  color: darkgrey;
}

</style>


<div class="main">
         <div class="col-md-12">
            <div id='frame'>
               <div class='search'><h1 style="margin-top: 7%;">Register Here</h1>
                <p style="color:#3ea924; margin-left: 49px;margin-top: 10%;font-size: 14px;">
                  <?php
                   if (isset($msg)){
                       echo $msg;
                   }
                   ?>
                </p>
                  


                  <form method="POST" action="">
                     <div class="content">
                       <input type="text" class="reg" id="name" name="name" placeholder="Enter  Name"/>
                       <input type="text" class="reg" id="address" name="address" placeholder="Enter address"/>
                       <input type="text" class="reg" id="number" name="number" placeholder="Enter Phone Number"/> 
                       <input type="text" class="reg" id="email" name="email" placeholder="Enter email"/>
                       <input type="password"  class="reg" id="password" name="password" placeholder="Enter Password"/>
                       <input type="password" class="reg" id="password" name="confirm_password" placeholder="Confirm Password"/>
                       <input type="submit" name="submit" value="Submit">
                      </div>
                  </form>
               </div>
            </div>  
                                
         </div> 
      </div>
</body>
</html>