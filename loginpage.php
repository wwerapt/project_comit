<?php include('connection.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Ticket Watermelon Login Page</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form method="post" action="loginpage.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<center><button type="submit" class="btn" name="login_user">Login</button></center>
  	</div>
	  <br>
  	<p>
  		Not yet a member? <a href="customer_signup.php">Customer Sign up</a>
  	</p>
	<br>
	<p>
		Want to create the event? <a href="organizer_signup.php">Organizer Sign up</a>
  	</p>
  </form>
</body>
</html>


