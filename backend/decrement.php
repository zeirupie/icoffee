<?php
session_start();
include "config.php";

    $todelete = $_POST['dcartAdd'];
    $quantity = $_POST['cquan'] - 1;

    if($quantity == 0)
    {
        echo
            "
            <script>
                history.back();
                alert('1 is the minimum quantity');
            </script>
            ";
    }

    else
    {
        if(isset($_POST['dcartAdd']))
        {
            $sql = "UPDATE cart SET item_quantity = ? where cart_owner = ? && item_id = ?"; 
            $qry = $conn->prepare($sql); 
            $qry->bind_param("iss",  $quantity, $_SESSION['email'], $todelete); 
            $qry->execute(); 

            echo
            "
            <script>
                history.back();
            </script>
            ";
        }

        else 
        {
            echo
            "
            <script>
                history.back();
            </script>
            ";
        }    
    }

        

?>
