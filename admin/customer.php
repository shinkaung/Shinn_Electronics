<?php
session_start();
if(!isset($_SESSION["userid"])){
 header("Location: login.php");
}else{
include('conn.php');
include 'theme/header.php';
include 'theme/sidebar.php';
?>

          <div class="card mb-3">
            <div class="card-header">
              <h2>Customer </h2>
           <!--    <a href="#" data-toggle="modal" data-target="#logoutModal5" class="btn btn-lg btn-info fas fa-plus"> Add New</a>  -->
            <div class="card-body">
              <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped"id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Customer Name</th>
                                        <th>Address</th>
                                        <th>Contact Number</th>
                                        <th>Email Address</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                $query = 'SELECT * FROM customer';
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));

                        while ($row = mysqli_fetch_assoc($result)) {


                            echo '<tr>';
                            echo '<td>'. $row['id'].'</td>';
                            echo '<td>'. $row['first_name']. ' '. $row['last_name'].'</td>';
                           // echo '<td>'. .'</td>';
                            echo '<td>'. $row['address'].'</td>';
                            echo '<td>'. $row['mobile'].'</td>';
                            echo '<td>'. $row['email'].'</td>';
                            echo '<td>  ';
                            echo ' <a  type="button" class="btn btn-lg btn-warning fas fa-user-tag" href="customerdetail.php?action=view & id='.$row['id'] . '"></a> ';

                            echo '</tr> ';
                }
            ?>

                                </tbody>
                            </table>
                        </div>
            </div>

          </div>


        </div>
        <!-- /.container-fluid -->

<?php include 'theme/footer.php'; }?>
