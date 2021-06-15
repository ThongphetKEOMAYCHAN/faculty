<?php  
session_start();
require 'inclu/config.php';
require 'inclu/header.php';
require 'inclu/navbar.php';
if(!isset($_SESSION['user_name'])){
header("location:login.php");
}

$did="";
$update=false;
$msg="";
$uo_name="";
$u_term="";
$u_score="";
$id="";
$s_gpa="";
$s_gps="";
$check=mysqli_query($connect,"SELECT*FROM `score`");
while($ch_row=mysqli_fetch_assoc($check)){
    $ch_oid=$ch_row['o_id'];
}

$st_no=$_SESSION['st_no'];
date_default_timezone_set("Asia/Bangkok"); 
$date= date("Y-m-d h:i:sa");
/**************insert start************ */
require 'inclu/score_insert.php';
/******************insert end************** */
    /*********update*****/
require 'inclu/update.php';
    /******end************ */

    /*******delete start */
    if(isset($_POST['delete'])){
        $did=$_POST['update_id'];
        $delete=mysqli_query($connect,"DELETE FROM `score` WHERE S_id=$did");
        if($delete){
            $msg='deleted';
        }
    }
    /*****delete end */
?>

    <!---navbar---->
  <!------->
    <div class="wrapper d-flex">
<!---siderbar-->
<?php require 'inclu/siderbar.php'; ?>

<div class="content">
<?php require 'inclu/card.php';?>
<!-----code------>
<p style="color: red;"><?=$msg?></p>
<div class="justify-content-center">
<div class="card">
<div class="card-body">

    <form action="" class="row" method="post">
        <input type="hidden" name="id" value="<?=$id?>">
        <div class="col-md-2">
         <label for="">ລະຫັດນັນຮຽນ</label>
           <input type="text" name="st_no" class="form-control" value="<?=$st_no?>">
      </div>
      <div class="col-md-3">
        <label>ວີຊາ</label>
        <select class="form-control" name="o_name">
            <option value="<?=$uo_name?>"><?=$uo_name?></option>
            <?php $o_select=mysqli_query($connect,"SELECT*FROM `object`");
            while($o_row=mysqli_fetch_assoc($o_select)){?>
            <option value="<?=$o_row['o_name']?>"><?=$o_row['o_name']?></option>
            <?php }?>
        </select>
    </div>
    <div class="col-md-3">
        <label>ເທີມ</label>
        <select class="form-control" name="term">
            <option value="<?=$u_term?>"><?=$u_term?></option>
            <?php $t_select=mysqli_query($connect,"SELECT*FROM `term`");
            while($t_row=mysqli_fetch_assoc($t_select)){?>
            <option value="<?=$t_row['term']?>"><?=$t_row['term']?></option>
            <?php }?>
        </select>
    </div>

    <div class="col-md-3">
         <label for="">ຄະແນນ</label>
           <input type="text" name="score" class="form-control" placeholder="" require="" value="<?=$u_score?>">
    </div>
    
    <div class="col-md-1 mt-4">
    <?php if($update==false){ ?>


        <button type="submit" name="insert" class="btn btn-primary">ເພີມ</button>
        <?php }else {?>
        <button type="submit" name="update" class="btn btn-info">ບັນທືກ</button>
        <?php }?>
      </div>
    </form>
</div>
</div>
<div class="justify-content-center">
<style>
.search{
    color: #fff;
    font-size: 18px;
    width: 100px;
    background-color: grey;
}
</style>
<form action="" method="post" class="mt-5">
    <select name="t_search" class="search" id="" style="width: 120px;">
  
    <option value="">all</option>
    <?php $t_select=mysqli_query($connect,"SELECT*FROM `term`");
            while($t_row=mysqli_fetch_assoc($t_select)){?>
            <option value="<?=$t_row['term']?>"><?=$t_row['term']?></option>
          <?php }?> 
           
    </select>
    <button type="submit" style="background-color:#fff;" name="search">Search</button>
</form>
<div class="card" style="width: 1450px; ">



    <table class="table" id="table">
            <thead class="table-light">
                <tr>
                    <th>ລະຫັດວິຊາ</th>
                    <th>ວິຊາ</th>
                    <th>ໜ່ວຍກິດ</th>
                    <th>ຄ່າລຳດັບ</th>
                    <th>ລຳດັບ</th>
                    <th>ເທີມ</th>
                    <th>ແກ້ໄຂ</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php
                if(isset($_POST['search'])){
                    $t_search=$_POST['t_search'];

                    $select="SELECT*FROM score as sc 
                    INNER JOIN `object` as ob ON sc.o_id=ob.o_id
                    where sc.st_no='$st_no' AND sc.term LIKE '%" .$t_search."%' ";
                    $result=mysqli_query($connect,$select);

                   /******************unit_total */
                  
                   $gp_select=mysqli_query($connect,"SELECT * FROM `gpa_table` WHERE `term`='$t_search' and `g_st_no`='$st_no'");
                   while($gp_row=mysqli_fetch_assoc($gp_select)){
                       $s_gpa=$gp_row['gpa'];
                       $s_gps=$gp_row['gps'];
                   }
                  
                }else{
                    $select="SELECT*FROM score as sc 
                    INNER JOIN `object` as ob ON sc.o_id=ob.o_id
                    where sc.st_no='$st_no'";
                    $result=mysqli_query($connect,$select);
                }

                    while($row=mysqli_fetch_assoc($result)){ 
               
            ?>

                <tr>
                    <td><?=$row['o_no']?></td>
                    <td><?=$row['o_name']?></td>
                    <td><?=$row['unit']?></td> 
                    <td><?=$row['lavel_no']?></td>                          
                    <td><?=$row['level']?></td>    
                    <td><?=$row['term']?></td>
                    <td><form action="" method="post"> 

                    <input type="hidden" name="update_id" value="<?=$row['S_id']?>">

                    <button type="submit" class="btn btn-success btn-sm " name="edit">    <i class="fa fa-pencil" aria-hidden="true"></i></button>

                    <button type="submit" class="btn btn-danger btn-sm" name="delete" onclick="return confirm(' ທ່ານຕ້ອງການລົບແທ້ບໍ?')"">   <i class="fa fa-trash-o" aria-hidden="true"></i></button>
                    </form></td>
                </tr>
                <?php }?>
            </tbody>
    </table>
    <span>ຄສສ=<?=$s_gpa?></span>
    <span>ຄສພ=<?=$s_gps?></span>
</div>
</div>
</div>
</div>
<!------code----->
            
        </div>
    </div>

<?php require 'inclu/footer.php' ?>
<!-- Button trigger modal --> 
<script>
    $(document).ready(function() {
    $('#table').DataTable();
} );
</script>