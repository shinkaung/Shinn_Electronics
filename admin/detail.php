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
              <h2>Transaction</h2>
            <div class="card-body">
              <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Order No.#</th>
                                        <th>Customer</th>
                                        <th>Order Date</th>
                                        <th>Status</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                $query = "SELECT `order`.`id`, `status`, `order`.`created_date` as `order_date`, `customer`.`first_name`, `customer`.`last_name`  FROM `order`, `customer` WHERE `order`.`customer_id` = `customer`.`id` ";
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));

                        while ($row = mysqli_fetch_assoc($result)) {

                            echo '<tr>';
                            echo '<td>'. $row['id'].'</td>';
                            echo '<td>'. $row['first_name'].' '. $row['last_name'].'</td>';
                            echo '<td>'. $row['order_date'].'</td>';
                            echo '<td>'. $row['status'].'</td>';
                            echo '<td><a title="View list Of Ordered" type="button" class="btn-sm btn-primary" href="detailtransac.php?id='. $row['id'].'" >View </a></td>';

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
