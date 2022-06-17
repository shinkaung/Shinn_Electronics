<?php
session_start();
if(!isset($_SESSION["userid"])){
 header("Location: login.php");
}else{
include('conn.php');
include 'theme/header.php';
include 'theme/sidebar.php';
?>
<style type="text/css">
  .error-msg{
  text-align: center;
  font-weight: bold;
}
</style>
      <div class="container">
      <div class="card card-register mx-auto mt-2">
        <div class="card-header">Add Category</div>
        <div class="card-body">
<form role="form" method="post" action="categorycontroller.php?action=add">
           <?php
          if (isset($_GET['required'])) {
            if ($_GET["required"]=="category") {
              echo '<p class="error-msg text-danger">Category is required!</p>';
            }elseif ($_GET["required"]=="categorytaken") {
               echo '<p class="error-msg text-danger">Category name is already taken.</p>';
            }
          }      ?>
                            <div class="form-group">
                              <input class="form-control" type="text" placeholder="Category" name="category">
                            </div>
                            <button type="submit" name="submit" class="btn btn-info">Save Record</button>
                            <button type="reset" class="btn btn-danger">Clear Entry</button>
                      </form>
                    </div>
                </div>
                </div>
<!-- <script src="vendor/jquery/jquery.js"></script>
<script type="text/javascript">
  $(document).ready(function(e){
    $('input').change(function(){
      var toplam=0;
      $('input[id=price]').each(function(){
        toplam = toplam + parseInt($(this).val());
      })
      $('input[id=sale]').val(toplam);
    });

  });
</script> -->
           <!--footer area-->
<?php include 'theme/footer.php'; }?>
