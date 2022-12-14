<?php 
  include('update.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Infomation</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
	<h2>Update Infomation</h2>
      
</div>
<form action="organizerupdatecontact.php" method="post">
<?php include('errors.php');  
  $username = $_SESSION['username'];
  $user_check_query = "SELECT * FROM organizer_signup WHERE Organizer_Username='$username' ";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
?>
<h3><center> <p><a href="index.php">Go Back</a></p></center></h3>
<div class="input-group"> 
      <label for="Email address">Email address</label>
            <input type="email" name="Organizer_Email" value= '<?php echo $user['Organizer_Email'] ?>'>
      </div>
	  <div class="input-group"> 
      <label for="Name" class="form-label">Company Name</label>
          	<input type="text" name="Organizer_Name" value= '<?php echo $user['Organizer_Name'] ?>'>
      </div>
      <div class="input-group"> 
      <label for="Phone">Enter your phone number:</label>
            <input type="tel" class="form-control" id="phone" name="Organizer_Telephone" value= '<?php echo $user['Organizer_Telephone'] ?>'>
      </div>
	  <div class="input-group"> 
      <label for="Bank">Enter your company bank account :</label>
            <input type="text" class="form-control" id="bank" name="Organizer_BankAccount" value= '<?php echo $user['Organizer_BankAccount'] ?>'>
      </div>
<div class="input-group">
<center><button type="submit" class="btn" name="contact_update">Update Info</button></center> 
</div>
</form>	
</body>
</html>
