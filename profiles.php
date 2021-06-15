<?php 

session_start();
require 'inclu/header.php';
require 'inclu/navbar.php';
require 'inclu/config.php';

if(!isset($_SESSION['user_name'])){
    header("location:login.php");// if ! have information
}

if(isset($_POST['btnsh'])){
     
     $user=$_SESSION['user_name'];

     $select=mysqli_query($connect,"SELECT * FROM `admin` WHERE `Username`='$user'");
     while($row=mysqli_fetch_assoc($select)){
     $username=$row['Username'];
     $password=$row['Password'];
}

     $user=$_SESSION['user_name'];
     $select=mysqli_query($connect,"SELECT * FROM `admin` WHERE `Username`='$user'");
     while($row=mysqli_fetch_assoc($select)){
     $username=$row['Username'];
     $password="";

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
           <div class="d-flex justify-content-center">
               <div class="card mt-5" style="width: 600px;">
                    <h4 style="text-align: center;">Change password</h4>
                         <div class="card-body">
                              <form action="" method="post">
                                   <div class="form-group">
                                       
                                        <input type="text" value="<?=$username?>">
                                   </div>
                                   <div class="form-group">
                                       
                                        <input type="text" value="<?=$password?>">
                                   </div>
                                   <button type="submit" class="btn btn-group-toggle btn-info btn-sm" name="btnsh">Showpasword</button>
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
