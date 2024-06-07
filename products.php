<?php
# Access session.
session_start() ;
# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }


include ('includes/nav.php');

# Open database connection.
	require ( 'connect_db.php' );

# Retrieve items from 'products' database table.
$q = "SELECT * FROM products" ;
$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) > 0 )
{
    #Display body section.
    echo '
    <div class="container">
        <h1>Read Item</h1>
            <div class="row">';
    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
    {
echo '
<div class="col-md-3 d-flex justify-content-center">
    <div class="card" style="width: 18rem;">
	 <img src=img/'. $row['item_img'].' class="card-img-top" alt="T-Shirt">
	  <div class="card-body">
	   <h5 class="card-title text-center">' . $row['item_name'] .'</h5>
	   <p class="card-text">'. $row['item_desc'] . '</p>
     </div>
	  <ul class="list-group list-group-flush">
	   <li class="list-group-item"><p class="text-center">&pound' . $row['item_price'] . '</p></li>
	   <li class="list-group-item btn btn-dark"><a class="btn btn-dark btn-lg btn-block" href="update.php?id='.$row['item_id'].'">
	   Update</a></li>
	   <li class="list-group-item"><a class="btn btn-dark" href="delete.php?item_id='.$row['item_id'].'">
	   Delete Item</a></li>
	  </ul>
	</div>
  </div>';
  }
  echo '</div></div>';

  # Close database connection.
mysqli_close( $link) ; 
}
# Or display message.
else { echo '<p>There are currently no items in the table to display.</p>
	' ; }
	
	include ('includes/footer.php');
	
?>

