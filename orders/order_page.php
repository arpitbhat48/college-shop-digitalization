<?php
    //for presenting order

    $PAGE = "";
    require('../components/header/header.php');
    require('../components/page-title/page-title.php');
    require("../db/db.php");
    echo "
        <div class='container'>
                ".page_title('Your Order')."
        </div>
    ";
    if(isset($_SESSION['rollno'])){
        $rno =$_SESSION['rollno'];
        echo "$rno\n";

        echo "<div>
                <table>
                    <thead>
                        <tr>
                            <th>Order id</th>
                            <th>Item id</th>
                        </tr>
                    </thead>
                    <tbody> 
                    
                    ";
        $order_query = "select * from orders where user_rno = $rno";

        $result = mysqli_query($con, $order_query);

        while ($row = mysqli_fetch_assoc($result)) {
            $x = $row['item_id'];
            $item = $row['item_id'];
            echo "
            <tr>
            <td>$x</td><td>$item</td>
            </tr>";
        }
        echo "

                    </tbody>
                </table>
            </div>
            ";
    }else{
        echo "<script>window.alert('please login first')</script>";
        echo "<script>window.open('login.php','_self')</script>";
    }
?>
