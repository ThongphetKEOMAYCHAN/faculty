<?php 

session_start();
require 'inclu/header.php';
require 'inclu/navbar.php';
require 'inclu/config.php';
if(!isset($_SESSION['user_name'])){
    header("location:login.php");// if ! have information
}

$msg="";
if(isset($_POST['save'])){
     $o_no=$_POST['o_no'];
     $oject_name=$_POST['oject_name'];
     $unit=$_POST['unit'];
     $check=mysqli_query($connect,"SELECT*FROM `object` WHERE `o_name`='$oject_name'");
     if(mysqli_num_rows($check)){
          $msg='<div class="alert alert-primary alert-dismissible fade show" role="alert">
          <strong style="font-family:Arial, Helvetica, sans-serif,Noto Sans Lao;">ຂໍ້ມູນຂອງທ່ານມີຢູ່ແລ້ວບໍສາມາດເພີມໄດ້!</strong> 
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>';
     }else{

     
          $insert="INSERT INTO `object`(`o_no`,`o_name`,`unit`) VALUES ('$o_no','$oject_name','$unit')";
          if(mysqli_query($connect,"$insert")){
          $msg='<div class="alert alert-primary alert-dismissible fade show" role="alert">
          <strong style="font-family:Arial, Helvetica, sans-serif,Noto Sans Lao;">ທ່ານເພີມຂໍ້ມູນສຳເລັດແລ້ວ !</strong> 
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>';
     }
}
}
     if(isset($_POST['update'])){
          $update_id=$_POST['update_id'];
          $o_no=$_POST['o_no'];
          $update_name=$_POST['update_name'];
          $unit=$_POST['unit'];

          $update="UPDATE `object` SET  `o_no`='$o_no', `o_name`='$update_name',`unit`='$unit' WHERE `o_id`=' $update_id'";
          $query=mysqli_query($connect,$update);
               if($query){
                    $msg='<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong style="font-family:Arial, Helvetica, sans-serif,Noto Sans Lao;">ທ່ານໄດ້ແກ້ໄຂຂໍ້ມູນສຳເລັດແລ້ວ !</strong> 
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>';
          }
     }
     if(isset($_POST['delete'])){
          $delete_id=$_POST['delete_id'];
          $delete_obj=mysqli_query($connect,"DELETE FROM `object` WHERE `o_id`='$delete_id'");
          if($delete_obj){
               $msg='<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong style="font-family:Arial, Helvetica, sans-serif,Noto Sans Lao;">ທ່ານໄດ້ລົບຂໍ້ມູນສຳເລັດແລ້ວ !</strong> 
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>';
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
           <div class="container">
                <div class="card">
                <?php
                    if(!empty($msg)){
                    echo $msg;
                    }
                    ?>
                     <div class="card-body">
                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">add</button>
                          <table class="table">
                               <thead>
                               <tr>
                                    <th>id</th>
                                    <th style="font-family:Arial,Noto Sans Lao;">ລະຫັດວິຊາ</th>
                                    <th style="font-family:Arial,Noto Sans Lao;">ວີຊາ</th>
                                    <th style="font-family:Arial,Noto Sans Lao;">ໜ່ວຍກິດ</th>
                                    <th style="font-family:Arial,Noto Sans Lao;">ແກ້ໄຂຂໍ້ມູນ</th>
                                    <th style="font-family:Arial,Noto Sans Lao;">ລົບຂໍ້ມູນ</th>
                                    
                               </tr>
                               </thead>
                               <tbody>
                                    <?php
                                    $select=mysqli_query($connect, "SELECT*FROM `object`");
                                    while($row=mysqli_fetch_assoc($select)){

                                    ?>
                                    
                                    <tr>
                                         <td><?=$row['o_id']?></td>
                                         <td><?=$row['o_no']?></td>
                                         <td><?=$row['o_name']?></td>
                                         <td><?=$row['unit']?></td>
                                         <td><button type="button" class="btn btn-success btn-ms editbtn"  style="font-family:Arial,Noto Sans Lao;">ແກ້ໄຂ</button></td>
                                         <td><button type="button" class="btn btn-danger btn-ms deletetbtn"  style="font-family:Arial,Noto Sans Lao;">ລົບ</button></td>
                                    </tr>
                                    <?php }?>
                               </tbody>
                          </table>
                     </div>
                </div>
           </div>
           <!---------add dmodal start------------>
           <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog">
               <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"  style="font-family:Arial,Noto Sans Lao;">ເພີມວິຊາ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                    </button>
                    </div>

                    <form action="" method="post">
                    <div class="modal-body">
                    <div class="form-group">
                         <input type="text" name="o_no" class="form-control" style="font-family:Arial,Noto Sans Lao;" placeholder="ເພີມລະຫັດວິຊາ">
                         </div>
                         <div class="form-group">
                         <input type="text" name="oject_name" class="form-control" style="font-family:Arial,Noto Sans Lao;" placeholder="ເພີມວິຊາ">
                         </div>
                         <div class="form-group">
                         <input type="text" name="unit" class="form-control"  style="font-family:Arial,Noto Sans Lao;" placeholder="ເພີມໜ່ວຍກິດ">
                         </div>
                    </div>
                    <div class="modal-footer">
                    <button type="submit" name="save" class="btn btn-primary">Save</button>
                    </div>
                    </form>

               </div>
               </div>
          </div>
           <!---------ad dmodal------------>
            <!---------update modal start------------>
            <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog">
               <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="font-family: Noto Sans Lao;">ແກ້ໄຂຫ້ອງ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                    </button>
                    </div>

                    <form action="" method="post">
                    <div class="modal-body">
                         <input type="hidden" name="update_id" id="update_id">
                         <div class="form-group">
                         <label  style="font-family:Arial,Noto Sans Lao;">ລະຫັດວິຊາ</label>
                         <input type="text" name="o_no" id="o_no" class="form-control">
                    </div>
                    <div class="form-group">
                         <label  style="font-family:Arial,Noto Sans Lao;">ວິຊາ</label>
                         <input type="text" name="update_name" id="update_name" class="form-control">
                    </div>
                    <div class="form-group">
                         <label  style="font-family:Arial,Noto Sans Lao;">ໜ່ວຍກິດ</label>
                         <input type="text" name="unit" id="unit" class="form-control">
                    </div>
                    </div>
                    <div class="modal-footer">
                    <button type="submit" name="update" class="btn btn-primary">update</button>
                    </div>
                    </form>

               </div>
               </div>
          </div>
           <!---------update modal end------------>
           <!------------delete modal start---------->
           <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog">
               <div class="modal-content">
               <form action="" method="post">
                    <div class="modal-body">
                    <input type="hidden" id="delete_id" name="delete_id">
                    <h5 style="color:red; text-align:center;">ທ່ານຕ້ອງການລົບແທ້ບໍ?</h5>
                    </div>
                    <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                    <button type="submit" name="delete" class="btn btn-primary">Yes</button>
                    </div>
                    </form>
               </div>
               </div>
               </div>
           <!------------delete modal end--------->
           <!---code----->
        </div>
    </div>
    <?php 
     require 'inclu/footer.php';
     ?>
     <script>
          $(document).ready(function(){
          $('.editbtn').on('click',function(){
          $('#updateModal').modal('show');

          $tr=$(this).closest('tr');
          var data=$tr.children("td").map(function(){
          return $(this).text();

          }).get();

          console.log(data);


          $('#update_id').val(data[0]);
          $('#o_no').val(data[1]);
          $('#update_name').val(data[2]);
          $('#unit').val(data[3]);



  });
});

     </script>
     <script>
          $(document).ready(function(){
               $(".deletetbtn").on('click',function(){
                    $('#deleteModal').modal('show');

                    $tr=$(this).closest('tr');
                    var data=$tr.children('td').map(function(){
                         return $(this). text();
                    }).get();
                    console.log(data);

                    $('#delete_id').val(data[0]);
                   
               });
          });
     </script>