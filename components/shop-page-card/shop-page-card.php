<link rel="stylesheet" href="./components/shop-page-card/shop-page-card.css">
<?php
function shop_page_card($title, $cost, $avail, $desc)
{
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
                <div class=\"shop-card-avail\">
                    ✕ $avail
                </div>
            </div>
            <div class=\"shop-card-desc-btn\">
                <div class=\"shop-card-desc\">
                    $desc
                </div>
                <a class=\"shop-card-btn\">
                    <img src=\"./components/shop-page-card/shopping-cart.svg\" alt=\"add to cart\">
                </a>
            </div>
        </div>
        </div>";
}
