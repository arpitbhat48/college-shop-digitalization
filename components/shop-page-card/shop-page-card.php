<link rel="stylesheet" href="./components/shop-page-card/shop-page-card.css">

<script>
    function addToCart(id) {
        $.ajax({
            url: "cart-functions/addToCart.php",
            type: "POST",
            data: {
                id: id,
            },
            cache: false,
            success: function(dataResult) {
                console.log(dataResult)
                dataResult = JSON.parse(dataResult);
                if (dataResult.statusCode == 200) {
                    let success = '#success' + id;
                    $(success).html('Added to cart!').addClass('success');

                    setTimeout(() => {
                        $(success).html('').removeClass('success')
                    }, 2000)
                } else if (dataResult.statusCode == 201) {
                    alert("Error occured !");
                } else if (dataResult.statusCode == 202) {
                    window.alert('please login first');
                    window.open('login.php', '_self');
                }
            }
        });
    }
</script>

<?php
function shop_page_card($id, $title, $cost, $stock, $desc, $image)
{
    $svg = file_get_contents(__DIR__ . "/shopping-cart.svg");

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
        <p id=\"success$id\"></p>
        </div>

    ";
}
