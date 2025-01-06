<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Icoffe</title>

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../fonts/all.css">

    <script src="../js/script.js" defer></script>
</head>
<body>

    <?php  
        session_start();
        include "../../backend/config.php";
    ?>

<header>
        <div class="headerLeft">
            <img src="../images/icoffeelogo-black.png" alt="">
        </div>

        <div class="header-menu">
            <a href="../../" id="home_nav">Home</a>
            <a href="coffees.php" id="coffee_navi">Coffees</a>
            <a href="foods.php" id="foods_navi">Foods</a>
		</div>

        <div class="headerRight">
        <a href="transaction.php" style="text-decoration:none;"><h4 style="color:gray;">My Transctions</h4></a>
            <a href="cart.php"><i class="fa fa-shopping-cart"></i></a>

            

            <i class="fa fa-bars" id="bars" onclick="openNav()"></i>
        </div>
</header>


<div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

        <h1>Navigation</h1>
        <hr>
            <a href="../../" id="home_nav">Home</a>
            <a href="coffees.php" id="coffee_navi">Coffees</a>
            <a href="foods.php" id="foods_navi">Foods</a>
            <a href="transaction.php" >My Transctions</a>


        <?php 
            if(!isset($_SESSION['logged_in']))
            {
                echo
                "
                    <h1 class='sidenavh'>Account</h1>
                    <hr>
                    <a href='login.php' id='about_nav'>Login</a>
                    <a href='register.php' id='coffee_navi' >Sign-Up</a>
                ";
            }
        ?>
        

    </div>

    <?php
        include "../js/showmenu.php";
        include "../js/sidebarjs.php";
    ?>


<div class="transaction-cont">
        <h1>Order Details:</h1>
    <div class="transaction-content">
        <div class="orderetail-content">
            <h2>Order #<?php echo $_POST['order_id'];?></h2>

            <h3>Username:<span style="font-weight:lighter;">
             
                <?php
                    $check_name = "SELECT customer_name FROM customer_account_tbl WHERE email = ?";
                    $stmt = $conn->prepare($check_name);
                    $stmt->bind_param("s", $_SESSION['email']);
                    $stmt->execute();
                    $stmt->store_result();

                    if ($stmt->num_rows > 0) {

                        $stmt->bind_result($cus_name);
                        $stmt->fetch();

                        echo $cus_name;
                    }
                ?>
            
            </span></h3>

            <h3>Email:<span style="font-weight:lighter;">
                
            <?php
                echo $_SESSION['email'];
            ?>
        
            </span></h3>
            <h3>shipping Address:<span style="font-weight:lighter;">
                
            <?php
                    $check_address = "SELECT shipping_address FROM orders WHERE order_id = ?";
                    $stmt2 = $conn->prepare($check_address);
                    $stmt2->bind_param("s", $_POST['order_id']);
                    $stmt2->execute();
                    $stmt2->store_result();

                    if ($stmt2->num_rows > 0) {

                        $stmt2->bind_result($cus_address);
                        $stmt2->fetch();

                        echo $cus_address;
                    }
                ?>
        
            </span></h3>
            
            <div class="OS">
            <h3>Order Summary</h3>

            <?php
                $getOrder = "SELECT * FROM ordered_items WHERE transaction_id = ".$_POST['order_id']."";
                $getOrder_qry = $conn->query($getOrder);
    
                if($getOrder_qry->num_rows >= 1)
                {
                    $subTotal=0;

                    while($iterate = $getOrder_qry->fetch_assoc())
                    {
                        $subTotal += $iterate['orderItem_quantity']*$iterate['orderItem_cost'];

                        echo 
                        "
                         <p>".$iterate['orderItem_name']."  x".$iterate['orderItem_quantity']." ₱".$subTotal."</p>
                        ";
                    }

                    echo
                    "
                    <h3>Total Amount: <span style='font-weight:lighter;'>₱".$subTotal."</span></h3>
                    ";
    
                }

            ?>

                
            </div>

            <div class="img-receipt">
                <h3>Your Receipt:</h3>
                <div class="img-content">
                <?php
                    $check_img = "SELECT receipt FROM orders WHERE order_id = ?";
                    $stmt3 = $conn->prepare($check_img);
                    $stmt3->bind_param("s", $_POST['order_id']);
                    $stmt3->execute();
                    $stmt3->store_result();

                    if ($stmt3->num_rows > 0) {

                        $stmt3->bind_result($cus_img);
                        $stmt3->fetch();

                        echo 
                        "
                            <img src='../".$cus_img."' >
                        ";
                    }
                ?>
                
                </div>
                
            </div>
            
            

            <p style="text-align:center;margin-top:50px;">Thank you for shipping with us! Bact to <a href="../../index.php">Homepage</a></p>
            

        </div>
    </div>
</div>



<footer>

    <div class="copyright">
        <p>© 2024 Icoffee.</p>
    </div>
</footer>
    
</body>
</html>