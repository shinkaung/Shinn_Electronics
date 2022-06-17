
<?php include('conn.php');?>
<!--header area-->
<?php include 'theme/header.php'; ?>

<?php
$query = 'SELECT id,concat(first_name," ",last_name)as name, address, mobile, email FROM customer
              WHERE
              id ='.$_GET['id'];
            $result = mysqli_query($db, $query) or die(mysqli_error($db));
              while($row = mysqli_fetch_array($result))
              {

               $i = $row['name'];
               $d = $row['address'];
               $p = $row['mobile'];
               $e = $row['email'];


              }

              $id = $_GET['id'];

?>

               <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Customer Detail</div>
        <div class="card-body">

            <tr>
              <td align="center" width="20%"><b style="font-size: 30px">Customer Name: </b></td>
              <td align="center" width="20%">
                <a style="font-size: 24px"><?php echo $i; ?></a>
              </td>
            </tr>
        <br>
        <br>
         <tr>
               <td align="center" width="20%"><b style="font-size: 30px">Address: </b></td>
              <td align="center" width="20%">
                <a style="font-size: 24px"><?php echo $d; ?></a>
              </td>
            </tr>
        <br>
        <br>
         <tr>
               <td align="center" width="20%"><b style="font-size: 30px">Phone Number: </b></td>
              <td align="center" width="20%">
                <a style="font-size: 24px"><?php echo $p; ?></a>
              </td>
            </tr>
        <br>
        <br>
         <tr>

              <td align="center" width="20%"><b style="font-size: 30px">Email Address: </b></td>
              <td align="center" width="20%">
                <a style="font-size: 24px"><?php echo $e; ?></a>
              </td>
            </tr>
        <br>
        <br>
         <tr>


                    </div>
                    <a href="customer.php" class="btn btn-xs btn-warning"><i class="fas fa-sign-out-alt"></i>Back</a>
                </div>
              </div>
