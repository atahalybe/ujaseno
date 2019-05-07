<?php require 'header.php'; ?>


<?php  
  
  $sql = "SELECT u1.id,u1.name,u1.email,u1.password,u1.contact,u1.address,u1.parentUser_id, (select name from users where id=u1.parentUser_id)as parentName from users u1 WHERE id='$user_id' OR parentUser_id='$user_id'";
  $result = $db->select($sql);
  
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
    
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Information Page</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Users Data</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <!-- <th>Password</th> -->
                      <th>Contact</th>
                      <th>Address</th>
                      <th>Parent<th>
                    </tr>
                  </thead>
                  
                  <tbody>

                    <?php foreach ($result as $i=>$key) {?>
                    <tr>
                      <td><b><?php echo $key['name']; ?></b></td>
                      <td><?php echo $key['email']; ?></td>
                      <!-- <td><?php echo $key['password']; ?></td> -->
                      <td><?php echo $key['contact']; ?></td>
                      <td><?php echo $key['address']; ?></td>
                      <td><?php echo ($key['parentUser_id']==0)?"No Parent":$key['parentName'] ?></td>
                      <td>
                        <?php if($i==0){?>
                        <a href="edit_detail.php">
                          <button name="edit" class="btn btn-success"><i class="far fa-edit"></i> Edit</button>
                        </a>
                        <?php }?>
                      </td>
                    </tr>

                  <?php } ?>
                   

                  </tbody>
                </table>
              </div>
            </div>
          </div>











        </div>





        <!-- /.container-fluid -->


      <!-- End of Main Content -->
<?php require 'footer.php'; ?>
