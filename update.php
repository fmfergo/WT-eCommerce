<?php
# Include navigation 
include ( 'includes/nav.php' ) ;

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
  # Connect to the database.
  require ('connect_db.php');
  # Initialize an error array.
  $errors = array();

  # Check for a item name.
  if ( empty( $_POST[ 'item_id' ] ) )
  { $errors[] = 'Update item ID.' ; }
  else
  { $id = mysqli_real_escape_string( $link, trim( $_POST[ 'item_id' ] ) ) ; }
  
  # Check for a item name.
  if ( empty( $_POST[ 'item_name' ] ) )
  { $errors[] = 'Update item name.' ; }
  else
  { $n = mysqli_real_escape_string( $link, trim( $_POST[ 'item_name' ] ) ) ; }

  # Check for a item description.
  if (empty( $_POST[ 'item_desc' ] ) )
  { $errors[] = 'Update item description.' ; }
  else
  { $d = mysqli_real_escape_string( $link, trim( $_POST[ 'item_desc' ] ) ) ; }

  # Check for a item price.
  if (empty( $_POST[ 'item_img' ] ) )
  { $errors[] = 'Update image address.' ; }
  else
  { $img = mysqli_real_escape_string( $link, trim( $_POST[ 'item_img' ] ) ) ; }
  
  # Check for a item price.
  if (empty( $_POST[ 'item_price' ] ) )
  { $errors[] = 'Update item price.' ; }
  else
  { $p = mysqli_real_escape_string( $link, trim( $_POST[ 'item_price' ] ) ) ; }


  if ( empty( $errors ) ) 
  {
    $q = "UPDATE products SET item_id='$id',item_name='$n', item_desc='$d', item_img='$img', item_price='$p'  WHERE item_id='$id'";
    $r = @mysqli_query ( $link, $q ) ;
    if ($r)
    {
       header("Location: read.php");
    } else {
        echo "Error updating record: " . $link->error;
    }
     # Close database connection.
     mysqli_close( $link );
  } 
  
   
  # Or report errors.
  else 
  {
    echo '<p>The following error(s) occurred:</p>' ;
    foreach ( $errors as $msg )
    { echo "$msg<br>" ; }
    echo '<p>Please try again.</p></div>';
    # Close database connection.
    mysqli_close( $link );
	
  }  

}
  ?>

<div class="container">
    <h1>Update Record</h1>
	<form action="update.php" method="post">
	  <!-- input box for item name  -->
      <div class="form-group">
        <label for="item_name">Update Item Id:</label>
        <input type="text" name="item_id" class="form-control" 
        value="<?php if (isset($_POST['item_id'])) echo $_POST['item_id']; ?>">
      </div>
      <div class="form-group">
        <label for="item_name">Update Item Name:</label>
        <input type="text" name="item_name" class="form-control" 
        value="<?php if (isset($_POST['item_name'])) echo $_POST['item_name']; ?>">
      </div>
      <div class="form-group">
        <label for="item_desc">Update Item Description:</label>
        <input type="text" name="item_desc" class="form-control" 
        value="<?php if (isset($_POST['item_desc'])) echo $_POST['item_desc']; ?>">
      </div>
      <div class="form-group">
        <label for="item_img">Update Item Image:</label>
        <input type="text" name="item_img" class="form-control" 
        value="<?php if (isset($_POST['item_img'])) echo $_POST['item_img']; ?>">
      </div>
      <div class="form-group">
        <label for="item_price">Update Item Price:</label>
        <input type="text" name="item_price" class="form-control" 
        value="<?php if (isset($_POST['item_price'])) echo $_POST['item_price']; ?>">
      </div>

      <div class="container">
        <div class="form-group">
        </div>
        <input type="submit" class="btn btn-dark" value="Update Record"></p>
      </div>
	</form>
</div>
<?php
 include 'includes/footer.php';
?>

