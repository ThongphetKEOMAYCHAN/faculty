<?php 

session_start();
require 'inclu/header.php';
require 'inclu/navbar.php';

if(!isset($_SESSION['user_name'])){
    header("location:login.php");// if ! have information
}
            require 'inclu/config.php';

            $msg="";
    if(isset($_POST['insert'])){
        $c_name=$_POST['class_name'];
        
        foreach($c_name as $key=>$value){
            $select=mysqli_query($connect,"SELECT*FROM `class1` WHERE `C_name`='$value'");
            if(mysqli_num_rows($select)){
               
               header("location:index.php?haveid");
            }else{
    
            $insert="INSERT INTO `class1`(`C_name`) VALUES ('".$value."')";
            $result=mysqli_query($connect,$insert);
        
        }
    }
        
    
    }
    if(isset($_POST['update'])){
        //exit("index.php");
        $id=$_POST['update_id'];
        $c_name=$_POST['c_no'];
        $update="UPDATE `class1` SET `C_name`='$c_name' WHERE `C_id`='$id'";
        $query=mysqli_query($connect,$update);
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
                <div class="row">
                    <div class="col-sm-4">
                      <div class="card">
                        <div class="card-body">
                        <form method="post">
                        <table class="table table-borderless" id="table_class">
                           <tr>
                               <th style="font-family: Noto Sans Lao;">ຫ້ອງ</th>
                           </tr>
                            <tr>
                                <td style="font-family: Noto Sans Lao;">
                                <input type="text" class="form-control" name="class_name[]" placeholder="ຫ້ອງ" required></td>
                                <td><input type="button" name="add" id="add" class="btn btn-primary btn-sm" value="+"></td>
                            </tr>   
                            </table>
                            <div class="text-right">
                            <button type="submit" name="insert" class="btn btn-success btn-sm" style="font-family: Noto Sans Lao;">ບັນທືກ</button>
                            </div>
                            
                            </form>
                             
                        </div> </div>
                    </div>
                    <div class="col-sm-8">
                      <div class="card">
                          <?php
                          if(isset($_GET['deleted'])){
                              $msg="ທ່ານລົບຂໍ້ມູນສຳເລັດແລ້ວ !.";

                          }
                          
                          ?>
                         <p style="color: red;"><?=$msg?></p>
                          <div class="text-center">
                          <h2 style="font-family: Noto Sans Lao; color:black">ຫ້ອງທັງຫມົດ</h2>
                          </div>
                         
                        <div class="card-body">
                       <table class="table" id="table">
                           <thead>
                               <tr>
                               <th style="font-family: Noto Sans Lao;">ລຳດັບ</th>
                               <th style="font-family: Noto Sans Lao;">ຫ້ອງ</th>
                               <th style="font-family: Noto Sans Lao;">ແກ້ໄຂຂໍ້ມູນ</th>
                               <th style="font-family: Noto Sans Lao;">ລົບຂໍ້ມູນ</th>
                               </tr>
                           </thead>
                           <tbody >

                           <?php 
                           $sql=mysqli_query($connect,"SELECT*FROM class1");
                           while($row=mysqli_fetch_assoc($sql)){

                           
                           ?>
                                <tr>
                                    <td><?=$row['C_id']?></td>
                                    <td style="font-family:Arial, Helvetica, sans-serif,Noto Sans Lao;"><?=$row['C_name']?></td>  <!----ສະແດງຄ່າໃນຖານຂໍ້ມູນ--->
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm btnedit"  style="font-family: Noto Sans Lao;">
                                            ແກ້ໄຂ
                                        </button>
                                    </td>
                                    <td><a href="inclu/delete.php?c_id=<?=$row['C_id']?>" onclick="return confirm('ທ່ານຕ້ອງການລົບແທ້ບໍ່?')" class="btn btn-danger btn-sm"  style="font-family: Noto Sans Lao;">ລົບ</a></td>
                                </tr>
                        <?php }?>
                           </tbody> 
                       </table>
                       
                             
                        </div> </div>
                    </div>
                </div>
                    
            </div>
            </div>
           <!--  modal---->
                        <!-- Button trigger modal -->
            
                <!-- Modal -->
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                
                                <input type="hidden" name="update_id" id="update_id">
                            <div class="form-group">
                                <label for="" style="font-family: Noto Sans Lao;">ຫ້ອງ</label>
                                <input type="text" class="form-control" name="c_no" id="c_no">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="update" class="btn btn-primary" style="font-family: Noto Sans Lao;">ບັນທືກ</button>
                        </div>
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


<script>
   $(document).ready(function(){
 var html='<tr><td style="font-family: Noto Sans Lao;"><input type="text" class="form-control" name="class_name[]" placeholder="ຫ້ອງ" required></td><td><input type="button" name="add" id="remove" class="btn btn-danger btn-sm" value="-"></td></tr>';
  
 $("#add").click(function(){
 $("#table_class").append(html)
 });
/*
 $("#table_class").on('click','#detele',function(){
      $(this).closest('tr').remove();
  });*/

  $("#table_class").on('click','#remove',function(){
      $(this).closest('tr').remove();
  });
});


</script>
<script>
    $(document).ready(function() {
    $('#table').DataTable();
});
</script>

<script>
    $(document).ready(function(){
        $('.btnedit').on('click',function(){

            $('#editModal').modal('show');

             $tr=$(this).closest('tr'); 
                var data=$tr.children('td').map(function(){ 
                return $(this).text();
                }).get();
                    console.log(data);
                    $('#update_id').val(data[0]);
                    $('#c_no').val(data[1]);

    });
    });
</script>