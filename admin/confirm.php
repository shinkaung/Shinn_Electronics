<?php
include('conn.php');

if (isset($_GET['cancel'])) {
	mysqli_query($db, "UPDATE `order` SET status = 'Cancelled', remark = 'Your order has been cancelled <br>
	 due to lack of communication <br> and incomplete informatio!' WHERE `id`='".$_GET['cancel']."'")or die(mysqli_error($db));
}
elseif (isset($_GET['confirm'])) {
	mysqli_query($db, "UPDATE `order` SET status = 'Confirmed', remark = 'Your order has been confirmed!' WHERE `id`='".$_GET['confirm']."'")or die(mysqli_error($db));
}
 ?>
 <script type="text/javascript">
			alert("Transaction Updated.");
			window.location = "detail.php";
		</script>
