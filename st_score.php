<?php 

session_start();
require 'inclu/header.php';
require 'inclu/navbar.php';
require 'inclu/config.php';
if(!isset($_SESSION['user_name'])){
    header("location:login.php");// if ! have information
}


if(isset($_POST['search'])){

    $update_id=$_POST['update_id'];
    $year_id=$_POST['year_id'];
    
    if($year_id>=1){
      $_SESSION['c']=$update_id;
      header("location:st_allscore.php?g=$year_id");
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
           <div class="card"  style="width: 600px;">
                <div class="text-center">
                <h2>ຫ້ອງທັງຫມົດ</h2>
                </div>
                    <div class="card-body">
                    <table class="table" id="table">
                        <thead>
                            <tr>
                            <th>id</th>
                            <th>ຫ້ອງ</th>
                            <th>ຄົ້ນຫາຄະແນນ</th>
                            </tr>
                        </thead>
                       
                        <tbody>
                        <?php
                        $sql=mysqli_query($connect,"SELECT*FROM class1");
                        while($row=mysqli_fetch_assoc($sql)){
                        ?>
                            <tr>
                                <td><?=$row['C_id']?></td>
                                <td><?=$row['C_name']?></td>
                                <td><button type="button" class="btn btn-primary btn-sm btnscore">ຄົ້ນຫາ</button></td>
                            </tr>
                            <?php }?>
                        </tbody> <!-- tboby end-->
                        
                    </table> <!--table end-->

                    </div>
                </div> 
                </div>
          

   <!---code----->
        </div>
    </div>
    <?php 
     require 'inclu/footer.php';
     ?>
     <!-- Modal -->
      <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addscoreModal" style="font-family: Noto Sans Lao;">
  ເພີມຄະແນນ
</button>
     <div class="modal fade" id="scoreModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                            
                            <h3 class="modal-title" id="exampleModalLabel" style="font-family: Noto Sans Lao;">ແກ້ໄຂຂໍ້ມູນ</h3>
                            
                        <button type="submit" name="update" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="">
                        <div class="modal-body">
                                
                                <input type="hidden" name="update_id" id="score_id">
                                <div class="form-group">
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
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="search" class="btn btn-primary" style="font-family: Noto Sans Lao;">ຄົ້ນຫາ</button>
                        </div>
                    </form>
                    </div>
                </div>
                </div>
     <script>
    $(document).ready(function(){
        $('.btnscore').on('click',function(){

            $('#scoreModal').modal('show');

             $tr=$(this).closest('tr'); // 'tr' is from table
                var data=$tr.children('td').map(function(){ // 'td' is all tds from table
                return $(this).text(); // return all datas out
                }).get();
                    console.log(data);
                    $('#score_id').val(data[0]);
                  

    });
    });
</script>
<!-- Modal -->
<div class="modal fade" id="addscoreModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-family: Noto Sans Lao;">ເພີມຂໍ້ມູນ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="" method="post">
          <div class="modal-body">
            <div class="form-group">
              <label style="font-family: Noto Sans Lao;">ລະຫັດນັກສຶກສາ</label>
              <input type="text" name="st_no" style="font-family: Noto Sans Lao;" class="form-control" placeholder="ລະຫັດນັກສຶກສາ" require>
            </div>
            <div class="form-group">
                <label style="font-family: Noto Sans Lao;">ສາຂາວິຊາ</label>
                  <select class="form-control" name="m_name" id="">
                    <option value=""></option>

                  <?php $m_select=mysqli_query($connect,"SELECT*FROM `major`");
                  while($m_row=mysqli_fetch_assoc($m_select)){?>
                              
                  <option value="<?=$m_row['M_name']?>"><?=$m_row['M_name']?></option>
                  <?php }?>
                  </select>
            </div>
            <div class="form-group">
                <label style="font-family: Noto Sans Lao;">ເທີມ</label>
                  <select class="form-control" name="term" id="">
                    <option value=""></option>

                  <?php $t_select=mysqli_query($connect,"SELECT*FROM `term`");
                  while($t_row=mysqli_fetch_assoc($t_select)){?>
                              
                  <option value="<?=$t_row['term']?>"><?=$t_row['term']?></option>
                  <?php }?>
                  </select>
            </div>
            <div class="form-group">
                <label style="font-family: Noto Sans Lao;">ຄະແນນ</label>
                <input type="text" name="score"style="font-family: Noto Sans Lao;" placeholder="ຄະແນນ">
            </div>
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" name="insert" class="btn btn-primary">Save</button>
          </div>
      </form>
    </div>
  </div>
</div>
<script>
    $(document).ready(function() {
    $('#table').DataTable();
} );
</script>