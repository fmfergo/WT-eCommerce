<?php 
include ( 'includes/nav.php' ) ;
# Display any error messages if present.
if ( isset( $errors ) && !empty( $errors ) )
{
 echo '<p id="err_msg">Oops! There was a problem:<br>' ;
 foreach ( $errors as $msg ) { echo " - $msg<br>" ; }
 echo 'Please try again or <a href="register.php">Register</a></p>' ;
}
?>

<h1>Log in</h1>
<form action="login_action.php" method="post">
  <label for="inputemail">Email</label>
  <input type="text" 
		 name="email" 
		 class="form-control" 
		 required 
		 placeholder="* Enter Email"
		 data-cy="email"> 
	
		 <label for="inputpassword">Password</label>
  <input type="password" 
		 name="pass"  
	     class="form-control" 
		 required 
	     placeholder="* Enter Password"
			 data-cy="password">
		
  <input type="submit" value="Login" class="btn btn-dark">
</form><!-- closing form -->