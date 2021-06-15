<?php 
session_start();
require 'inclu/header.php';
require 'inclu/config.php';

    if(isset($_POST['login'])){
        
        $username=$_POST['username'];
        $password=$_POST['password'];
       
        $sql="SELECT * FROM `admin` WHERE `Username`='$username' and `Password`='$password'";

        $result=mysqli_query($connect,$sql);
        if(mysqli_num_rows($result)){
            $_SESSION['user_name']=$username;
            header("location:index.php");
        }else{
            echo '<script> alert("ຊື່ ແລະ ນາມສະກຸນຂອງທ່ານບໍຖືກຕ້ອງກະລຸນາກວດຄືນ !")</script>';
        }
        
    }

    ?>
            <div class="container-fluid">
            <div class="row justify-content-center ">
            <div class="col-12 col-s-8 col-md-4 mt-5">
                <style>
                    h1{
                        text-transform: uppercase; 
                        font-weight: 800;
                        color: black;
                        font-size: 1.5em;
                    }
                    .login-form{
                        position: absolute;
                        top: 15vh;
                        padding: 30px;
                        border-radius: 20px;
                        box-shadow: 0px 0px 10px 0px #000;
                    }
                
                </style>
                    <form method="post" class="login-form">
                    <div class="form-group" style="text-align: center;">
                    <h1>login</h1>
                        <label>Email address</label>
                        <input type="text" class="form-control" name="username" placeholder="Your email" required style="text-align: center;">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group" style="text-align: center;">
                        <label>Password</label>
                        <input type="password"  class="form-control" name="password" placeholder="*******" style="text-align: center;" required >
                    </div>
                    <button type="submit" name="login" class="btn btn-primary">Submit</button>
                    </form>
            </div>
            </div>
            </div>
<?php require 'inclu/footer.php';?>
