<?php require 'header.php';?>
<?php

$sql = "SELECT u1.id,u1.name,u1.email,u1.password,u1.contact,u1.address,u1.parentUser_id, (select name from users where id=u1.parentUser_id)as parentName from users u1 WHERE id='$user_id'";
$result = $db->select($sql);

?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">SMART CODE</h1>

          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->


            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Users</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">15</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->


            <!-- Pending Requests Card Example -->
            <div class="col-xl-6 col-md-12 mb-4" style="float: right;">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Smart Codes</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">10</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>



          <!-- Content Row -->

          <div class="row" style="text-align: center; align-content: center;">

              <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-2">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" >
                  <h6 class="m-0 font-weight-bold text-primary">Refrence Link </h6>
                
                </div>
                <!-- Card Body -->
                <div class="card-body">
                
                <?php foreach ($result as $i=>$key) {?>
                  <center>
                  <div class="row">
                    <input type="text" value="http://localhost/smartlock/register.php?ref=<?php echo $key['id'];?>" id="myInput" tabindex='-1' aria-hidden='true' class='copyfrom' >
                    <p style="margin-top:20px">http://localhost/smartlock/register.php?ref=<?php echo $key['id'];?></p>
                    <button onclick="myFunction()" class="btn btn-sm btn-primary" style="margin:16px;height:30px">Copy text</button>
                  </div>
                  </center>
                  <style>
                    .copyfrom {
                        position: absolute;
                        left: -9999px;
                    }
                </style>
                  <script>
                  function myFunction() {
                    var copyText = document.getElementById("myInput");
                    copyText.select();
                    document.execCommand("copy");
                    alert("Copied the text: " + copyText.value);
                  }
                </script>
                <?php
                  }
                ?>
                </div>

              </div>
            </div>
            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" >
                  <h6 class="m-0 font-weight-bold text-primary">Your Smart Code </h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <center>
                    <?php foreach ($result as $key) {if ($key['id'] % 2 == 0) {?>
                    <img src="img/barcode.jpg" style="height: 50%; width: 50%;" />
                    <?php
} else {
    ?>
                    <img src="img/barcode1.jpg" style="height: 50%; width: 50%;" />

                        <?php
}
}?>
                    </center>
                  </div>
                </div>

              </div>
            </div>

            <!-- Pie Chart -->

          </div>

          <!-- Content Row -->

        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; SmartLock 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
