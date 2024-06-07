<?php #DISPLAY SHOPPING CART PAGE

# Set page title and display header section.
include ('includes/session.php');

# Check if form has been submitted for update.
if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
{
  # Update changed quantity field values.
  foreach ( $_POST['qty'] as $item_id => $item_qty )
  {
    # Ensure values are integers.
    $id = (int) $item_id;
    $qty = (int) $item_qty;

    # Change quantity or delete if zero.
    if ( $qty == 0 ) { unset ($_SESSION['cart'][$id]); } 
    elseif ( $qty > 0 ) { $_SESSION['cart'][$id]['quantity'] = $qty; }
  }
}

# Initialise grand total variable.
$total = 0; 

# Display the cart if not empty
if (!empty($_SESSION['cart'])) {
  require ('connect_db.php');
  $q = "SELECT * FROM products WHERE item_id IN (";
  foreach ($_SESSION['cart'] as $id => $value) { $q .= $id . ','; }
  $q = substr( $q, 0, -1 ) . ') ORDER BY item_id ASC';
  $r = mysqli_query($link, $q);

  # Display body section with a form and a table.
  echo '<form action="cart.php" method="post">';
  echo '<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <h2>Shopping Cart</h2>
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Item</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>';
  
  while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC))
  {
    # Calculate sub-totals and grand total.
    $subtotal = $_SESSION['cart'][$row['item_id']]['quantity'] * $_SESSION['cart'][$row['item_id']]['price'];
    $total += $subtotal;

    # Display the row/s:
    echo '<tr>';
    echo '<td>';
    echo "{$row['item_name']}";
    echo '</td>';
    echo '<td>';
    echo "<input type=\"text\" 
           size=\"3\" 
           name=\"qty[{$row['item_id']}]\" 
           value=\"{$_SESSION['cart'][$row['item_id']]['quantity']}\">
    <br>@ {$row['item_price']} = 
	
	<br> &pound ".number_format ($subtotal, 2)." ";
  echo '</td>';
  echo '</td>';
    echo '</tr>';
  }


  echo '</tbody>
            </table>
        </div>
        <div class="col-md-4">
            <h2>Summary</h2>
            <p>Total = &pound '.number_format($total,2).'</p>
            <p><input type="submit" name="submit" class="btn btn-primary btn-block" value="Update My Cart"></p>
          <br>
           <a href="checkout.php?total='.$total.'" class="btn btn-success btn-block mt-2">Checkout Now - $' . number_format($total, 2) . '</a><br>

        </div>
    </div>
</div>
</form>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>';

   
}
  else
  # Or display a message.
  { echo '<p>Your cart is currently empty.</p>' ; }

