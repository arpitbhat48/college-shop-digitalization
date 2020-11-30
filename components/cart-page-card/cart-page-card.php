<link rel="stylesheet" href="./components/cart-page-card/cart-page-card.css">

<?php

function cart_page_card($title, $cost, $id) {
	echo "
	<div class=\"cart-card\">
		<div class=\"cart-card-img\">
			<img src=\"https://via.placeholder.com/200x100\" alt=\"placeholder\">
		</div>
		<div class=\"cart-card-content\">
			<div class=\"cart-card-title\">
				$title
			</div>
			<div class=\"cart-card-cost\">
				₹ $cost
			</div>
			<a class=\"cart-card-remove\" href='./cart-functions/remove_item.php?id=$id'><button>✕</button></a>
		</div>
	</div>
	";
}

?>