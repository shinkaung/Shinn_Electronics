<?php
session_start();
if(!isset($_SESSION["userid"])){
 header("Location: login.php");
}else{
include('conn.php');
include 'theme/header.php';
include 'theme/sidebar.php';

$query = "SELECT `order`.`id`, `status`, `order`.`created_date`, `customer`.`first_name`, `customer`.`last_name`, `customer`.`mobile`, `customer`.`address`  FROM `order`, `customer` WHERE `order`.`customer_id` = `customer`.`id` AND `order`.`id` =".$_GET['id'];
            $result = mysqli_query($db, $query) or die(mysqli_error($db));
              while($row = mysqli_fetch_array($result))
              {
                $stats = $row['status'];
                $name = $row['first_name'].' '. $row['last_name'];
                $contact = $row['mobile'];
                $address = $row['address'];
                $cd = $row['id'];
                $order_date = $row['created_date'];
              }

?>


 <div class="card">
            <div class="card-header">
            <div  style="margin-bottom: 30px">
            <h5>Order No.# : 0<?php echo $cd; ?></h5>
            <h5>Name : <?php echo $name; ?></h5>
            <h5>Contact : 0<?php echo $contact; ?></h5>
            <h5>Address : <?php echo $address; ?></h5>
          </div>
            <div class="card-body">
              <h4 style="color: blue">Order information</h4>
              <div class="table-responsive">
                            <table cellpadding="5" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Order Date</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 20px">
                                  <?php
                    $query = "SELECT `order_item`.`quantity`, `product`.`name`, `product`.`price` FROM `order_item`, `product` WHERE `order_item`.`product_id` = `product`.`id` AND `order_item`.`order_id` = ".$_GET['id'];
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                    $totalprice = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $totalprice += $row['price'] * $row['quantity'];
                            echo '<tr>';
                            echo '<td>'. $row['name'].'</td>';
                            echo '<td>'. $order_date.'</td>';
                            echo '<td>'. $row['quantity'].'</td>';
                            echo '<td>'. $row['price'].'</td>';
                            echo '<td>'. $row['price'] * $row['quantity'].'</td>';
                           echo '<td>  ';
                            /*echo '<center> <a  type="button" class="btn btn-lg btn-info fas fa-cart-plus" href="addtransacdetail.php?action=edit & id='.$row['transac_id'] . '"></a> </td></center>';*/
                            echo '</tr> ';
                }
            ?>

            <tr>
                                  <td colspan="4" align="right"><br><h5> Subtotal :</h5></td>
                                  <td ><br><h5><?php echo $totalprice; ?></h5></td>
                                </tr>
                                <tr>
                                  <td colspan="4" align="right"><h5> Delivery Fee :</h5></td>
                                  <td ><h5> 150</h5></td>
                                </tr>
                                  <tr>
                                  <td colspan="4" align="right"><h5> Total :</h5></td>
                                  <td ><h5> <?php echo $totalprice + 150; ?></h5></td>
                                </tr>


                                </tbody>
                            </table>
                          <?php
                        if ($stats=='Pending') {?>
                            <a title="Cancel" type="button" class="btn btn-xs btn-danger " onclick="return confirm('Do you want to cancel transaction?')" href="confirm.php?action=edit & cancel=<?php echo $cd; ?> "><i class="fas fa-minus-circle"></i>Cancel</a>
                            <a title="Confirm" type="button" class="btn btn-xs btn-info " onclick="return confirm('Do you want to confirm transaction?')" href="confirm.php?action=edit & confirm=<?php echo $cd; ?>"><i class="fas fa-check"></i>Confirm</a>
                             <a href="detail.php" class="btn btn-xs btn-warning"><i class="fas fa-sign-out-alt"></i>Back</a>
                            <?php
                          }elseif ($stats=='Confirmed') {?>
                               <a title="Cancel" type="button" class="btn btn-xs btn-danger " onclick="return confirm('Do you want to cancel transaction?')" href="confirm.php?action=edit & cancel=<?php echo $cd; ?> "><i class="fas fa-minus-circle"></i>Cancel</a>
                                <a href="detail.php" class="btn btn-xs btn-warning"><i class="fas fa-sign-out-alt"></i>Back</a>
                            <?php
                          }elseif ($stats=='Cancelled') {?>
                                <a title="Confirm" type="button" class="btn btn-xs btn-info " onclick="return confirm('Do you want to confirm transaction?')" href="confirm.php?action=edit & confirm=<?php echo $cd; ?>"><i class="fas fa-check"></i>Confirm</a>
                                 <a href="detail.php" class="btn btn-xs btn-warning"><i class="fas fa-sign-out-alt"></i>Back</a>
                             <?php
                             }
                            ?>




                        </div>
            </div>

          </div>



        </div><br>


        <?php include 'theme/footer.php'; }?>
