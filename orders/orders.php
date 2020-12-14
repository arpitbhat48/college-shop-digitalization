<?php
    //for processing orders
    $PAGE = "";

    date_default_timezone_set('Asia/Kolkata');
    require('../components/header/header.php');
    require("../db/db.php");
   
    if(isset($_SESSION['rollno'])){
        $rno = $_SESSION['rollno'];
        $query = "select * from cart where user_rno = $rno";
        $result = mysqli_query($con, $query);

        $insert_order_query = "insert into orders(user_rno, is_paid, date_time) values ($rno, 'false', now())";
        mysqli_query($con, $insert_order_query);

        //to find order_id and to store it in variable $order_id
        $retrieve_last_order = "select * from orders where user_rno = $rno ORDER BY order_id DESC LIMIT 1";
        $last_order_result = mysqli_query($con, $retrieve_last_order);
        while($row = mysqli_fetch_assoc($last_order_result)){
            $order_id = $row['order_id'];
        }

        while ($row = mysqli_fetch_assoc($result)) {
            $x = $row['item_id'];
            $find_stock = "select stock from inventory where item_id = $x LIMIT 1";
            $remove_cart = "delete from cart where user_rno = $rno and item_id = $x";
            $insert_order = "insert into order_items(order_id, item_id) values ($order_id, $x)";

            $run_find = mysqli_query($con, $find_stock);
            $run_delete = mysqli_query($con, $remove_cart);
            while($row = mysqli_fetch_assoc($run_find))     
                $stock_quan = $row['stock'];

            if ($run_find) {
                if ($stock_quan > 0) {
                   $stock_quan -= 1;
                    $update_inventory = "UPDATE inventory SET stock = $stock_quan WHERE item_id = $x";
                    mysqli_query($con, $insert_order);
                    mysqli_query($con, $update_inventory);

                } else {
                    echo "<script>alert('Out of stock');</script>";
                    echo "<script>window.open('../cart.php','_self')</script>";
                    break;
                }
            } else {
                echo "<script>alert('Something went Wrong...');</script>";
            }
        }
        echo "<script>window.open('../orders.php','_self')</script>";
    }else{
        echo "<script>window.alert('please login first')</script>";
        echo "<script>window.open('login.php','_self')</script>";
    }
?>
