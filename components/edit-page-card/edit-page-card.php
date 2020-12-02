<link rel="stylesheet" href="../components/edit-page-card/edit-page-card.css">

<?php

function edit_card($id, $title, $cost, $stock, $desc, $image)
{
    require("../db/db.php");
	echo "
	<form class='edit-card' method=\"POST\">
		<div class='edit-img'>
			<img src=$image alt=\"placeholder\">
		</div>
		<div class='edit-title'>
			<span>Title</span>
			<textarea cols=\"20\" rows=\"1\" name=\"title\">$title</textarea>
		</div>
		<div class='edit-cost'>
			<span>Cost ₹</span>
			<input type=\"text\" value=$cost name=\"cost\">
		</div>
		<div class='edit-stock'>
			<span>Stock</span>
			<input type=\"text\" value=$stock name=\"stock\">
		</div>
		<div class='edit-desc'>
			<span>Description</span>
			<textarea cols=\"\" rows=\"\" name=\"description\">$desc</textarea>
		</div>
		<div class='edit-buttons'>
			<div class='edit-delete'>
				<a href='../edit-functions/delete.php?id=$id' class=\"shop-card-btn\">
					<input type=\"button\" name=\"delete\" value=\"Delete\">
				</a>
			</div>
			<div class='edit-update'>
				<input type=\"submit\" name=\"update$id\" value=\"Update\">
			</div>
		</div>
	</form>
	";

	if (isset($_POST["update$id"])) {
		$name = $_POST['title'];
		$cost = $_POST['cost'];
		$stock = $_POST['stock'];
		$desc = $_POST['description'];

		$sql = "UPDATE inventory
			SET item_name = '$name',
			cost = '$cost',
			stock = '$stock',
			description = '$desc'
			WHERE item_id = '$id'
		";

		// echo $sql;
		if (mysqli_query($con, $sql)) {
			echo "<script>window.open('../admin/insert.php','_self')</script>";
		} else {
			echo "<script>window.alert('Something went Wrong')</script>";
		}
	}
}

?>