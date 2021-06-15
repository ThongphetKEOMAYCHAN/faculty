<?php 

session_start();
require 'inclu/header.php';
require 'inclu/navbar.php';
require 'inclu/config.php';

if(!isset($_SESSION['user_name'])){
    header("location:login.php");// if ! have information
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
           
           <!---code----->
        </div>
    </div>
    <?php 
     require 'inclu/footer.php';
     ?>
