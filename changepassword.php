<?php 
  include('update.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
	<h2>Change Password</h2>
</div>
<form action="changepassword.php" method="post">
<?php include('errors.php'); ?>
<h3><center> <p><a href="index.php">Go Back</a></p></center></h3>
<div class="input-group"> 
    <label for="OldPassword" class="form-label">Your Old Password</label>
        <input type="password" name="Password1">  
</div>
<div class="input-group"> 
    <label for="New Password" class="form-label">Your New Password</label>
        <input type="password" name="Password2">
</div>
<div class="input-group"> 
    <label for="Confirm New Password" class="form-label">Confirm New Password</label>
        <input type="password" name="Password3">
</div>
<div class="input-group">
<center><button type="submit" class="btn" name="pass_update">Update Password</button></center>
</div>
</form>	
</body>
</html>

