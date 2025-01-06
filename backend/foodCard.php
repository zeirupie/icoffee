<?php
    $home_beverage_sql = "SELECT * FROM foods";
    $home_beverage_result = $conn->query($home_beverage_sql);

            
    if ($home_beverage_result->num_rows > 0) 
    {


        for($i_beverage=0; $i_beverage <=5 && $item = $home_beverage_result->fetch_assoc(); $i_beverage++ )
        {
            echo
            "
            <div class='food-card'>
            <form action='backend/addcart.php'  method='POST'>
                <input type='text' name='cofe-id' value='f".$item['food_id']."' hidden>
                <input type='text' name='cofe-name' value='".$item['food_name']."' hidden>
                <input type='text' name='cofe-cost' value='".$item['food_cost']."' hidden>
                <input type='text' name='cofe-img' value='".$item['food_img']."' hidden> 
                
                <button type='submit' class='heart'><i class='fa fa-heart'
                
            ";

            $tempid2 = "f".$item['food_id']."";

            $sql = "SELECT item_id FROM cart where cart_owner = ? && item_id=?"; //get the password from table with email tht is equal to email that got from auth/login
            $qry = $conn->prepare($sql); //preparing query
            $qry->bind_param("ss", $_SESSION['email'], $tempid2 ); // puting the value of the email that gpt from auth/login to replace the ? the query stetement 
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
            
                <img src='assets/".$item['food_img']."'>
                <div class='card-filter'></div>
    
                <div class='title-price'>
                    <h2>".$item['food_name']."</h2>
                    <h3>₱".$item['food_cost']."</h3>
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

