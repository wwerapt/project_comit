<?php 
  session_start(); 
  $db = mysqli_connect('127.0.0.1', 't65g5', 't65g5', 't65g5');
  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: loginpage.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: loginpage.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
	<h2>Home Page</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php   $username = $_SESSION['username'];
            $query = "SELECT roles FROM Roles WHERE Username='$username'";
            $results = mysqli_query($db, $query);
            $result= mysqli_fetch_assoc($results);
            ?>

    <?php  if (isset($_SESSION['username']) && $result["roles"] == "customer") : ?>
    	<p> Hi! <strong><?php echo $username; ?></strong></p><br>
        <p> <a href="concert_searching.php" style="color: blue;"> Concert Searching </a></p><br>
        <p> <a href="concert_recommend.php" style="color: blue;">Concert Recommending </a></p><br>
        <p> <a href="ticketinfo.php" style="color: blue;">Ticket Info </p><br>
        <p> <a href="customerupdateinfo.php" style="color: blue;">Update Info </p><br>
        <p> <a href="changepassword.php" style="color: blue;">Change Password </p><br>
    	<p> <a href="index.php?logout='1'" style="color: red;">Logout</a> </p>
    <?php endif ?>

    <?php  if (isset($_SESSION['username']) && $result["roles"] == "organizer") : ?>
    	<p> Hi! <strong><?php echo $username; ?></strong></p><br>
        <p> <a href="create_concert.php" style="color: blue;">Create Concert  </p><br>
        <p> <a href="concert_manage.php" style="color: blue;">Manage Concert </p><br>
        <p> <a href="organizerupdatecontact.php" style="color: blue;">Update Contact </p><br>
        <p> <a href="changepassword.php" style="color: blue;">Change Password </p><br>
    	<p> <a href="index.php?logout='1'" style="color: red;">Logout</a> </p>
    <?php endif ?>

    <?php  if (isset($_SESSION['username']) && $result["roles"] == "admin") : ?>
    	<p> Hi! <strong><?php echo "Admin"; ?></strong></p><br>
        <p> <a href="organizer_approve.php" style="color: blue;">Approve Organizer</a>  </p><br>
        <p> <a href="customerbill_approve.php" style="color: blue;">Check Customer Bill </a></p><br>
        <p> <a href="deleteconcert.php" style="color: blue;">Delete Concert </a></p><br>
    	<p> <a href="index.php?logout='1'" style="color: red;">Logout</a> </p>
    <?php endif ?>
</div>
		
</body>
</html>