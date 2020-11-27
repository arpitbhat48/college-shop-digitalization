
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
</div>
<div class="container container-grid">
    <div class="cart-item grid-item">
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
    <div class="checkout grid-item">
        <div class="text-center">
            <h2 class="checkout-heading">Checkout <h2>
        </div>
        <?php
            $sum = 0; 
            $check = false;
            foreach ($prices as $ind => $val){
                $sum = $sum + $val;
                echo "<div class='price'>+  {$val}</div>";
            }
            if($sum == 0){
                echo "
                <div>
                    <hr>
                    <div class='total'>
                        <h2>Total :-  ₹ $sum </h2>
                    </div>
                    <div class=''>
                        <a href='./cart-page.php'><button disabled class='checkout-btn'>PROCEED TO PAY</button></a>
                    </div>
                </div>
                ";
            } else {
                echo "
                <div>
                    <hr>
                    <div class='total'>
                        <h2>Total :-  ₹ $sum </h2>
                    </div>
                    <div class=''>
                        <a href='./orders/orders.php'><button class='checkout-btn'>PROCEED TO PAY</button></a>
                    </div>
                </div>
                ";
            }
        ?> 
    </div>
</div>

<?php
require("./components/footer/footer.php");
?>