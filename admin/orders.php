<link rel="stylesheet" href="../styles/index.css">
<link rel="stylesheet" href="../styles/orders.css">

<?php
    //for presenting order on admin side
    $PAGE = "orders";
    require('../components/header/admin_header.php');
    require('../components/page-title/admin_page_title.php');
    require("../db/db.php");
?>

<div class="container">
	<?php
		page_title("Proceed Orders");
	?>
    <div class="search-roll">
        <form action="orders.php" method="POST"> 
            <label>Roll No.
                <input type="text" name="roll_no" placeholder="Enter Roll number">
            </label> 
            <button type="submit" name="search" class="order-roll-search-btn">Search </button>
        <form>
    </div>    
    <div>
        <form action='orders.php' method='POST'>
        <table class='order-table'>
            <thead>
                <tr>
                    <th>Roll No.</th>
                    <th>Order id</th>
                    <th>Item id</th>
                    <th>Price (₹)</th>
                    <th>Date</th>
                    <th>Check</th>
                </tr>
            </thead>
            <tbody>
        <?php
            if(isset($_POST['search']) && isset($_POST['roll_no'])){
                $roll_no = $_POST['roll_no'];
                $search_query = "select * from orders where is_paid = 'false' and user_rno like '%$roll_no%'";
                $search_result = mysqli_query($con, $search_query);
                if(mysqli_num_rows($search_result) == 0){
                    echo " No orders found";
                }else{
                    $order_query = "select * from orders where is_paid = 'false'";
                    $result = mysqli_query($con, $order_query);

                    while($row = mysqli_fetch_assoc($result)){
                        $str = " ";
                        $rno = $row['user_rno'];
                        $order_id = $row['order_id'];
                        $date_time = $row['date_time'];
    
                        $sum = 0;
                        //fetch items of order_id $order_id 
                        $fetch_items = "select * from order_items where order_id = $order_id";
                        $items_result = mysqli_query($con, $fetch_items);
    
                        while($row2 = mysqli_fetch_assoc($items_result)){
                            $item_id = $row2['item_id'];                    
                            $str = $str.$item_id." , ";
                            $price_query = "select * from inventory where item_id = $item_id";
    
                            $price_result = mysqli_query($con, $price_query);
                            while($row2 = mysqli_fetch_assoc($price_result)){
                                $price = $row2['cost'];
                                $sum = $sum + $price;
                            }
                        }
                        echo "
                                <tr>
                                    <td>$rno</td>
                                    <td>$order_id</td>
                                    <td>$str</td>
                                    <td>$sum</td>
                                    <td>$date_time</td>
                                    <td><input type='checkbox' name='checkout[]' value='$order_id' /></td>
                            </tr>
                            ";
                        
                    }
                }
            }else{
                $order_query = "select * from orders where is_paid = 'false'";
                $result = mysqli_query($con, $order_query);
                
                while($row = mysqli_fetch_assoc($result)){
                    $str = " ";
                    $rno = $row['user_rno'];
                    $order_id = $row['order_id'];
                    $date_time = $row['date_time'];

                    $sum = 0;
                    //fetch items of order_id $order_id 
                    $fetch_items = "select * from order_items where order_id = $order_id";
                    $items_result = mysqli_query($con, $fetch_items);

                    while($row2 = mysqli_fetch_assoc($items_result)){
                        $item_id = $row2['item_id'];                    
                        $str = $str.$item_id." , ";
                        $price_query = "select * from inventory where item_id = $item_id";

                        $price_result = mysqli_query($con, $price_query);
                        while($row2 = mysqli_fetch_assoc($price_result)){
                            $price = $row2['cost'];
                            $sum = $sum + $price;
                        }
                    }
                    echo "
                            <tr>
                                <td>$rno</td>
                                <td>$order_id</td>
                                <td>$str</td>
                                <td>$sum</td>
                                <td>$date_time</td>
                                <td><input type='checkbox' name='checkout[]' value='$order_id' /></td>
                        </tr>
                        ";
                }
            }

            
        ?>
           </tbody>
        </table>
    </div>
        <input type="submit" name="checkout1" class="order-check-submit" value="Checkout" />
    </form>
</div>

<?php
    $order_ids = " ";
    $items = " ";
    if(isset($_POST['checkout1'])){
        $checks = $_POST['checkout'];
        $true = "true";
        // echo $checks;
        $sum = 0;
        foreach ($checks as $id){
            $order_ids = $order_ids.$id.", "; 
            //fetch order price with (order_id -> item_ids -> item_price)
            $find_items2 = "select * from order_items where order_id = $id";
            $items_result2 = mysqli_query($con, $find_items2);
            while($row2 = mysqli_fetch_assoc($items_result2)){
                $item_id = $row2['item_id'];
                $find_price = "select * from inventory where item_id = $item_id";
                $price_result = mysqli_query($con, $find_price);
                while($row1 = mysqli_fetch_assoc($price_result)){
                    $item_name = $row1['item_name'];
                    $price = $row1['cost'];
                    $sum = $sum + $price;
                }
                $items = $items.$item_name.", ";
            }
        
            //update isPaid status to true
            $update_query = "UPDATE orders set is_paid = '$true' where order_id = $id"; 
            mysqli_query($con, $update_query);
        }
        echo "<div class='receipt'>
                <h3>Order Receipt </h3>
                <hr /> 
                Order Id : $order_ids 
                <br/>
                <br/>
                Items Bought : $items 
                <br />
                <br/>

                Total Amount : ₹ <b>$sum</b> /. 
                <br />
            </div>";
        // echo "<script>window.open('./orders.php','_self')</script>";
    }
?>