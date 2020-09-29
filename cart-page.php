<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Page</title>
    <link rel="stylesheet" href="./styles/cart.css">
    <style>
        @media screen and (max-width: 400px) {
            #one {
                float: none;
                margin-right: 0;
                width: auto;
                border: 0;
                border-bottom: 2px solid #000;
            }
        }
    </style>
</head>

<body>
    <?php
    $PAGE = "cart";
    require('./partials/header/header.php');
    // require('./partials/header/reset.styles.php');
    ?>
    <h1>Cart ——————————————————</h1>
    <div class="mid">
        <div class="row">
            <div class="col1 column">
                <div class="product-card">
                    <div class="row">
                        <div class="column prod-image"></div>
                        <div class="column prod-text">The complete semester one bundle</div>
                        <div class="column prod-text" style="color:#DAA520;">₹500</div>
                    </div>
                </div>
                <div class="product-card">
                    <div class="row">
                        <div class="column prod-image"></div>
                        <div class="column prod-text">Journal Sheets(300 pages)</div>
                        <div class="column prod-text" style="color:#DAA520;">₹220</div>
                    </div>
                </div>
                <div class="product-card">
                    <div class="row">
                        <div class="column prod-image"></div>
                        <div class="column prod-text">Drawing sheets(1 set)</div>
                        <div class="column prod-text" style="color:#DAA520;">₹100</div>
                    </div>
                </div>
                <div class="product-card">
                    <div class="row">
                        <div class="column prod-image"></div>
                        <div class="column prod-text">Hard bounds(6)</div>
                        <div class="column prod-text" style="color:#DAA520;">₹50</div>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="total-qr-card">
                    <div class="total">
                        <h2 class="center">Checkout <h2>
                    </div>

                    <div class="amount">
                        <div class="price">₹501</div>
                        <div class="price">+ ₹220</div>
                        <div class="price">+ ₹100</div>
                        <div class="price">+ ₹40</div>
                    </div>
                    <div style="margin-top: 60%;">
                        <hr>
                        <h2 class="center">Total : ₹860 </h2>
                        <div class="proceed-div">
                            <button class="proceed-btn">PROCEED TO PAY...</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    require("./components/footer/footer.php");
    ?>
</body>

</html>