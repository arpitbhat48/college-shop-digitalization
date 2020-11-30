<?php
    //for processing orders
    $PAGE = "";

    date_default_timezone_set('Asia/Kolkata');
    require('../components/header/header.php');
    require("../db/db.php");
   
    if(isset($_SESSION['rollno'])){
        $rno =$_SESSION['rollno'];

        $query = "select * from cart where user_rno = $rno";

        $result = mysqli_query($con, $query);

        $insert_order_query = "insert into orders(user_rno, is_paid, date_time) values ($rno, 'false', now())";

        mysqli_query($con, $insert_order_query);

        //to find order_id and to store it in variable $order_id
        $retrieve_last_order = "select * from orders where user_rno = $rno ORDER BY order_id DESC LIMIT 1";
        $last_order_result = mysqli_query($con, $retrieve_last_order);
        while($row1 = mysqli_fetch_assoc($last_order_result)){
            $order_id = $row1['order_id'];
        }

        while ($row = mysqli_fetch_assoc($result)) {
            $x = $row['item_id'];
            $insert_order_items_query = "insert into order_items(order_id, item_id) values ($order_id, $x)";

            if (mysqli_query($con, $insert_order_items_query)) {

        //         // echo "<script>alert('SucessFully added');</script>";

        //         //after inserting to orders table delete from cart table
                $empty_cart = "delete from cart where user_rno = $rno and item_id = $x";
                if (mysqli_query($con, $empty_cart)) {
        //             // echo "<script>alert('SucessFully deleted');</script>";
                } else {
                    echo "<script>alert('Error');</script>";
                    break;
                }

            } else {
                echo "<script>alert('Error');</script>";
                break;
            }
        }
        echo "<script>window.open('../order_page.php','_self')</script>";

    }else{
        echo "<script>window.alert('please login first')</script>";
        echo "<script>window.open('login.php','_self')</script>";
    }
?>
