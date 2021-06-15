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

$id=$_GET['id'];
$select="SELECT*FROM `Students` as st
INNER JOIN class as c ON st.C_id=c.C_id
INNER JOIN  grade as g ON st.G_id=g.g_id
INNER JOIN major as m ON st.m_id=m.M_id
where st.St_id='$id'";

$result=mysqli_query($connect,$select);
while($row=mysqli_fetch_assoc($result)){
$stno=$row['St_no'];
$syear=$row['year'];
$stname=$row['St_name'];
$ssex=$row['St_sex'];
$stdate=$row['St_date'];
$staddress=$row['St_address'];
$stcname=$row['C_name'];
$stg=$row['grade'];
$stmname=$row['M_name'];
}

if(isset($_POST['update'])){

     $st_name=$_POST['st_name'];
     $st_sex=$_POST['sex'];
     $st_date=$_POST['st_date'];
     $st_address=$_POST['st_address'];
     $st_class_id=$_POST['class_id'];
     $st_year=$_POST['year_id'];
     $year=$_POST['year'];
     $m_id=$_POST['m_id'];
     //=================================
     $c_select=mysqli_query($connect,"SELECT*FROM class where C_name='$st_class_id'");
     while($c_row=mysqli_fetch_array($c_select)){
          $cid=$c_row['C_id'];

     }
     /*  *******     */
     $g_select=mysqli_query($connect,"SELECT*FROM `grade` where `grade`='$st_year'");
     while($g_row=mysqli_fetch_array($g_select)){
      $gid=$g_row['g_id'];

     }/**********/
     $m_select=mysqli_query($connect,"SELECT*FROM `major` where `M_name`='$m_id'");
     while($m_row=mysqli_fetch_array($m_select)){
          $mid=$m_row['M_id'];

     }


     $update="UPDATE `students` SET `year`='$year',`St_name`='$st_name',`St_sex`='$st_sex',`St_date`='$st_date',
     `St_address`='$st_address',`m_id`='$mid',`C_id`='$cid',`G_id`='$gid' WHERE `St_id`='$id'";
                    if(mysqli_query($connect,$update)){
                         header("location:st_infor.php?update");
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
                                   
                                   <p><?=$stno?><?=$syear?></p> 
                                        
                                
                                      
                                        
                                  
                               </div>
                               <div class="form-group col-md-4">
                                    <label style="font-family: Noto Sans Lao;">ເພີມຊື່ນັກສຶກສາ</label>
                                    <input type="text" class="form-control" name="st_name" value="<?=$stname?>">
                               </div>
                               <div class="form-group col-md-2">
                                   <label style="font-family: Noto Sans Lao;">ເພດ</label>
                                   <select class="form-control" name="sex" id="" >
                                        <option value="<?=$ssex?>"><?=$ssex?></option>
                                        <option value="ຍີງ" style="font-family: Noto Sans Lao;">ເພດຍີງ</option>
                                        <option value="ຊາຍ" style="font-family: Noto Sans Lao;">ເພດຊາຍ</option>
                                   </select>
                               </div>
                               <div class="form-group col-md-4">
                                    <label style="font-family: Noto Sans Lao;">ວັນເດືອນປີເກີດ</label>
                                    <input type="date" class="form-control" name="st_date" value="<?=$stdate?>">
                               </div>
                               <div class="form-group col-md-4">
                                    <label style="font-family: Noto Sans Lao;">ທີ່ຢູ່</label>
                                    <input type="text" class="form-control" name="st_address"  value="<?=$staddress?>">
                               </div>
                               <div class="form-group col-md-2">
                                   <label style="font-family: Noto Sans Lao;">ສາຂາວິຊາ</label>
                                   <select class="form-control" name="m_id" id="">
                                        <option value="<?=$stmname?>"><?=$stmname?></option>

                                        <?php $m_select=mysqli_query($connect,"SELECT*FROM major");
                                             while($m_row=mysqli_fetch_assoc($m_select)){?>
                              
                                        <option value="<?=$m_row['M_name']?>"><?=$m_row['M_name']?></option>
                                        <?php }?>
                                   </select>
                               </div>
                               <div class="form-group col-md-2">
                                   <label style="font-family: Noto Sans Lao;">ຫ້ອງ</label>
                                   <select class="form-control" name="class_id" id="">
                                        <option value="<?=$stcname?>"><?=$stcname?></option>

                                        <?php $conn_select=mysqli_query($connect,"SELECT*FROM class");
                                             while($conn_row=mysqli_fetch_assoc($conn_select)){?>
                              
                                        <option value="<?=$conn_row['C_name']?>"><?=$conn_row['C_name']?></option>
                                        <?php }?>
                                   </select>
                               </div>
                               <div class="form-group col-md-2">
                                   <label style="font-family: Noto Sans Lao;">ປີທີ</label>
                                   <select class="form-control" name="year_id" id="">
                                        <option value="<?=$stg?>"><?=$stg?></option>
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
                                        <option value="<?=$syear?>"><?=$syear?></option>
                                        <option value="20">2020</option>
                                        <option value="21">2021</option>
                                        <option value="22">2022</option>
                                        <option value="23">2023</option>
                                        <option value="24">2024</option>
                                       
                                   </select>
                               </div>
                          </div>
                          <button type="submit" name="update" class="btn btn-success" style="font-family: Noto Sans Lao;">ແກ້ໄຂຂໍ້ມູນ</button>
                     </form>
                </div>
           </div>
           <!---code----->
        </div>
    </div>
    <?php 
     require 'inclu/footer.php';
     ?>
