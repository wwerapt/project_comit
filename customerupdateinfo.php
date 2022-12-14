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
<form action="customerupdateinfo.php" method="post">
<?php include('errors.php');  
  $username = $_SESSION['username'];
  $user_check_query = "SELECT * FROM customer_signup WHERE Customer_Username='$username' ";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
?>
      <h3><center> <p><a href="index.php">Go Back</a></p></center></h3>
<div class="input-group"> 
    <label for="New Name" class="form-label">Name</label>
        <input type="text" name="Customer_Name" value= '<?php echo $user['Customer_Name'] ?>'>  
</div>
<div class="input-group"> 
    <label for="New Lastname" class="form-label">Lastname</label>
        <input type="text" name="Customer_Lastname" value= '<?php echo $user['Customer_Lastname'] ?>'>  
</div>
<div class="input-group"> 
      <label for="Phone">Enter your phone number (XXX-XXX-XXXX):</label>
            <input type="tel" class="form-control" id="phone" name="Customer_Telephone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" value= '<?php echo $user['Customer_Telephone'] ?>'>
</div>
</div>
      <div class="input-group"> 
      <label for="birthday">Birthday:</label>
            <input type="date" class="form-control" id="birthday" name="Customer_Birthday" value= '<?php echo $user['Customer_Birthday'] ?>'>  
      </div>
      <div class="input-group"> 
      <label for="favorite genre">Favorite Genre:</label>
            <select class="form-select" name="Favorite_Gerne" >
              <option selected>Select Genre</option>
              <option value="1">Pop</option>
              <option value="2">Rock</option>
              <option value="3">Jazz</option>
            </select>
</div>
<div class="input-group">
<center><button type="submit" class="btn" name="info_update">Update Info</button></center>
</div>
</form>	
</body>
</html>
