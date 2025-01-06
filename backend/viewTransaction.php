<?php

if(isset($_SESSION['logged_in']))
{
    $getOrderID = "SELECT * FROM orders WHERE email = '".$_SESSION['email']."'";
            $getOrderID_qry = $conn->query($getOrderID);

            if($getOrderID_qry->num_rows >= 1)
            {
                while($iterate = $getOrderID_qry->fetch_assoc())
                {
                    
                    echo
                    "
                    <div class='transaction-cart'>
                        <form action='detailTransaction.php' method='POST'>
                            <h2>Order ".$iterate['order_id']."</h2>
                            <input type='text' name='order_id' value='".$iterate['order_id']."' hidden>

                            <h3>Date: <span>".$iterate['datentime']."</span></h3>
                            <input type='text' name='datentime' value='".$iterate['datentime']."' hidden>

                            <h3>Status: <span>".$iterate['status']."</span></h3>
                            <input type='text' name='stat' value='".$iterate['status']."' hidden>

                            <h3>Total: <span>₱".$iterate['gtotal']."</span></h3>
                            <input type='text' name='gtotal' value='".$iterate['gtotal']."' hidden>


                            <button type='submit'>View Details</button>
                        </form>
                    </div>";
                }

            }
}

else
{
    echo
    "
        <script>
            history.back();
            alert('Please Login first')
            
        </script>
    ";
}
            

            
?>
