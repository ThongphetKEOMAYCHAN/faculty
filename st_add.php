<?php 

session_start();
require 'inclu/config.php';
require 'inclu/header.php';
require 'inclu/navbar.php';

if(!isset($_SESSION['user_name'])){
    header("location:login.php");// if ! have information
}
date_default_timezone_set("Asia/Bangkok"); 
$date= date("Y-m-d h:i:sa");
$st_id2="";
$gid="";
$cid="";
if(isset($_POST['insert'])){

     $st_no=$_POST['st_no'];
     $st_name=$_POST['st_name'];
     $st_sex=$_POST['sex'];
     $st_date=$_POST['st_date'];
     $st_address=$_POST['st_address'];
     $st_class_id=$_POST['class_id'];
     $st_year=$_POST['year_id'];
     $year=$_POST['year'];
     $m_id=$_POST['m_id'];

     if($st_no=="qfen"){

          //echo'<script> alert("ໃນແຜນ")</script>';
          $select=mysqli_query($connect,"SELECT `St_no` FROM `students`");
          while($show=mysqli_fetch_array($select)){
            $st_id=$show['St_no'];

          }if(empty($st_id)){
            $st_id2="QFEN-001";

          }else{
            $st_id3=str_replace("QFEN-","",$st_id);
            $st_id4=str_pad( $st_id3 + 1, 3,0, STR_PAD_LEFT);
            $st_id2="QFEN-".$st_id4;
          
            ///  $mn=M_no 
          }
     }else if($st_no=="nfen"){
          $select=mysqli_query($connect,"SELECT `St_no` FROM `students`");
          while($show=mysqli_fetch_array($select)){
            $st_id=$show['St_no'];

          }if(empty($st_id)){
            $st_id2="NFEN-001";

          }else{
            $st_id3=str_replace("NFEN-","",$st_id);
            $st_id4=str_pad( $st_id3 + 1, 3,0, STR_PAD_LEFT);
            $st_id2="NFEN-".$st_id4;
          
            ///  $mn=M_no 
          }
     }
     //=================================
     $c_select=mysqli_query($connect,"SELECT*FROM class1 where C_name='$st_class_id'");
     while($c_row=mysqli_fetch_array($c_select)){
          $cid=$c_row['C_id'];

     }
     $g_select=mysqli_query($connect,"SELECT*FROM `grade` where `grade`='$st_year'");
     while($g_row=mysqli_fetch_array($g_select)){
          $gid=$g_row['g_id'];

     }
     $m_select=mysqli_query($connect,"SELECT*FROM `major` where `M_name`='$m_id'");
     while($m_row=mysqli_fetch_array($m_select)){
          $mid=$m_row['M_id'];
     }
     $insert="INSERT INTO `students`(`St_no`,`year`, `St_name`, `St_sex`, `St_date`, `St_address`,`m_id`, `C_id`, `G_id`, `date`) 
                               VALUES ('$st_id2', '$year', '$st_name','$st_sex','$st_date','$st_address','$mid','$cid','$gid','$date')";
                    if(mysqli_query($connect,$insert)){
                         header("location:st_infor.php?add");
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
           <div class="card">
                <div class="card-body">
                     <form action="" method="post">
                          <div class="row">
                               
                               <div class="form-group col-md-2">
                                   <label style="font-family: Noto Sans Lao;">ລະຫັດນັກສຶກສາ</label>
                                   <select class="form-control" name="st_no" id="">
                                        <option value=""></option>
                                        <option value="qfen" style="font-family: Noto Sans Lao;">ໃນແຜນ</option>
                                        <option value="nfen" style="font-family: Noto Sans Lao;">ນອກແຜນ</option>
                                   </select>
                               </div>
                               <div class="form-group col-md-4">
                                    <label style="font-family: Noto Sans Lao;">ເພີມຊື່ນັກສຶກສາ</label>
                                    <input type="text" class="form-control" name="st_name" >
                               </div>
                               <div class="form-group col-md-2">
                                   <label style="font-family: Noto Sans Lao;">ເພດ</label>
                                   <select class="form-control" name="sex" id="">
                                        <option value=""></option>
                                        <option value="ຍີງ" style="font-family: Noto Sans Lao;">ເພດຍີງ</option>
                                        <option value="ຊາຍ" style="font-family: Noto Sans Lao;">ເພດຊາຍ</option>
                                   </select>
                               </div>
                               <div class="form-group col-md-4">
                                    <label style="font-family: Noto Sans Lao;">ວັນເດືອນປີເກີດ</label>
                                    <input type="date" class="form-control" name="st_date" >
                               </div>
                               <div class="form-group col-md-4">
                                    <label style="font-family: Noto Sans Lao;">ທີ່ຢູ່</label>
                                    <input type="text" class="form-control" name="st_address" >
                               </div>
                               <div class="form-group col-md-2">
                                   <label style="font-family: Noto Sans Lao;">ສາຂາວິຊາ</label>
                                   <select class="form-control" name="m_id" id="">
                                        <option value=""></option>

                                        <?php $m_select=mysqli_query($connect,"SELECT*FROM major");
                                             while($m_row=mysqli_fetch_assoc($m_select)){?>
                              
                                        <option value="<?=$m_row['M_name']?>"><?=$m_row['M_name']?></option>
                                        <?php }?>
                                   </select>
                               </div>
                               <div class="form-group col-md-2">
                                   <label style="font-family: Noto Sans Lao;">ຫ້ອງ</label>
                                   <select class="form-control" name="class_id" id="">
                                        <option value=""></option>
                                        <?php $conn_select=mysqli_query($connect,"SELECT*FROM class1");
                                             while($conn_row=mysqli_fetch_assoc($conn_select)){?>
                              
                                        <option value="<?=$conn_row['C_name']?>"><?=$conn_row['C_name']?></option>
                                        <?php }?>
                                   </select>
                               </div>
                               <div class="form-group col-md-2">
                                   <label style="font-family: Noto Sans Lao;">ປີທີ</label>
                                   <select class="form-control" name="year_id" id="">
                                        <option value=""></option>
                                        <?php 
                                        $conn_select=mysqli_query($connect,"SELECT*FROM `grade`");
                                                  while($conn_row=mysqli_fetch_assoc($conn_select)){?>
                                        
                                        <option value="<?=$conn_row['grade']?>"><?=$conn_row['grade']?></option>
                                                  <?php }?>
                                   </select>
                               </div>
                               <div class="form-group col-md-2">
                                   <label style="font-family: Noto Sans Lao;">ສົກຮຽນ</label>
                                   <select class="form-control" name="year" id="">
                                        <option value=""></option>
                                        <option value="20">2020</option>
                                        <option value="21">2021</option>
                                        <option value="22">2022</option>
                                        <option value="23">2023</option>
                                        <option value="24">2024</option>
                                       
                                   </select>
                               </div>
                          </div>
                          <button type="submit" name="insert" class="btn btn-primary" style="font-family: Noto Sans Lao;">ເພີມ</button>
                     </form>
                </div>
           </div>
           <!---code----->
        </div>
    </div>
    <?php 
     require 'inclu/footer.php';
     ?>
