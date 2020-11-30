<link rel="stylesheet" href="styles/shop.css">

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

    <div class="shop-cards">
        <?php
        require('./components/shop-page-card/shop-page-card.php');
        $result = mysqli_query($con, "SELECT * FROM inventory");
        while ($row = mysqli_fetch_assoc($result)) {
            shop_page_card(
                $row["item_id"],
                $row["item_name"],
                $row["cost"],
                $row["stock"],
                $row["description"],
                'data:image/jpeg;base64,'.base64_encode($row["image"])
            );
            // echo 'data:image/jpeg;base64,'.base64_encode($row['image']);
        }
        ?>
    </div>
</div>

<?php
require("./components/footer/footer.php");
?>