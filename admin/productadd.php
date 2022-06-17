<?php
session_start();
if(!isset($_SESSION["userid"])){
 header("Location: login.php");
}else{
include('conn.php');
include 'theme/header.php';
include 'theme/sidebar.php';

$query = "SELECT * FROM category";
$result = mysqli_query($db,$query);

?>
<style type="text/css">
  .error-msg{
  text-align: center;
  font-weight: bold;
}
</style>
            <!-- Page Heading -->
            <div class="container">
      <div class="card card-register mx-auto mt-3">
      <div class="card-header"><center><h3>Add Product</h3></center></div>
      <div class="card-body">
  <form role="form" method="post" action="productcontroller.php?action=add" enctype="multipart/form-data">
    <?php
          if (isset($_GET['required'])) {
            if ($_GET["required"]=="product") {
              echo '<p class="error-msg text-danger">Product name is required</p>';
            }elseif ($_GET["required"]=="quantity") {
               echo '<p class="error-msg text-danger">Invalid quantity</p>';
            }elseif ($_GET["required"]=="price") {
               echo '<p class="error-msg text-danger">Invalid price</p>';
            }elseif ($_GET["required"]=="category") {
               echo '<p class="error-msg text-danger">Category is required</p>';
            }elseif ($_GET["required"]=="producttaken") {
               echo '<p class="error-msg text-danger">Product name is already taken.</p>';
            }elseif ($_GET["required"]=="image") {
             echo '<p class="error-msg text-danger">Image is required</p>';
            }
          }      ?>
                            <div class="form-group">
                              <input class="form-control" placeholder="Product Name" name="product" autofocus="autofocus">
                            </div>
                            <div class="form-group">
                              <input type="number" class="form-control" placeholder="Quantity" name="quantity">
                            </div>
                            <div class="form-group">
                              <input class="form-control" type="number" id="price" placeholder="Price" name="price">
                            </div>
                            <div class="form-group">
                              <input class="form-control" placeholder="Description" name="description">
                            </div>
                            <div class="form-group">
                              <input class="form-control" placeholder="Keywords" name="keywords">
                            </div>
                            <div class="form-group">
                              <select class="form-control" name="category">
                                <option selected disabled>Category</option>
                                <?php while($row = mysqli_fetch_array($result)):; ?>
                              <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
                              <?php endwhile; ?>
                              </select>
                            </div>

                            <div class="form-group">
                              <input class="form-control" type="file" name="image">
                            </div>

                            <button type="submit" name="submit" class="btn btn-info">Save Record</button>
                            <button type="reset" class="btn btn-danger">Clear Entry</button>
                      </form>
                       </div>
                </div>
              </div>
<!--footer area-->
<?php include 'theme/footer.php'; }?>
