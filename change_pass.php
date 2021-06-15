<?php 

session_start();
require 'inclu/header.php';
require 'inclu/navbar.php';
require 'inclu/config.php';


if(!isset($_SESSION['user_name'])){
    header("location:login.php");// if ! have information
}

$msg="";
$user=$_SESSION['user_name'];

if(isset($_POST['btnch'])){
     $old_pass=$_POST['oldpass'];
     $new_pass=$_POST['newpass'];
     $conf_pass=$_POST['confirpass'];

     $query=mysqli_query($connect,"SELECT *  FROM `admin` WHERE `Username`='$user' ");

     while($row=mysqli_fetch_assoc($query)){
          $s_pass=$row['Password'];
     }
     if($old_pass==$s_pass){
          
          if($new_pass==$conf_pass){

               $update=mysqli_query($connect,"UPDATE `admin` SET `Password`='$new_pass' WHERE `Username`='$user'");
               if($update){
                    $msg="ປຽນລະຫັດຜ່ານໃຫ່ມສຳເລັດແລ້ວ.";
               }
          }else{
               $msg="ລະຫັດຜ່ານໃຫ່ມຂອງທ່ານບໍຖືກຕ້ອງ.";
          }
     }else{
          $msg="ລະຫັດຂອງທ່ານບໍຖືກຕ້ອງ.";
     }
}
?>

     

    <div class="wrapper d-flex">
        <?php 
        require 'inclu/siderbar.php';
        ?>
        <div class="content">
           <?php 
           require 'inclu/card.php';?>
           <!----code---->
           <div class="d-flex justify-content-center ">
              <div class="card mt-5" style="width: 600px;">
              <p style="text-align: center; color:red"><?=$msg?></p>
               <h4 style="text-align: center;">Change password</h4>
                    <div class="card-body">
                         <form action="" method="post">
                              <div class="form-group">
                                   <label for="">Old Password</label>
                                   <input type="password" name="oldpass" class="form-control" placeholder="****" require>     
                              </div>
                              <div class="form-group">
                                   <label for="">New Password</label>
                                   <input type="password" name="newpass" class="form-control"v placeholder="****"  require>
                              </div>
                              <div class="form-group">
                                   <label for="">Confirm Password</label>
                                   <input type="pasword" name="confirpass" class="form-control"v placeholder="****"  require>
                              </div>
                              
                              <button class="btn btn-group-toggle btn-info" name="btnch">change</button>
                         </form>
                    </div>
              </div>
           </div>
           <!---code----->
        </div>
    </div>
    <?php 
     require 'inclu/footer.php';
     ?>
