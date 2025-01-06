<?php
    $home_beverage_sql = "SELECT * FROM coffees";
    $home_beverage_result = $conn->query($home_beverage_sql);

            
    if ($home_beverage_result->num_rows > 0) 
    {


        while($item = $home_beverage_result->fetch_assoc())
        {
            echo
            "
            <div class='food-card'>
            <form action='../../backend/addcart.php'  method='POST'>
                <input type='text' name='cofe-id' value='c".$item['coffees_id']."' hidden>
                <input type='text' name='cofe-name' value='".$item['coffees_name']."' hidden>
                <input type='text' name='cofe-cost' value='".$item['coffees_cost']."' hidden>
                <input type='text' name='cofe-img' value='".$item['coffees_image']."' hidden> 
                
                <button type='submit' class='heart'><i class='fa fa-heart'
                
            ";

            $tempid2 = "c".$item['coffees_id']."";

            $sql = "SELECT item_id FROM cart where cart_owner = ? && item_id=?";
            $qry = $conn->prepare($sql); 
            $qry->bind_param("ss", $_SESSION['email'], $tempid2 );
            $qry->execute(); 
            $qry->store_result(); 

            if($qry->num_rows == 1)
            {
                echo 
                "
                style='color:red;'
                ";

            }

            echo 
            "
            ></i><div class='add-to-cart-txt'><div>Add to Cart</div></div></button>
            </form>
            
                <img src='../".$item['coffees_image']."'>
                <div class='card-filter'></div>
    
                <div class='title-price'>
                    <h2>".$item['coffees_name']."</h2>
                    <h3>₱".$item['coffees_cost']."</h3>
                </div>
            </div>
            ";

        }
    } 
        
    else {
    
        echo
        "
        <span>No Data</span>
        ";
    
    }  

?>

