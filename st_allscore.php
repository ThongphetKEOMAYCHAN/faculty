<?php 

session_start();
require 'inclu/header.php';
require 'inclu/navbar.php';
require 'inclu/config.php';
if(!isset($_SESSION['user_name'])){
    header("location:login.php");// if ! have information
     
}
     $c=$_SESSION['c'];
     $g=$_GET['g'];
     $c_select=mysqli_query($connect,"SELECT*FROM class1 WHERE C_id='$c'");
     while($c_row=mysqli_fetch_assoc($c_select)){
          $c_name=$c_row['C_name'];
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
           <div class="card" style="width:1200px">
                <div class="card-body">
                    <div class="d-flex justify-content-around" style="color: #0000ff;">
                    
                    <h5>ປີ: <span style="color: red;"><?=$g?></span></h5>
                    <h5>ຫ້ອງ: <span style="color: red;"><?=$c_name?></span></h5>
                    </div>
                     <table class="table table-success table-striped" id="table">
                         <thead>
                              <tr>
                                   <th>ລະຫັດນັກສືກສາ</th>
                                   <th>ຊື່ ແລະ ນາມສະກຸນ</th>
                                   <th>ເພດ</th>
                                   <th>ສາຂາວິຊາ</th>
                                   <th>ຄະແນນ</th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php
                              
                              $select="SELECT*FROM `Students` as st
                              INNER JOIN class1 as c ON st.C_id=c.C_id
                              INNER JOIN grade as g ON st.G_id=g.g_id
                              INNER JOIN major as m ON st.m_id=m.M_id
                              where c.C_id='$c' AND g.grade='$g'"; 
                              $result=mysqli_query($connect,$select);
                              while($row=mysqli_fetch_assoc($result)){
                                   $_SESSION['st_no']=$row['St_no'];
                              
                              ?>
                              <tr>
                                   <td><?=$row['St_no']?></td>
                                   <td><?=$row['St_name']?></td>
                                   <td><?=$row['St_sex']?></td>
                                   <td><?=$row['M_name']?></td>
                                  
                                  
                                   <td class="btn btn-success btn-sm" >
                                   <a href="person_score.php?st_no=<?=$_SESSION['st_no']?>" style="color:white">ຄະແນນ</a></td>
                              </tr> 
                              <?php }?>
                         </tbody>
                        
                     </table>
                </div>
           </div>
           </div>
           <!---code----->
        </div>
    </div>
    <?php 
     require 'inclu/footer.php';
     ?>
<script>
    $(document).ready(function() {
    $('#table').DataTable();
} );
</script>