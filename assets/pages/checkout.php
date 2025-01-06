<head>
    <style>
        /* Modal styles */

  
#checkout-modal {
  display: none; /* Hidden by default */
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0,0,0,0.4);
  z-index: 1000;
}

#checkout-modal.show {
  display: block;
}

.modal-content {
  background-color: #fefefe;
  margin: 15% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
  max-width: 600px;
  box-shadow: 0 4px 8px rgba(0,0,0,0.2);
  border-radius: 10px;
  margin-top: 50px;
}

.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
  cursor: pointer;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

form {
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: left;
}

label {
  margin-bottom: 10px;
  font-weight: bold;
  width: 100%;
  text-align: center;
}

input[type="file"],
input[type="text"],
select {
  width: 80%;
  padding: 12px;
  margin-bottom: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

button#place-order-btn {
  background-color: #4A3000;
  color: #fff;
  padding: 12px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

button#place-order-btn:hover {
  background-color: #D2691E;
}



@media only screen and (max-width: 768px) {
  .modal-content {
    width: 90%;
    margin: 10% auto;
  }
}

@media only screen and (max-width: 480px) {
  .modal-content {
    width: 95%;
    margin: 5% auto;
  }
}

.summary 
{
  background-color:rgb(241, 227, 208);
  display: flex;
  padding:30px;
  flex-direction: column;
  justify-content: center;
  width: 80%;
}

.summary h3 
{
  margin: 20px 0;
}
    </style>
</head>

<!-- Checkout modal -->
<div id="checkout-modal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2 style="margin-bottom:50px;margin-top:20px;text-align:center;font-size:3rem;color:#4A3000">Checkout</h2>
    <form action="../../backend/insertOrder.php" method="POST" enctype="multipart/form-data">

      <label>Shipping Address:</label>
      <input type="text" id="address" name="address" required><br><br>

      <label>Upload File(PNG, JPG, PDF - Max 5MB):</label>
      <input type="file" id="receipt" name="receipt" accept=".jpg, .jpeg, .png, .pdf" required>

      <div class="summary">
        <h3>Your Order Summary</h3>
        
        <?php

          $rcart_sql = "SELECT * FROM cart WHERE cart_owner = '".$_SESSION['email']."'";
          $rcart_qry = $conn->query($rcart_sql);

          $tempCount = $rcart_qry->num_rows;
          $tempOS = "";

          if($rcart_qry->num_rows >= 1)
          {
            $totalsum = 0;
            while($item = $rcart_qry->fetch_assoc())
            {
              
              echo
              "
              ".$item['item_name']."  x".$item['item_quantity']."  = ".$item['item_cost']*$item['item_quantity']."</p>
              ";

              $totalsum += $item['item_cost']*$item['item_quantity'];
             
            } 
            
            echo 
            "
            <h3>Total:₱".$totalsum." </h3>;
            <input type='text' name='tots' value='".$totalsum."'>;
            ";
          }
          
        ?>
      <button type="submit" id="place-order-btn">Place Order</button>

      </div>
      

    </form>
  </div>
</div>

<script>
    
// Get modal and checkout button elements
const checkoutBtn = document.getElementById('checkout-btn');
const checkoutModal = document.getElementById('checkout-modal');
const closeModal = document.getElementsByClassName('close')[0];

// Show modal when checkout button clicked
checkoutBtn.addEventListener('click', () => {
  checkoutModal.style.display = 'block';
});

// Hide modal when close button clicked
closeModal.addEventListener('click', () => {
  checkoutModal.style.display = 'none';
});

// Hide modal when user clicks outside
window.addEventListener('click', (event) => {
  if (event.target == checkoutModal) {
    checkoutModal.style.display = 'none';
  }
});

</script>

