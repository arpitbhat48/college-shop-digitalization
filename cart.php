<link rel="stylesheet" href="styles/cart.css">

<?php
$PAGE = "cart";
require('./partials/header/header.php');
?>
<div class="mid">
    <div style="margin-top:50px">
        <p class="cart-text">Cart</p>
        <hr>
    </div>

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
                <br>
                <div class="price">₹500</div><br><br><br>
                <div class="price">+ ₹220</div><br><br><br>
                <div class="price">+ ₹100</div><br><br><br>
                <div class="price">+ ₹50</div><br>
                <hr>
                <h2 class="center">Total : ₹870 </h2>
                <button class="proceed center">Proceed to pay...</button>
            </div>
        </div>
    </div>
</div>

<?php
require("./partials/footer/footer.php");
?>