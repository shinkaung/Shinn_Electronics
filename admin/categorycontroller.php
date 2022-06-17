<?php
    // The same dapat ang input name sa Add kag Update.....WHAT THE MEN!!!
     include('conn.php');
     if (isset($_POST['submit'])) {

		if ($_GET['action'] == 'add') {
		$category = $_POST['category'];

		$result = mysqli_query($db, "SELECT * FROM `category` WHERE name = '".$category."'");
		$checkprod = mysqli_num_rows($result);
			if ($checkprod > 0) {
          header("Location: categoryadd.php?required=categorytaken");
      }elseif ($category == "") {
          header("Location: categoryadd.php?required=category");
      }else{
        $query = "INSERT INTO `category`(`name`, `created_date`, `modified_date`) VALUES ('".$category."', now(),now())";
				mysqli_query($db,$query)or die (mysqli_error($db));
				?>
				<script type="text/javascript">
				alert("Successfully added.");
				window.location = "category.php";
				</script>
				<?php
		}
		}
    if ($_GET['action'] == 'update') {
		$category = $_POST['category'];
		$id = $_POST['id'];
			if ($category == "") {
              header("Location: categoryupdate.php?required=category&id=".$id."");
      }else{
            	$query = 'UPDATE category set name ="'.$category.'" WHERE id ="'.$id.'"';
				mysqli_query($db, $query) or die(mysqli_error($db));

					?>
				<script type="text/javascript">
				alert("Update successfully.");
				window.location = "category.php";
				</script>
				<?php
		}
		}
		}
?>
