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
    require('./components/header/header.php');
    // require('./partials/header/reset.styles.php');
    require("db/db.php");

    if(isset($_SESSION['rollno'])){
        $rno =$_SESSION['rollno'];
    }else{
        echo "<script>window.alert('please login first')</script>";
        echo "<script>window.open('login.php','_self')</script>";
    }
    $total = 0;
    ?>
    <h1>Cart ——————————————————</h1>
    <div class="mid">
        <div class='row items'>

            <?php 
                
                $result = mysqli_query($con, "select * from cart where user_id = $rno");
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $item_id = $row['item_id'];
                    $product_query_result = mysqli_query($con, "select * from inventory where item_id = $item_id");
                    while ($cart_product_details = mysqli_fetch_assoc($product_query_result)) {
                        $item_name = $cart_product_details['item_name'];
                        $item_cost = $cart_product_details['cost'];
                        $item_descd = $cart_product_details['description'];
                        $total = $total + $item_cost;
                        echo "
                        <div class='row'>
                            <div class='col1 column'>
                                <div class='product-card'>
                                    <div class='row'>
                                        <div class='column prod-image'></div>
                                        <div class='column prod-text'>$item_name</div>
                                        <div class='column prod-text' style='color:#DAA520;'>₹$item_cost</div>
                                        <div class='column prod-text' style='color:#DAA520;'><a href = './delete_cart_product?id=$id'>Remove</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        ";
                    }
                }
            ?>
    
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
                        <h2 class="center">Total : ₹ <?php $total ?></h2>
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