<?php

if(isset($_POST['edit'])){
    $update=true;
    $id=$_POST['update_id'];

    
    $u_select="SELECT*FROM score as sc 
    INNER JOIN `object` as ob ON sc.o_id=ob.o_id
    where sc.S_id='$id'";
    $u_result=mysqli_query($connect,$u_select);
    while($u_row=mysqli_fetch_assoc($u_result)){

        $uo_name=$u_row['o_name'];
        $u_term=$u_row['term'];
        $u_score=$u_row['Score'];
    }
}
/**************end */

/**********update********** */
if(isset($_POST['update'])){

    $update=true;
    $upd_id=$_POST['id'];
    $u_name=$_POST['o_name'];
    $u_tm=$_POST['term'];
    $u_sc=$_POST['score'];
    
    $upd_select=mysqli_query($connect,"SELECT*FROM `object` where o_name='$u_name'");
    while($upd_row=mysqli_fetch_assoc($upd_select)){
         $uo_id=$upd_row['o_id'];

    }       
if($u_sc>=85){
    $ld="A";
    $kld="4";
}elseif($u_sc>=80){
    $ld="B+";
    $kld="3.5";
}
elseif($u_sc>=75){
    $ld="B";
    $kld="3";
}
elseif($u_sc>=70){
    $ld="C+";
    $kld="2.5";
}
elseif($u_sc>=60){
    $ld="C";
    $kld="2.5";
}
elseif($u_sc>=50){
    $ld="D+";
    $kld="1.5";
}
elseif($u_sc>=40){
    $ld="D";
    $kld="1";
}
elseif($u_sc<=39){
    $ld="F";
    $kld="0";
}

$update="UPDATE `score` SET `o_id`='$uo_id',`term`='$u_tm',`lavel_no`='$kld',
                            `level`='$ld',`Score`='$u_sc',`date`='$date' WHERE `S_id`='$upd_id'";
$upd_result=mysqli_query($connect,$update);
if($update) {

    $select2="SELECT SUM(ob.unit) as unit_total, SUM(sc.lavel_no*ob.unit) as total FROM `score` as sc 
    INNER JOIN `object` as ob ON sc.o_id=ob.o_id
    WHERE sc.st_no='$st_no' AND sc.term='$u_tm'";

   $result2=mysqli_query($connect,$select2);
   while($row1=mysqli_fetch_assoc($result2)){ 
       $u_total=$row1['unit_total'];
       $total=$row1['total'];
       
   }    
    /************************************/

    $gpa=$total/$u_total;
    
    $gpa_update=mysqli_query($connect,"UPDATE `gpa_table` SET `term`='$u_tm',`unit_total`='$u_total',`total`='$total',`gpa`='$gpa' WHERE `g_st_no`='$st_no' and `term`='$u_tm'");
                                           if(mysqli_query($connect,"$gpa_update")){

                                           

    $gps_select=mysqli_query($connect,"SELECT SUM(gpa)/'$u_tm' as gps FROM `gpa_table` WHERE term BETWEEN 1 AND '$u_tm' and  `g_st_no`='$st_no'");
    while($gps_row=mysqli_fetch_assoc($gps_select)){
        $gps=$gps_row['gps'];

    }
    $gps_update=mysqli_query($connect,"UPDATE `gpa_table` SET `gps`='$gps' WHERE `g_st_no`='$st_no' and `term`='$u_tm'");
   
    header("location:person_score.php?ud");
        }
    }
}
if(isset($_GET['ud'])){
$msg="update";
}
 
?>