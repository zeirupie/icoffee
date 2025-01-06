<?php
session_start();
include "config.php";

    if(isset($_SESSION['logged_in']))
    {
        $cart_id = null;
        $cart_owner = $_SESSION['email'];
        $iitem_id = $_POST['cofe-id'];
        $iitem_name = $_POST['cofe-name'];
        $iitem_cost = $_POST['cofe-cost'];
        $iitem_img = $_POST['cofe-img'];
        $iitem_quantity = 1;

        $sql = "SELECT item_id FROM cart where cart_owner = ? && item_id=?"; //get the password from table with email tht is equal to email that got from auth/login
        $qry = $conn->prepare($sql); //preparing query
        $qry->bind_param("ss", $cart_owner, $iitem_id ); // puting the value of the email that gpt from auth/login to replace the ? the query stetement 
        $qry->execute(); 
        $qry->store_result(); 

        if($qry->num_rows == 0)
        {
            $addingCart = "INSERT INTO cart VALUES (?,?,?,?,?,?,?)";
            $qry = $conn->prepare($addingCart);
            $qry->bind_param("isssisi", $cart_id,$cart_owner, $iitem_id, $iitem_name, $iitem_cost, $iitem_img, $iitem_quantity); 

            $qry->execute();

            echo 
            "
            <script>
                history.back();
                alert('Added to cart successfully!');
            </script>
            ";
        }

        else 
        {
            echo 
            "
            <script>
                window.location.href='../assets/pages/cart.php';
            </script>
            ";
        }

        


    }
    else
    {
        echo 
        "
        <script>
            history.back();
            alert('Please login first');
        </script>
        ";
    }


?>
