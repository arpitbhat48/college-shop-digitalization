<link rel="stylesheet" href="./components/shop-page-card/shop-page-card.css">
<?php
function shop_page_card($id, $title, $cost, $stock, $desc)
{
    $svg = file_get_contents("./components/shop-page-card/shopping-cart.svg");
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
                    ✕ $stock
                </div>
            </div>
            <div class=\"shop-card-desc-btn\">
                <div class=\"shop-card-desc\">
                    <div>$desc</div>
                </div>
                <a href='./addCart.php?id=$id' class=\"shop-card-btn\">
                    $svg
                </a>
            </div>
        </div>
        </div>";
}
