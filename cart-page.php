<link rel="stylesheet" href="styles/cart.css">

<?php
$PAGE = "cart";
require('./components/header/header.php');
require('./components/page-title/page-title.php');
require("db/db.php");
?>

<?php

if(isset($_SESSION['rollno'])){
    $rno =$_SESSION['rollno'];
}else{
	echo "<script>window.alert('please login first')</script>";
    echo "<script>window.open('login.php','_self')</script>";
}
?>
<div class="container">
    <?php
        page_title("Cart");
        require('./components/cart-page-card/cart-page-card.php');
    ?>
    <div class="content">
        <div class="cart-items">
            <?php
            $qry = "SELECT i.item_name, i.cost, c.id
                    FROM cart c, inventory i
                    WHERE c.item_id = i.item_id
                    AND c.user_rno = '$rno'";
            $result = mysqli_query($con, $qry);

            $prices = array();
            $sum = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $x = $row['cost'];
                array_push($prices, $x);
                cart_page_card (
                    $row["item_name"],
                    $row["cost"],
                    $row["id"]
                );

            }
            ?>
        </div>

        <div class="checkout">
            <div class="text-center">
                <h2 class="checkout-heading">Checkout<h2>
            </div>
            <?php
                echo "<div class='prices'>";
                $sum = 0;
                $plus_counter = 0;
                $check = false;
                $result = mysqli_query($con, $qry);
                while ($row = mysqli_fetch_assoc($result)) {
                    $cost = $row["cost"];
                    $name = $row["item_name"];
                    $sum += $cost;
                    if ($plus_counter) {
                        echo  "<div class='price'>". "<span> ＋ </span>" . $cost . "</div>";
                    }
                    else {
                        echo  "<div class='price'>". "<span>  </span>" . $cost . "</div>";
                    }
                    $plus_counter += 1;
                }
                echo "</div>";

                if($sum == 0){
                    echo "
                        <h3>No products in Cart</h3>
                    ";
                } else {
                    echo "
                        <hr class='total-line'>
                        <div class='total'>
                            <span>Total : </span> <span> ₹ $sum </span>
                        </div>
                        <a href='./orders/orders.php'><button class='order'>PROCEED TO PAY</button></a>
                    ";
                }
            ?>
        </div>

    </div>
</div>
<?php
require("./components/footer/footer.php");
?>