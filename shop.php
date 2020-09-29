<link rel="stylesheet" href="styles/shop.css">

<?php
$PAGE = "shop";
require('./components/header/header.php');
require('./components/page-title/page-title.php')
?>

<div class="container">
    <?php
    page_title("Shop");
    ?>

    <div class="shop-cards">
        <?php
        require('./components/shop-page-card/shop-page-card.php');
        for ($x = 0; $x <= 10; $x++) {
            shop_page_card(
                "The Complete Semester One Bundle",
                500,
                50,
                "Everthing that a semester one student needs, journal sheets, binders, cover pages, index pages..."
            );
        }
        ?>
    </div>
</div>

<?php
require("./components/footer/footer.php");
?>