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
            $order_query = "select * from orders where user_rno = $rno and isPaid = 'false'";

            $result = mysqli_query($con, $order_query);

            if(mysqli_num_rows($result) == 0){
                echo " No orders yet.";
            }else{
                echo "<div>
                        <table class='order-table'>
                            <thead>
                                <tr>
                                    <th>Order id</th>
                                    <th>Item id</th>
                                    <th>Price (₹)</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>";
                
                $sum = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $x = $row['item_id'];
                    $item = $row['item_id'];
                    $date = $row['date_time'];

                    $price_query = "select * from inventory where item_id = $item";

                    $price_result = mysqli_query($con, $price_query);
                    while($row1 = mysqli_fetch_assoc($price_result)){
                        $price = $row1['cost'];
                    }

                    $sum = $sum + $price;

                    echo "
                        <tr>
                            <td>$x</td>
                            <td>$item</td>
                            <td>$price</td>
                            <td>$date</td>
                        </tr>
                        ";
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
            $order_query = "select * from orders where user_rno = $rno and isPaid = 'true'";
        
            $result = mysqli_query($con, $order_query);
        
            if(mysqli_num_rows($result) == 0){
                echo " No previous orders ";
            }else{
                echo "<div>
                        <table class='order-table'>
                            <thead>
                                <tr>
                                    <th>Order id</th>
                                    <th>Item id</th>
                                    <th>Price (₹)</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>   
                            ";
                            
                while ($row = mysqli_fetch_assoc($result)) {
                    $x = $row['item_id'];
                    $item = $row['item_id'];
                    $date = $row['date_time'];
                    
                    $price_query = "select * from inventory where item_id = $item";

                    $price_result = mysqli_query($con, $price_query);
                    while($row1 = mysqli_fetch_assoc($price_result)){
                        $price = $row1['cost'];
                    }

                    echo "
                        <tr>
                            <td>$x</td>
                            <td>$item</td>
                            <td>$price</td>
                            <td>$date</td>
                        </tr>
                        ";
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