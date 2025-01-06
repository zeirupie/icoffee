<?php

    $coffees_sql = "SELECT * FROM coffees";   // sql statement selecting all data from coffees table
    $coffees_result = $conn->query($coffees_sql);   

            
    if ($coffees_result->num_rows > 0)  // if there is/are product in the table. greater than 0, so this code will only work if there is/are product/data in the coffees table
    {


        for($i_beverage=0; $i_beverage <=3 && $row = $coffees_result->fetch_assoc(); $i_beverage++ ) //loop. for loop starts from inializing variable i_beverage having a value of 0. the loop check if i_beverage is less tahn or equal to 4 and(&&) have a data to fetch. if i_beverage is still less tahn to 4 or qual to 4 and there is data to fetch from the table, the loop will continue to incremeant and excecute the block of code inside the for this for-loop. 
        {
            echo 
            "
                <div class='product-card clickable cd1'>

               


               
                    <div class='category-card-filter'></div>
                    <img src='".$row['coffees_image']."'>
                    <div class='product-text-cont'>


                     <form action='database/addcart.php' method='POST'>
                    <input type='number' value='1' name='quantity' min='1' hidden>
                    <input type='number' name='itemId' min='1' value='".$row['coffees_id']."s' hidden>
                    <div class='heart' name='addtocart'><button type='submit' ><i class='fa fa-heart'></i></button> </div>
                </form>
                    
                        <h3>".$row['coffees_name']."</h3>
                        <p class='star-review-cont'>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star'></i>
                            <span>(".$row['coffees_star'].")</span>
                            
                        </p>
                        <h3>₱<span>".$row['coffees_cost']."</span></h3>
                    </div>
                </div>
                
            ";

        }

        echo
        "
            <div class='product-card clickable pc4'>
                <h2 style='color:white;'>See More</h2>
            </div>
        ";
    } 
        
    else {
    
        echo
        "
        <span>No Data</span>
        ";
    
    }  

?>