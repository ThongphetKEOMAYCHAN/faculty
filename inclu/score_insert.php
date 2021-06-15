<?php
if(isset($_POST['insert'])){
     $ist_no=$_POST['st_no'];
     $io_name=$_POST['o_name'];
     $iterm=$_POST['term'];
     $iscore=$_POST['score'];
     
    
     $o_select=mysqli_query($connect,"SELECT*FROM `object` where o_name='$io_name'");
     while($o_row=mysqli_fetch_assoc($o_select)){
          $o_id=$o_row['o_id'];
     }
     /*** */

     if($iscore>=85){
        $ld="A";
        $kld="4";
    }elseif($iscore>=80){
        $ld="B+";
        $kld="3.5";
    }
    elseif($iscore>=75){
        $ld="B";
        $kld="3";
    }
    elseif($iscore>=70){
        $ld="C+";
        $kld="2.5";
    }
    elseif($iscore>=60){
        $ld="C";
        $kld="2.5";
    }
    elseif($iscore>=50){
        $ld="D+";
        $kld="1.5";
    }
    elseif($iscore>=40){
        $ld="D";
        $kld="1";
    }
    elseif($iscore<=39){
        $ld="F";
        $kld="0";
    }
    
     /****** */
     if($ch_oid==$o_id){
         $msg='haved';
        
     }else{

       
        $insert="INSERT INTO `score`(`st_no`, `o_id`, `term`,`lavel_no`,`level`, `Score`, `date`) 
        VALUES ('$ist_no','$o_id','$iterm','$kld','$ld','$iscore','$date')";
        
        $insert_result=mysqli_query($connect,$insert);
        if($insert_result){

             /*******************  score ********************** */

             $select1="SELECT SUM(ob.unit) as unit_total, SUM(sc.lavel_no*ob.unit) as total FROM score as sc 
             INNER JOIN `object` as ob ON sc.o_id=ob.o_id
             where sc.st_no='$st_no' AND sc.term='$iterm'";
     
            $result1=mysqli_query($connect,$select1);
            while($row1=mysqli_fetch_assoc($result1)){ 
                $u_total=$row1['unit_total'];
                $total=$row1['total'];
                
            }    
             /*********************************** */

             $gpa=$total/$u_total;
             $check_gpa=mysqli_query($connect,"SELECT*FROM `gpa_table` where `g_st_no`='$st_no' and `term`='$iterm'");
             if(mysqli_num_rows($check_gpa)){

                $gpa_upd="UPDATE `gpa_table` SET `term`='$iterm',`unit_total`='$u_total',`total`='$total',`gpa`='$gpa' WHERE `g_st_no`='$st_no' and  `term`='$iterm'";
             
                if(mysqli_query($connect,$gpa_upd)){

                    $gps_select=mysqli_query($connect,"SELECT SUM(gpa)/'$iterm' as gps FROM `gpa_table` WHERE term BETWEEN 1 AND '$iterm' AND  `g_st_no`='$st_no'");
            while($gps_row=mysqli_fetch_assoc($gps_select)){
            $gps=$gps_row['gps'];

                }

                $gps_update=mysqli_query($connect,"UPDATE `gpa_table` SET `gps`='$gps' WHERE `g_st_no`='$st_no' and `term`='$iterm'");
            }
            }else{
            
               $gpa_insert="INSERT INTO `gpa_table`(`g_st_no`, `term`, `unit_total`, `total`, `gpa`) 
               VALUES ('$st_no','$iterm','$u_total','$total','$gpa')";
               
               if(mysqli_query($connect,$gpa_insert)){

           /* $gpa_update="UPDATE `gpa_table` SET `term`='$iterm',`unit_total`='$u_total',`total`=' $total',`gpa`='$gpa' WHERE `g_st_no`='$st_no' and `term`='$iterm'";*/

            $gps_select=mysqli_query($connect,"SELECT SUM(gpa)/'$iterm' as gps FROM `gpa_table` WHERE term BETWEEN 1 AND '$iterm' AND  `g_st_no`='$st_no'");
            while($gps_row=mysqli_fetch_assoc($gps_select)){
            $gps=$gps_row['gps'];

            }
            $gps_update=mysqli_query($connect,"UPDATE `gpa_table` SET `gps`='$gps' WHERE `g_st_no`='$st_no' and `term`='$iterm'");
             
         }    
         }
     } 
    } 
}
?>
