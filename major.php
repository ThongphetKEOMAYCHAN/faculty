<?php  
//https://cssgradient.io/
session_start();
require 'inclu/header.php';
require 'inclu/navbar.php';
if(!isset($_SESSION['user_name'])){
header("location:login.php");
}
require 'inclu/config.php';

$msg="";

  //ການເພີມໂຄອັດຕາໂນມັດ====================
$select=mysqli_query($connect,"SELECT `M_no` FROM `major`");
while($show=mysqli_fetch_array($select)){
  $m_no1=$show['M_no'];
}if(empty($m_no1)){
  $m_no2="IT-0000001";
}else{
  $m_no3=str_replace("IT-","",$m_no1);
  $m_no4=str_pad( $m_no3 + 1, 7,0, STR_PAD_LEFT);
  $m_no2="IT-".$m_no4;

  ///  $mn=M_no 
}
//===================insert infor=======================

if(isset($_POST['save'])){
  $major=$_POST['major'];
  $check=mysqli_query($connect,"SELECT `M_name` FROM major where `M_name`='$major'");
  if(mysqli_num_rows($check)){
    $msg='<div class="alert alert-info alert-dismissible fade show" role="alert">
    <strong style="font-family:Arial, Helvetica, sans-serif,Noto Sans Lao;">ຂໍ້ມູນເກົ່າບໍ່ສາມາດເພີມໄດ້ອີກ !</strong>  
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }else{

  $insert="INSERT INTO `major`(`M_no`, `M_name`) VALUES ('$m_no2','$major')";
  if(mysqli_query($connect,$insert)){
    $msg='<div class="alert alert-primary alert-dismissible fade show" role="alert">
    <strong style="font-family:Arial, Helvetica, sans-serif,Noto Sans Lao;">ທ່ານໄດ້ເພີມຂໍ້ມູນສຳເລັດແລ້ວ !</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }
  }
} 
//===================insert end=======================
/*  =================      update code start       */

if(isset($_POST['update'])){
  $mid=$_POST['M_edit'];
  $edit=$_POST['edit_major'];

  $update="UPDATE `major` SET `M_name`='$edit' WHERE `M_id`='$mid'";
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

 /*    ==========uplate end =======        */
 // delete start ----------
 if(isset($_POST['delete'])){

  $mid=$_POST['m_id'];
  $m_delete=mysqli_query($connect,"DELETE FROM `major` WHERE M_id='$mid'");
  if($m_delete){
    $msg='<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong style="font-family:Arial, Helvetica, sans-serif,Noto Sans Lao;">ທ່ານລົບຂໍ້ມູນສຳເລັດແລ້ວ !</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>';
  }
}
?>



    <!---navbar---->
  <!------->
    <div class="wrapper d-flex">
<!---siderbar-->
<?php require 'inclu/siderbar.php'; ?>

        <div class="content">
<?php require 'inclu/card.php';?>
<!-----code------>

<nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="background-image: linear-gradient( 109.6deg,  rgba(48,207,208,1) 11.2%, rgba(51,8,103,1) 92.5% );">
        </ol>
    </nav> 
<div class="container" style="width: 80em;">
<div class="card">
<?php
if(!empty($msg)){
  echo $msg;
}
?>
  <div class="card-body">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  add
</button>
    <table class="table mt-3">
      <thead>
        <tr>
          <th>id</th>
          <th style="font-family: Noto Sans Lao;">ລະຫັດສາຂາວິຊາ</th>
          <th style="font-family: Noto Sans Lao;">ສາຂາວິຊາ</th>
          <th style="font-family: Noto Sans Lao;">ແກ້ໄຂສາຂາຮຽນ</th>
          <th style="font-family: Noto Sans Lao;">ລົບສາຂາຮຽນ</th>
        </tr>
      </thead>
      
      <tbody>
<?php 
$sql=mysqli_query($connect,"SELECT * FROM `major`");
while($row=mysqli_fetch_assoc($sql)){
?>
        <tr>
          <td><?=$row['M_id']?></td>
          <td><?=$row['M_no']?></td>
          <td><?=$row['M_name']?></td>
          <td><button type="button" class="btn btn-success btn-sm btnedit" style="font-family: Noto Sans Lao;">ອັບເດດ</button></td>
          <td><button type="button" class="btn btn-danger btn-sm btndelete" style="font-family: Noto Sans Lao;">ລົບ</button></td>
        </tr>
<?php }?>

      </tbody>
    </table>

  </div>
</div>

</div>

<!------code----->
            
        </div>
    </div>

    <!-- Button trigger modal -->


<!-- Modal add-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-family: Noto Sans Lao;">ເພີມສາຂາ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="" method="post">
      <div class="modal-body">
      <input type="text" name="major" class="form-control"style="font-family: Noto Sans Lao;" placeholder="ເພີມສາຂາວິຊາ.." required>
      </div>
      <div class="modal-footer">
        <button type="submit" name="save" class="btn btn-primary">Save</button>
      </div>
      </form>

    </div>
  </div>
</div>
<!-- Modal edit-->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-family: Noto Sand Lao;">ແກ້ໄຂ້ຂໍ້ມູນ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
      <div class="modal-body">
        <input type="hidden" name="M_edit" id="M_id">
      <input type="text" name="edit_major" id="edit_major" class="form-control">
      </div>
      <div class="modal-footer">
        <button type="submit" name="update" class="btn btn-primary">Save</button>
      </div>
      </form>

    </div>
  </div>
</div>
<!---- modal ---->
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form action="" method="post">
      <div class="modal-body">
         <input type="hidden" id="m_id" name="m_id">
         <h5 style="color:red; text-align:center;" style="font-family: Noto Sand Lao;">ທ່ານຕ້ອງການລົບແທ້ບໍ?</h5>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
        <button type="submit" name="delete" class="btn btn-primary">Yes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!---- modal ---->

<?php require 'inclu/footer.php' ?>
<script>

$(document).ready(function(){
$('.btnedit').on('click',function(){
  $('#editModal').modal('show');

$tr=$(this).closest('tr');
var data=$tr.children("td").map(function(){
return $(this).text();

}).get();

  console.log(data);


$('#M_id').val(data[0]);
$('#edit_major').val(data[2]);


  });
});

</script> 
<script>

$(document).ready(function(){
$('.btndelete').on('click',function(){
  $('#deleteModal').modal('show');

$tr=$(this).closest('tr');
var data=$tr.children("td").map(function(){
return $(this).text();

}).get();

  console.log(data);


$('#m_id').val(data[0]);
  });
});

</script> 

