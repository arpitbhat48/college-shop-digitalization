<link rel="stylesheet" href="../styles/index.css">
<link rel="stylesheet" href="../styles/orders.css">

<?php
    //for presenting order on admin side
    $PAGE = "";
    require('../components/page-title/page-title.php');
    require("../db/db.php");
?>

<div class="container">
    <?php
        page_title("orders");
    ?>
    <div>
        <form action="orders.php" method="POST">  
            <input type="text" name="roll_no" placeholder="Enter Roll number" />
            <button type="submit" name="search" >Search </button>
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
                $search_query = "select * from orders where isPaid = 'false' and user_rno like '%$roll_no%'";
                $search_result = mysqli_query($con, $search_query);
                if(mysqli_num_rows($search_result) == 0){
                    echo " No orders found";
                }else{
                    while($row = mysqli_fetch_assoc($search_result)){
                        $rno = $row['user_rno'];
                        $order_id = $row['order_id'];
                        $item_id = $row['item_id'];
                        $date_time = $row['date_time'];
                        $price_query = "select * from inventory where item_id = $item_id";

                        $price_result = mysqli_query($con, $price_query);
                        while($row1 = mysqli_fetch_assoc($price_result)){
                            $price = $row1['cost'];
                        }

                        echo "
                            <tr>
                                <td>$rno</td>
                                <td>$order_id</td>
                                <td>$item_id</td>
                                <td>$price</td>
                                <td>$date_time</td>
                                <td><input type='checkbox' name='checkout[]' value='$order_id' /></td>

                            </tr>
                            ";
                    }
                }
            }else{
                $order_query = "select * from orders where isPaid = 'false'";
                $result = mysqli_query($con, $order_query);

                while($row = mysqli_fetch_assoc($result)){
                    $rno = $row['user_rno'];
                    $order_id = $row['order_id'];
                    $item_id = $row['item_id'];
                    $date_time = $row['date_time'];
                    $price_query = "select * from inventory where item_id = $item_id";

                    $price_result = mysqli_query($con, $price_query);
                    while($row1 = mysqli_fetch_assoc($price_result)){
                        $price = $row1['cost'];
                    }

                    echo "
                        <tr>
                            <td>$rno</td>
                            <td>$order_id</td>
                            <td>$item_id</td>
                            <td>$price</td>
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
        <input type="submit" name="checkout1"/>
    </form>
</div>

<?php
    if(isset($_POST['checkout1'])){
        $checks = $_POST['checkout'];
        $true = "true";
        // echo $checks;
        $sum = 0;
        foreach ($checks as $id){ 
            //fetch order price
            $find_price = "select * from inventory where item_id in (select item_id from orders where order_id = $id)";
            $price_result = mysqli_query($con, $find_price);
            while($row1 = mysqli_fetch_assoc($price_result)){
                $price = $row1['cost'];
            }

            $sum = $sum + $price;
            
            //update isPaid status to true
            $update_query = "UPDATE orders set isPaid = '$true' where order_id = $id"; 
            mysqli_query($con, $update_query);
        }
        echo "<script>window.alert($sum)</script>";
        echo "<script>window.open('./orders.php','_self')</script>";
    }
?>