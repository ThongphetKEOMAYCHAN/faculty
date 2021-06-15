   <!--navbar--->
   <nav class="navbar navbar-expand-lg navbar-dark bg-mattBlackLight fixed-top  mt-2">
        <button class="navbar-toggler sideMenuToggler" type="button">
        <i class="fa fa-bars" aria-hidden="true" style="color: black;"></i>
      </button>

        <a class="navbar-brand" href="#" style="width: 11rem; color:black">FrontEndFunn</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars" aria-hidden="true" style="color: black;"></i>
      </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="form-inline  my-lg-7" >
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle p-0" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user" aria-hidden="true" style="color: black"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="profiles.php">Profiles</a>
                        <a class="dropdown-item" href="change_pass.php">Change password</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fa fa-ban" aria-hidden="true" title="logout" style="color:red;"  ></i> &nbsp; logout </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

<!-- Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h5 style="text-align:center;">You want to exit? </h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <form method="post" action="">
        <button type="submit" name="exit" class="btn btn-primary btn-sm">YES</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php 
if(isset($_POST['exit'])){
    header("location:logout.php");
}
?>
