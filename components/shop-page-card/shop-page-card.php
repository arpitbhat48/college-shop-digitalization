<link rel="stylesheet" href="./components/shop-page-card/shop-page-card.css">
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
                <a href='./cart-functions/addCart.php?id=$id' class=\"shop-card-btn\">
                    $svg
                </a>
            </div>
        </div>
        </div>";
}
