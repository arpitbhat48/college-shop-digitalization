
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
    ?>
    <div class="mid">
        <div class='row items'>
		<?php
        require('./components/cart-page-card/cart-page-card.php');
		$qry = "SELECT i.item_name, i.cost 
				FROM cart c, inventory i 
				WHERE c.user_rno='$rno'";
        $result = mysqli_query($con, $qry);
		
        while ($row = mysqli_fetch_assoc($result)) {
			// echo $row['item_name'];
			// echo $row['cost'];
			// echo "<br>";

            cart_page_card (
                $row["item_name"],
                $row["cost"]
            );
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
<?php
require("./components/footer/footer.php");
?>
</body>

</html>