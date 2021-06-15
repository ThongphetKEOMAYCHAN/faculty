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
           <a href="st_add.php" class="btn btn-primary" style="font-family: Noto Sans Lao;">ເພີມຂໍ້ມູນນັກສຶກສາ</a>
            <div class="card">
                <table class="table table-striped table-hover" id="table">
                        <thead>
                            <tr>
                            <th  style="font-family: Noto Sans Lao;">ລະຫັດນັກສຶກສາ</th>
                            <th  style="font-family: Noto Sans Lao;">ຊື່ ແລະ ນາມສະກຸນ</th>
                            <th  style="font-family: Noto Sans Lao;">ເພດ</th>
                            <th  style="font-family: Noto Sans Lao;">ວັນ.ເດືອນ.ປີເກີດ</th>
                            <th  style="font-family: Noto Sans Lao;">ທີ່ຢູ່</th>
                            <th  style="font-family: Noto Sans Lao;">ຫ້ອງ</th>
                            <th  style="font-family: Noto Sans Lao;">ປີ</th>
                            <th  style="font-family: Noto Sans Lao;">ວັນທີບັນທືກຂໍ້ມູນ</th>
                            <th>action</th>
                            </tr>
                            
                        </thead>
                        <tbody>
                            <?php $select="SELECT*FROM `Students` as st
                            INNER JOIN class1 as c ON st.C_id=c.C_id

                            INNER JOIN  grade as g ON st.G_id=g.g_id
                            where g.grade='1'";
                            
                            //SELECT `St_id`, `St_no`, `year`, `St_name`, `St_sex`, `St_date`, `St_address`, `C_id`, `G_id`, `date` FROM `students` WHERE 1
                            $result=mysqli_query($connect,$select);
                            while($row=mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                                
                                <td><?=$row['St_no']?>/<?=$row['year']?></td>
                                <td><?=$row['St_name']?></td>
                                <td><?=$row['St_sex']?></td>
                                <td><?=$row['St_date']?></td>
                                <td><?=$row['St_address']?></td>
                                <td><?=$row['C_name']?></td>
                                <td><?=$row['grade']?></td>
                                <td><?=$row['date']?></td>
                                <td>
                                <a href="st_update.php?id=<?=$row['St_id']?>" class="btn btn-success btn-sm" title="update">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                <a href="inclu/delete.php?st_id=<?=$row['St_id']?>"
                                 onclick="return confirm('ທ່ານຕ້ອງການລົບແທ້ບໍ່?')" class="btn btn-danger btn-sm" title="delete">
                                 <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                 </td>
                            </tr>
                            <?php }?>
                        </tbody>
                </table>
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