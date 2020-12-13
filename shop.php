<link rel="stylesheet" href="styles/shop.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        var cardCount = 2;
        $("#btn").click(function() {
            cardCount += 2;
            $("#shop-cards").load("load_cards.php", {
                cardCount: cardCount
            });
        });
    });
</script>

<?php
$PAGE = "shop";
require('./components/header/header.php');
require('./components/page-title/page-title.php');
require("db/db.php");
?>

<div class="container">
    <?php
    page_title("Shop");
    ?>

    <div class="shop-cards" id="shop-cards">

        <?php
        require('./components/shop-page-card/shop-page-card.php');
        $result = mysqli_query($con, "SELECT * FROM inventory LIMIT 2");
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                shop_page_card(
                    $row["item_id"],
                    $row["item_name"],
                    $row["cost"],
                    $row["stock"],
                    $row["description"],
                    'data:image/jpeg;base64,' . base64_encode($row["image"])
                );
            }
        } else {
            echo "No products available";
        }
        ?>

    </div>
    <button id="btn" class="load-more">More Products ▼</button>
</div>

<?php
require("./components/footer/footer.php");
?>