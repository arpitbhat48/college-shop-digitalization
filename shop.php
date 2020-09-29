<link rel="stylesheet" href="styles/shop.css">

<?php
$PAGE = "shop";
require('./partials/header/header.php');
require('./components/page-title.php')
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

            .shop-card-image {
                grid-area: "sci";
            }

            .shop-card-shop {
                grid-area: "scs";
            }

            .shop-card-title {
                grid-area: "sct";
            }

            .shop-card-cost {
                grid-area: "scc";
            }

            .shop-card-avail {
                grid-area: "sca";
            }

            .shop-card {
                display: grid;
                grid-template-columns: 4fr 1fr 1fr 1fr 1fr;
                grid-template-rows: 1fr 1fr 1fr;
                grid-template-areas:
                    'sci sct sct sct sca'
                    '.   scc scc .   .  '
                    '.   sca sca sca sca';
            }

            .shop-cards {
                padding: 3rem 0;
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