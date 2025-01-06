<?php
   

    if(isset($_SESSION['logged_in']))
    {

        $rcart_sql = "SELECT * FROM cart WHERE cart_owner = '".$_SESSION['email']."'";
        $rcart_qry = $conn->query($rcart_sql);
        
        $tempCount = $rcart_qry->num_rows;

        $tempTotal = 0;

        echo
        "
            <div class='cart-page'>
            <h1>Your Cart [".$tempCount."]</h1>


            <table>
                    <th>
                        <tr class='thdata'>
                            <td><h2>Items</h2></td>
                            <td><h2>Price</h2></td>
                            <td><h2>Quantity</h2></td>
                            <td><h2>Total</h2></td>
                            <td><h2>Cancelation</h2></td>
                        </tr>
                    </th>

        ";


        if($rcart_qry->num_rows >= 1)
        {
            

            while($item = $rcart_qry->fetch_assoc())
            {
                $tempTotal += $item['item_cost'] * $item['item_quantity'];
                echo
                "
                    <div class='m-cart'>
                        <div class='cart-item m-cart-item'>
                            <img src='../".$item['item_img']."'>
                        </div>

                        <div class='cart-item-cont'>
                            <h3>".$item['item_name']."</h3>

                            <div class='quantifier m-qountifier'>
                                <form action='../../backend/decrement.php' method='POST'>
                                    <input type='text' name='cquan' hidden value='".$item['item_quantity']."'>
                                    <input type='text' name='dcartAdd' hidden value='".$item['item_id']."'>
                                    <button type='submit'>-</button>
                                </form>

                                <input readonly value='".$item['item_quantity']."'>

                                <form action='../../backend/increment.php' method='POST'>
                                    <input type='text' name='cquan' hidden value='".$item['item_quantity']."'>
                                    <input type='text' name='dcartAdd' hidden value='".$item['item_id']."'>
                                    <button type='submit'>+</button>
                                </form>
                            </div>

                            <h4>Price:<p>₱".$item['item_cost']."</p></h4>
                            <h4>Total: <p>₱".$item['item_cost'] * $item['item_quantity']."</p></h4>

                            <form action='../../backend/deleteItem.php' method='POST'>
                                <input type='text' name='dcart' hidden value='".$item['item_id']."'>
                                <button type='submit' name='cancelbtnorder' class='cancelbtn'>Cancel</button>
                            </form>
                        </div>
                    </div>

                    <tr>
                        <td>
                            <div class='cart-item'>
                                <img src='../".$item['item_img']."'>
                                <h3>".$item['item_name']."</h3>
                            </div>
                        </td>
                        <td><h3>₱".$item['item_cost']."</h3></td>

                        <td>
                            <div class='quantifier'>
                                <form action='../../backend/decrement.php' method='POST'>
                                    <input type='text' name='cquan' hidden value='".$item['item_quantity']."'>
                                    <input type='text' name='dcartAdd' hidden value='".$item['item_id']."'>
                                    <button type='submit'>-</button>
                                </form>

                                <input readonly value='".$item['item_quantity']."'>

                                <form action='../../backend/increment.php' method='POST'>
                                    <input type='text' name='cquan' hidden value='".$item['item_quantity']."'>
                                    <input type='text' name='dcartAdd' hidden value='".$item['item_id']."'>
                                    <button type='submit'>+</button>
                                </form>
                            </div>
                        </td>

                        <td><h3>₱".$item['item_cost'] * $item['item_quantity']."</h3></td>

                        <td>
                            <form action='../../backend/deleteItem.php' method='POST'>
                                <input type='text' name='dcart' hidden value='".$item['item_id']."'>
                                <button type='submit' name='cancelbtnorder' class='cancelbtn'>Cancel</button>
                            </form>
                        </td>
                    </tr>
                ";
            }

            echo 
            "
                </table>

                <div class='check-out'>
                    <h2>Grand Total:</h2>
                    <h2 class='grand-total'>₱".$tempTotal."</h2>
                    <button id='checkout-btn' type='submit'>Checkout</button>
                </div>

            </div>
                    
            ";
            
        }
        else
        {
            echo 
            "
                </table>
    
                <div class='check-out'>
                    <h2>Grand Total:</h2>
                    <h2 class='grand-total'>₱".$tempTotal."</h2>
                    <button id='checkout-btn' type='submit' disabled>Checkout</button>
                </div>
    
                </div>
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
