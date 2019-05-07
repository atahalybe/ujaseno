<?php require 'header.php'; ?>


<?php  
  
  $sql = "SELECT * FROM users WHERE id='$user_id'";
  $result = $db->select($sql);


  if(isset($_POST['submit'])){

    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $contact  = $_POST['contact'];
    $address  = $_POST['address'];

    $update_sql = "UPDATE users SET name='$name', email='$email', password='$password', contact='$contact', address='$address' WHERE id='$user_id'";
    $update_result = $db->query($update_sql);
    $result = $db->select($sql);

  }
  
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
    
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Update Information</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Your Information</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
             
             <?php foreach ($result as $key) {?>

                <form class="user" action="edit_detail.php" method="POST">
                    
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" value="<?php echo $key['name']; ?>" name="name" aria-describedby="emailHelp" placeholder="Name">
                    </div>

                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" value="<?php echo $key['email']; ?>" name="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email">
                    </div>

                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" value="<?php echo $key['password']; ?>" name="password" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Password">
                    </div>

                    <div class="form-group">
                      <input type="number" class="form-control form-control-user" value="<?php echo $key['contact']; ?>" name="contact" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Contact">
                    </div>

                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" value="<?php echo $key['address']; ?>" name="address" id="exampleInputPassword" placeholder="Address">
                    </div>
                    

                    <input type="submit" name="submit" value="Update" class="btn btn-success btn-user btn-block">
                  
                  </form>

                <?php } ?>


              </div>
            </div>
          </div>











        </div>





        <!-- /.container-fluid -->


      <!-- End of Main Content -->
<?php require 'footer.php'; ?>
