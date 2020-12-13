<?php
require("db/db.php");
require('./components/shop-page-card/shop-page-card.php');
$newCardCount = $_POST['cardCount'];


$result = mysqli_query($con, "SELECT * FROM inventory LIMIT $newCardCount");
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		if ($row["stock"] > 0) {
			shop_page_card(
				$row["item_id"],
				$row["item_name"],
				$row["cost"],
				$row["stock"],
				$row["description"],
				'data:image/jpeg;base64,' . base64_encode($row["image"])
			);
		}
	}
} else {
	echo "No products available";
}
