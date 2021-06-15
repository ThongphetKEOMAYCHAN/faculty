

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#"> <?=$_SESSION['user_name']?></a></li>
    <li class="breadcrumb-item"><a href="#">ຄະນະວິສະກຳສາດ</a></li>
                        
                        <?php 
                        $query=mysqli_query($connect,"SELECT * FROM `students` ");
                        $g=mysqli_num_rows($query);
                        ?>
    <li class="breadcrumb-item active" aria-current="page">ນັກສຶສາທັງຫມົດ: <?=$g?> ຄົນ</li>
  </ol>
</nav>


<main>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3 my-3">
                            <div class="bg-mattBlackLight px-3 py-3" style=" background:
                             linear-gradient(90deg, #3F2B96 0%, #A8C0FF 100%); color:white;">
                                <h4 class="mb-2">ປີ1</h4>

                        <?php 
                        $query1=mysqli_query($connect,"SELECT * FROM `students` WHERE `G_id`='1'");
                        $g1=mysqli_num_rows($query1);
                        ?>
                                <h5>ນັກສຶກສາທັງມົດ:<?=$g1?>ຄົນ</h5>

                            </div>
                        </div>
                        <div class="col-md-3 my-3">
                            <div class="bg-mattBlackLight px-3 py-3" style="background-color: #3EECAC;
                                                    background-image: linear-gradient(19deg, #3EECAC 0%, #EE74E1 100%);


                                        color:white;">
                                <h4 class="mb-2">ປີ2</h4>
                                <?php 
                        $query2=mysqli_query($connect,"SELECT * FROM `students` WHERE `G_id`='2'");
                        $g2=mysqli_num_rows($query2);
                        ?>
                                <h5>ນັກສຶກສາທັງມົດ:<?=$g1?>ຄົນ</h5>
                            </div>
                        </div>
                        <div class="col-md-3 my-3">
                            <div class="bg-mattBlackLight px-3 py-3" style=" background-color: #8EC5FC;
                                                            background-image: linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%); color:white;">
                                <h4 class="mb-2">ປີ3</h4>
                                <?php 
                        $query3=mysqli_query($connect,"SELECT * FROM `students` WHERE `G_id`='3'");
                        $g3=mysqli_num_rows($query3);
                        ?>
                                <h5>ນັກສຶກສາທັງມົດ:<?=$g1?>ຄົນ</h5>
                            </div>
                        </div>
                        <div class="col-md-3 my-3">
                            <div class="bg-mattBlackLight p-3" style="background-color: #4158D0;
                        background-image: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);
                        color:white;">
                                <h4 class="mb-2">ປີ4</h4>
                                <?php 
                        $query4=mysqli_query($connect,"SELECT * FROM `students` WHERE `G_id`='4'");
                        $g1=mysqli_num_rows($query4);
                        ?>
                                <h5>ນັກສຶກສາທັງມົດ:<?=$g1?>ຄົນ</h5>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </main>