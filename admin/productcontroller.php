<?php
    // The same dapat ang input name sa Add kag Update.....WHAT THE MEN!!!
     include('conn.php');
     if (isset($_POST['submit'])) {

		if ($_GET['action'] == 'add') {
		$product = $_POST['product'];
		$quantity = $_POST['quantity'];
		$price = $_POST['price'];
		$category = $_POST['category'];
    $description = $_POST['description'];
    $keywords = $_POST['keywords'];

    $image = $_FILES['image']['name'];
    $target = "images/".basename($image);

		$result = mysqli_query($db, "SELECT * FROM product WHERE name = '".$product."'");
		$checkprod = mysqli_num_rows($result);
			if ($checkprod > 0) {
              header("Location: productadd.php?required=producttaken");
            }elseif ($product == "") {
              header("Location: productadd.php?required=product");
            }elseif ($quantity == "" || $quantity < 0 ) {
              header("Location: productadd.php?required=quantity");
            }elseif ($price == "" || $price < 0 ) {
              header("Location: productadd.php?required=price");
            }elseif ($category == "") {
              header("Location: productadd.php?required=category");
            }else{
        $query = "INSERT INTO `product`(`name`, `description`, `quantity`, `price`, `image`, `keywords`, `cid`, `created_date`, `modified_date`)
                          VALUES ('".$product."','".$description."','".$quantity."','".$price."','".$image."','".$keywords."','".$category."',now(),now())";
				mysqli_query($db,$query)or die (mysqli_error($db));
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		      echo "Image uploaded successfully";
  	    }else{
  		      echo "Failed to upload image";
  	    }
				?>
				<script type="text/javascript">
				alert("Successfully added.");
				window.location = "product.php";
				</script>
				<?php
		}
		}
    if ($_GET['action'] == 'update') {
		$product = $_POST['product'];
		$price = $_POST['price'];
		$category = $_POST['category'];
		$id = $_POST['id'];
			if ($product == "") {
              header("Location: productupdate.php?required=product&id=".$id."");
            }elseif ($price == "" || $price < 0 ) {
              header("Location: productupdate.php?required=price&id=".$id."");
            }elseif ($category == "") {
              header("Location: productupdate.php?required=category&id=".$id."");
            }else{
            	$query = 'UPDATE product set name ="'.$product.'", price="'.$price.'", `cid`="'.$category.'"  WHERE id ="'.$id.'"';
				mysqli_query($db, $query) or die(mysqli_error($db));

					?>
				<script type="text/javascript">
				alert("Update successfully.");
				window.location = "product.php";
				</script>
				<?php
		}
		}if ($_GET['action'] == 'updatequantity') {
		$quantity = $_POST['quantity'];
			$id = $_POST['id'];
			if (empty($quantity) || $quantity < 0) {
				header("Location: updatequantity.php?required=quant&id=".$id."");
			}else{
				$sql = 'UPDATE product set quantity = "'.$quantity.'" WHERE id ="'.$id.'"';
				mysqli_query($db, $sql) or die(mysqli_error($db));
				?>
				<script type="text/javascript">
				alert("Update successfully.");
				window.location = "product.php";
				</script>
				<?php
			}
		}
		}
				?>
