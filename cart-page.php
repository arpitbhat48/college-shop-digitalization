
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
    
    <div class="cart-item">
        <?php
        $qry = "SELECT i.item_name, i.cost, c.id 
                FROM cart c, inventory i 
                WHERE c.item_id = i.item_id
                AND c.user_rno = '$rno'";
        $result = mysqli_query($con, $qry);

        while ($row = mysqli_fetch_assoc($result)) {
            cart_page_card (
                $row["item_name"],
                $row["cost"],
                $row["id"]
            );
            
        }
        ?>
    </div>
    <div class="checkout grid-item">
        <div class=" text-center">
            <h2 class="checkout-heading">Checkout <h2>
        </div>
        <?php 
        $result = mysqli_query($con, $qry);
        $total = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row['item_name'];
            $price = $row['cost'];
            $total += $price;
            echo "
            <div>
                <span class=\"checkout-item\"> $name </span>
                <span class=\"price\"> $price </span>
            </div>
            ";
            // echo $total;
        }
        ?>
        
        <div>
            <hr>
            <h2 class="">Total : ₹ <?php echo $total ?></h2>
            <div class="">
                <button class="checkout-btn">PROCEED TO PAY</button>
            </div>
        </div>
    </div>
</div>

<?php
require("./components/footer/footer.php");
?>