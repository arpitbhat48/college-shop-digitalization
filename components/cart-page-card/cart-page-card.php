<link rel="stylesheet" href="./components/cart-page-card/cart-page-card.css">

<?php 

function cart_page_card($title, $cost) {
	echo "
	<div class=\"shop-card\">
		<div class=\"shop-card-img\">
			<img src=\"https://via.placeholder.com/300x200\" alt=\"placeholder\">
		</div>

		<div class=\"shop-card-data\">
			<div class=\"shop-card-title-cost-avail\">
				<div class=\"shop-card-title-cost\">
					<div class=\"shop-card-title\">
						$title
					</div>
					<div class=\"shop-card-cost\">
						₹$cost
					</div>
				</div>
			</div>
		</div>
	</div>
	";
}

?>