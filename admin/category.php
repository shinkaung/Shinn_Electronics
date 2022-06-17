<?php
session_start();
if(!isset($_SESSION["userid"])){
 header("Location: login.php");
}else{
  include('conn.php');
  include 'theme/header.php';
  include 'theme/sidebar.php';
?>
<!-- Product Tables -->

<div class="card mb-3">
  <div class="card-header">
      <h3>Category <a href="categoryadd.php" type="button" class="btn btn-info fas fa-plus"> Add New</a></h3>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID.</th>
                      <th>Name</th>
                      <th>Update</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $query = 'SELECT `id`, `name` FROM `category`';
                      $result = mysqli_query($db, $query) or die (mysqli_error($db));

                      while ($row = mysqli_fetch_assoc($result)) {

                          echo '<tr>';
                          echo '<td>'. $row['id'].'</td>';
                          echo '<td> '.$row['name'].'</td>';
                          echo '<td>  ';
                          echo '<a title="Update Category" type="button" class="btn btn-lg btn-warning fas fa-user-tag" href="categoryupdate.php?action=view & id='.$row['id'] . '"></a> ';
                          echo '</tr> ';
                      }
                    ?>
                    </tbody>
                  </table>
              </div>
            </div>
          </div>
        </div>
      </div>

        <!-- /.container-fluid -->

<!--footer area-->
<?php include 'theme/footer.php'; }?>
