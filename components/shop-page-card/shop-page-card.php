<link rel="stylesheet" href="./components/shop-page-card/shop-page-card.css">

<script>
      function addToCart(id) {
            $('p').html('');
            $.ajax({
				url: "cart-functions/addToCart.php",
				type: "POST",
				data: {
					id: id,
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
                        var success = '#success' + id;
						$(success).html('Produt inserted successfully !');
					}
					else if(dataResult.statusCode==201){
						alert("Error occured !");
                    } else if(dataResult.statusCode==202){
                        window.alert('please login first');
                        window.open('login.php','_self');
                    }
				}
			});
        }
</script>

<?php
function shop_page_card($id, $title, $cost, $stock, $desc, $image)
{
    $svg = file_get_contents("C:/xampp/htdocs/college-shop-digitization/components/shop-page-card/shopping-cart.svg");
    echo "
        <div class=\"shop-card\">
        <div class=\"shop-card-img\">
            <img src=$image alt=\"placeholder\">
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
                <div class=\"shop-card-avail\">
                    ✕ $stock
                </div>
            </div>
            <div class=\"shop-card-desc-btn\">
                <div class=\"shop-card-desc\">
                    <div>$desc</div>
                </div>
                <button class=\"shop-card-btn\" onclick=\"addToCart($id)\">
                    $svg
                </button>
            </div>
        </div>
        </div>

        <p id=\"success$id\"></p>
    ";
}
