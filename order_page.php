<link rel="stylesheet" href="styles/orders.css">

<?php
    //for presenting order

    $PAGE = "";
    require('./components/header/header.php');
    require('./components/page-title/page-title.php');
    require("db/db.php");
?>

<div class="container">
    <?php 
        page_title('Your Orders');
    ?>
        
    <?php
        if(isset($_SESSION['rollno'])){
            $rno =$_SESSION['rollno'];
            echo " <div class='titles'> Recent Orders </div>";
            $order_query = "select * from orders where user_rno = $rno and is_paid = 'false'";

            $result = mysqli_query($con, $order_query);

            if(mysqli_num_rows($result) == 0){
                echo " No orders yet.";
            }else{
                echo "<div>
                        <table class='order-table'>
                            <thead>
                                <tr>
                                    <th>Order Id</th>
                                    <th>Item Id</th>
                                    <th>Price (₹)</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>";
                
                $sum = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $order_id = $row['order_id'];
                    $date = $row['date_time'];
    
                    // to fetch items of that order_id
                    $order_query = "select * from order_items where order_id = $order_id";
                    $order_result = mysqli_query($con, $order_query);
                    while($row1 = mysqli_fetch_assoc($order_result)){
                        $item_id = $row1['item_id'];
                        $price_query = "select * from inventory where item_id in (select item_id from order_items where item_id = $item_id)";

                        $price_result = mysqli_query($con, $price_query);
                        while($row2 = mysqli_fetch_assoc($price_result)){
                            $price = $row2['cost'];
                        }
                        echo "
                        <tr>
                            <td>$order_id</td>
                            <td>$item_id</td>
                            <td>$price</td>
                            <td>$date</td>
                        </tr>
                        ";
                        $sum = $sum + $price;
                    }
                }
                
                echo "
                            </tbody>
                        </table>
                    </div>
                    ";
                    
                echo "<div class='total-amount'>
                        Total :- ₹$sum /.
                    </div>";
            }

            echo " <div class='titles'> Previous Orders </div>";    
            $order_query = "select * from orders where user_rno = $rno and is_paid = 'true'";

            $result = mysqli_query($con, $order_query);

            if(mysqli_num_rows($result) == 0){
                echo " No orders yet.";
            }else{
                echo "<div>
                        <table class='order-table'>
                            <thead>
                                <tr>
                                    <th>Order Id</th>
                                    <th>Item Id</th>
                                    <th>Price (₹)</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>";
                
                while ($row = mysqli_fetch_assoc($result)) {
                    $order_id = $row['order_id'];
                    $date = $row['date_time'];
    
                    // to fetch items of that order_id
                    $order_query = "select * from order_items where order_id = $order_id";
                    $order_result = mysqli_query($con, $order_query);
                    while($row1 = mysqli_fetch_assoc($order_result)){
                        $item_id = $row1['item_id'];
                        $price_query = "select * from inventory where item_id in (select item_id from order_items where item_id = $item_id)";

                        $price_result = mysqli_query($con, $price_query);
                        while($row2 = mysqli_fetch_assoc($price_result)){
                            $price = $row2['cost'];
                        }
                        echo "
                        <tr>
                            <td>$order_id</td>
                            <td>$item_id</td>
                            <td>$price</td>
                            <td>$date</td>
                        </tr>
                        ";
                    }
                }
                
                echo "
                            </tbody>
                        </table>
                    </div>
                    ";
            }
            
        
        }else{
            echo "<script>window.alert('please login first')</script>";
            echo "<script>window.open('login.php','_self')</script>";
        }
    ?>
    </div>