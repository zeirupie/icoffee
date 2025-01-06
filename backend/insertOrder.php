<?php
session_start();
include "config.php";

if(isset($_POST['address']))
{

    $check_name = "SELECT customer_name FROM customer_account_tbl WHERE email = ?";
    $stmt = $conn->prepare($check_name);
    $stmt->bind_param("s", $_SESSION['email']);
    $stmt->execute();
    $stmt->store_result();

    $stmt->bind_result($cus_name);
    $stmt->fetch();

    $order_id = null;
    $order_name = $cus_name;
    $receiptImg;
    $cus_email = $_SESSION['email'];
    $shipping_address = $_POST['address'];
    $stat = "Pending";
    $datentime = null;
    $tots = $_POST['tots'];


//----for file image Uploads
    if(isset($_FILES['receipt']) && $_FILES['receipt']['error'] === UPLOAD_ERR_OK)
    {
        $reciept_temp_name = $_FILES['receipt']['tmp_name'];
        $reciept_name = $_FILES['receipt']['name'];
        $reciept_size = $_FILES['receipt']['size'];
        $reciept_type = $_FILES['receipt']['type'];

        $allowed_types = ['image/jpeg', 'image/png', 'application/pdf'];
        $max_size = 5 * 1024 * 1024;

        if(in_array($reciept_type, $allowed_types) && $reciept_size <= $max_size)
        {
            $upload_dir = '../assets/images/uploads/';

            if(!is_dir($upload_dir))
            {
                mkdir($upload_dir, 0777, true);
                
            }

            $reciept_new_name = uniqid('receipt_',true) . '.' . pathinfo($reciept_name,PATHINFO_EXTENSION);
            $reciept_dast = $upload_dir . $reciept_new_name;

            if(move_uploaded_file($reciept_temp_name, $reciept_dast))
            {
                $receipt_path = $reciept_dast;

                $receiptImg = $receipt_path;
            } else 
            {
                $error = 'Failed to upload the receipt file.';
            }
        } else
        {
            echo 'Invalid file type or size. Only JPG, PNG, and PDF files ar allowed (max size 5MB)';
        }
    }else
    {
        echo 'Please upload a receipt.';
    }
        $insert_order = "INSERT INTO orders VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $insitem_qry = $conn->prepare($insert_order);
        $insitem_qry->bind_param("ssssssss",  $order_id, $datentime, $order_name,$cus_email,$shipping_address, $receiptImg, $stat, $tots);
        $insitem_qry->execute();



          $rcart_sql = "SELECT * FROM cart WHERE cart_owner = '".$_SESSION['email']."'";
          $rcart_qry = $conn->query($rcart_sql);

          $tempCount = $rcart_qry->num_rows;
          $orderItem_id = null;
          $transaction_id; 


          $getOrder = "SELECT * FROM orders";
            $getOrder_qry = $conn->query($getOrder);

            if($getOrder_qry->num_rows >= 1)
            {
                while($iterate = $getOrder_qry->fetch_assoc())
                {
                    $transaction_id=$iterate['order_id'];
                }

            }

          if($rcart_qry->num_rows >= 1)
          {
           
            while($item = $rcart_qry->fetch_assoc())
            {
                $insert_orderitem = "INSERT INTO ordered_items VALUES (?, ?, ?, ?, ?)";
                $insertitem_qry = $conn->prepare($insert_orderitem);
                $insertitem_qry->bind_param("sssii",  $orderItem_id,$transaction_id, $item['item_name'],$item['item_cost'],$item['item_quantity']);
                $insertitem_qry->execute();
            }

        }

        $deteleteCart = "DELETE FROM cart WHERE cart_owner = '".$_SESSION['email']."'";
        $deleteCart_qry = $conn->query($deteleteCart);

        echo
        "
        <script>history.back();</script>
        ";
    }
?>