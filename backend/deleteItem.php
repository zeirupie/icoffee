<?php
session_start();
include "config.php";

    $todelete = $_POST['dcart'];

        if(isset($_POST['dcart']))
        {
            $sql = "DELETE FROM cart where cart_owner = ? && item_id=?"; 
            $qry = $conn->prepare($sql); 
            $qry->bind_param("ss", $_SESSION['email'], $todelete ); 
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
                alert('failed to cancel order');
            </script>
            ";
        }

        

?>
