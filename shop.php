<link rel="stylesheet" href="styles/shop.css">

<?php
$PAGE = "shop";
require('./partials/header/header.php');
require('./partials/components/page-title.php')
?>

<div class="container">
    <?php
    page_title("Shop");
    ?>

    <div class="shop-cards">
        <style>
            .shop-card {
                background-color: var(--dark-blue);
            }
        </style>


        <div class="shop-card">
            <div class="shop-card-img">
                <img src="https://via.placeholder.com/300x200" alt="placeholder">
            </div>
            <div class="shop-card-title">
                <h3>Title</h3>
            </div>
            <div class="shop-card-cost">
                <h3>Cost</h3>
            </div>
            <div class="shop-card-avail">
                <h3>Avail</h3>
            </div>
            <div class="shop-card-description">
                <h4>Desc</h4>
            </div>
        </div>
    </div>
</div>

<?php
require("./partials/footer/footer.php");
?>