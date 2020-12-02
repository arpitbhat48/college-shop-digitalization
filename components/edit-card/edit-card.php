<link rel="stylesheet" href="../components/shop-page-card/shop-page-card.css">

<?php

function edit_card($id, $title, $cost, $stock, $desc, $image)
{
    require("../db/db.php");
    $svg = file_get_contents("../components/shop-page-card/shopping-cart.svg");
	echo "
	<form method=\"POST\">
        <div class=\"shop-card\">
			<div class=\"shop-card-img\">
				<img src=$image alt=\"placeholder\">
			</div>

			<div class=\"shop-card-data\">
				<div class=\"shop-card-title-cost-avail\">
					<div class=\"shop-card-title-cost\">
						<div class=\"shop-card-title\">
							<!-- <input type=\"text\" value=".$title." name=\"title\"> -->
							<textarea cols=\"20\" rows=\"1\" name=\"title\">$title</textarea>
						</div>
						<div class=\"shop-card-cost\">
							₹<input type=\"text\" value=$cost name=\"cost\">
						</div>
					</div>
					<div class=\"shop-card-avail\">
						<input type=\"text\" value=$stock name=\"stock\">
					</div>
				</div>
				<div class=\"shop-card-desc-btn\">
					<div class=\"shop-card-desc\">
						<textarea cols=\"30\" rows=\"3\" name=\"description\">$desc</textarea>
					</div>
					<a href='../edit-functions/delete.php?id=$id' class=\"shop-card-btn\">
						<input type=\"button\" name=\"delete\" value=\"Delete\">
					</a>
						<input type=\"submit\" name=\"update$id\" value=\"Update\">
				</div>
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