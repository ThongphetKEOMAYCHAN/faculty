<?php 
require 'config.php';
if(isset($_GET['c_id'])){


$st_id=$_GET['c_id'];
$delete=mysqli_query($connect,"DELETE FROM class1 WHERE C_id='$st_id'");
if($delete){
    header("location:../class.php?deleted_ok");
}
}

//   delete information 
if(isset($_GET['st_id'])){


    $st_id=$_GET['st_id'];
    $st_delete=mysqli_query($connect,"DELETE FROM `students` WHERE St_id='$st_id'");
    if($st_delete){
        header("location:../st_infor.php?deleted");
    }
    }
