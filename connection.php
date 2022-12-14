<?php
session_start();
$username = "";
$email    = "";
$errors = array();
$id = "";
$db = mysqli_connect('127.0.0.1', 't65g5', 't65g5', 't65g5');

if (isset($_POST['reg_user'])) {
    $firstname = $_POST['Customer_Name'];
    $lastname = $_POST['Customer_Lastname'];
    $username = $_POST['Customer_Username'];
    $email = $_POST['Customer_Email'];
    $password_1= $_POST['Customer_Password'];
    $password_2 = $_POST['Customer_Password2'];
    $telephone = $_POST['Customer_Telephone'];
    $birthday = $_POST['Customer_Birthday'];
    $gerne = $_POST['Favorite_Gerne'];
  
    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($firstname)) { array_push($errors, "Firstname is required"); }
    if (empty($lastname)) { array_push($errors, "Lastname is required"); }
    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    if ($password_1 != $password_2) {array_push($errors, "The two passwords do not match");}
    if (empty($telephone)) { array_push($errors, "Telephone Number is required"); }
    if (empty($birthday)) { array_push($errors, "Birthday is required"); } 

  
    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM roles WHERE Username='$username' OR Email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) { // if user exists
      if ($user['username'] === $username) {
        array_push($errors, "Username already exists");
      }
  
      if ($user['email'] === $email) {
        array_push($errors, "email already exists");
      }
    }
  
    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $sql1 = "INSERT INTO roles SET Username='$username' ,Email='$email' ,Roles='customer'";
        $sql2 = "INSERT INTO customer_signup SET Customer_Username='$username' ,Customer_Password='$password_1',Customer_Email='$email', Customer_Name='$firstname'
        , Customer_Lastname='$lastname', Customer_Telephone='$telephone', Customer_Birthday='$birthday', Favorite_gerne='$gerne'";
        mysqli_query($db, $sql1);
        mysqli_query($db, $sql2);
        $_SESSION['Customer_Username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: index.php');
    }
}

if (isset($_POST['reg_org'])) {
  $name = $_POST['Organizer_Name'];
  $bank = $_POST['Organizer_BankAccount'];
  $username = $_POST['Organizer_Username'];
  $email = $_POST['Organizer_Email'];
  $password_1= $_POST['Organizer_Password'];
  $password_2 = $_POST['Organizer_Password2'];
  $telephone = $_POST['Organizer_Telephone'];

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($name)) { array_push($errors, "Name is required"); }
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {array_push($errors, "The two passwords do not match");}
  if (empty($telephone)) { array_push($errors, "Telephone Number is required"); }
  if (empty($bank)) { array_push($errors, "Bank Account is required"); } 


  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM roles WHERE Username='$username' OR Email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
      $sql = "INSERT INTO organizer_approve SET Organizer_Username='$username' ,Organizer_Password='$password_1',Organizer_Email='$email', Organizer_Name='$name'
      , Organizer_Telephone='$telephone', Organizer_BankAccount='$bank'";
      mysqli_query($db, $sql);
      header('location: index.php');
  }
}

if (isset($_POST['login_user'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  if (empty($username)) {
      array_push($errors, "Username is required");
  }
  if (empty($password)) {
      array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {;
  	$query = "SELECT * FROM customer_signup WHERE Customer_Username='$username' AND Customer_Password='$password'";
  	$results = mysqli_query($db, $query);
    $query2 = "SELECT * FROM organizer_signup WHERE Organizer_Username='$username' AND Organizer_Password='$password'";
  	$results2 = mysqli_query($db, $query2);
  	if (mysqli_num_rows($results) or mysqli_num_rows($results2)  == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: index.php');
      }else {
          array_push($errors, "Wrong username/password combination");
      }
  }
}
if (isset($_POST['pass_update'])) {
  $password_1= $_POST['Customer_Password1'];
  $password_2 = $_POST['Customer_Password2'];
  $password_3= $_POST['Customer_Password3'];

  if (empty($password_1)) { array_push($errors, "Old Password is required"); }
  if (empty($password_2)) { array_push($errors, "New Password is required"); }
  if (empty($password_3)) { array_push($errors, "Confirm New Password is required"); }
  if ($password_2 != $password_3) {array_push($errors, "The two passwords do not match");}
 
  
    // Finally, register user if there are no errors in the form
  if (count($errors) == 0) 
      {
        $password = md5($password_1);//encrypt the password before saving in the database
        $_SESSION['username'] = $username;
        $query = "UPDATE users SET password=$password_2 WHERE 'username' = $username";
        mysqli_query($db, $query);
        header('location: index.php');
      }
}

if (isset($_POST['create_concert'])) 
    {
      $usernames = $_SESSION['username'];
      $res = mysqli_query($db,"SELECT Organizer_ID FROM organizer_signup WHERE Organizer_Username = '$usernames'");
      $row = mysqli_fetch_assoc($res);
      $org_id = $row['Organizer_ID'];  
        $concert_name =  $_POST['concert_name'];
        $concert_date =  $_POST['concert_date'];
        $concert_time =  $_POST['concert_time'];
        $concert_place =  $_POST['concert_place'];
        $concert_image =  $_POST['concert_image'];
        $concert_sell_date_start =  $_POST['concert_sell_date_start'];
        $concert_sell_time_start =  $_POST['concert_sell_time_start'];
        $concert_sell_date_stop =  $_POST['concert_sell_date_stop'];
        $concert_sell_time_stop =  $_POST['concert_sell_time_stop'];

        if (empty($concert_name)) { array_push($errors, "Concert Name is required <br>"); }
        if (empty($concert_date)) { array_push($errors, "Date play concert is required <br>"); }
        if (empty($concert_time)) { array_push($errors, "Time play concert is required <br>"); }
        if (empty($concert_place)) { array_push($errors, "Concert place is required <br>"); }
        if (empty($concert_image)) { array_push($errors, "Zone Photo is required <br>"); }
        if (empty($concert_sell_date_start)) { array_push($errors, "Date start to sell ticket is required <br>"); }
        if (empty($concert_sell_time_start)) { array_push($errors, "Time start to sell ticket <br>"); } 
        if (empty($concert_sell_date_stop)) { array_push($errors, "Date stop to sell ticket <br>"); }
        if (empty($concert_sell_time_stop)) { array_push($errors, "Time stop to sell ticket is required <br>"); }
        if (empty($usernames)) { array_push($errors, "error <br>"); }


        if (count($errors) == 0) 
        {
	        mysqli_query($db, "INSERT INTO organizer_concert SET 
                concert_name='$concert_name',
                concert_date='$concert_date',
                concert_time='$concert_time',
                concert_place='$concert_place' ,
                concert_image='$concert_image',
                concert_sell_date_start='$concert_sell_date_start',
                concert_sell_time_start='$concert_sell_time_start',
                concert_sell_date_stop='$concert_sell_date_stop',
                concert_sell_time_stop='$concert_sell_time_stop',
                org_id = '$org_id'
            ");

            $res = mysqli_query($db,"SELECT concert_id FROM organizer_concert ORDER BY concert_id DESC LIMIT 1");
            $row = mysqli_fetch_assoc($res);
            $_SESSION['concert_id'] = $row['concert_id'];
            header('location: artist_concert.php');
        }
    }

    if (isset($_POST['artist_more'])) 
    {
      $concert_id = $_SESSION['concert_id'];
      $artist_name =  $_POST['artist_name'];
      $artist_gerne =  $_POST['artist_gerne'];

        if (empty($artist_name)) { array_push($errors, "Artist Name is required <br>"); }
        if (empty($artist_gerne)) { array_push($errors, "Artist Gerne is required <br>"); } 


        if (count($errors) == 0) 
        {
	        mysqli_query($db, "INSERT INTO organizer_artist SET
                artist_name = '$artist_name',
                artist_gerne = '$artist_gerne',
                concert_id = '$concert_id'
            ");
            header('location: artist_concert.php');
        } else {echo  implode(" ",$errors);}
    }

    if (isset($_POST['artist_submit'])) 
    {
        $concert_id = $_SESSION['concert_id'];
        $artist_name =  $_POST['artist_name'];
        $artist_gerne =  $_POST['artist_gerne'];

        if (empty($artist_name)) { array_push($errors, "Artist Name is required <br>"); }
        if (empty($artist_gerne)) { array_push($errors, "Artist Gerne is required <br>"); } 


        if (count($errors) == 0) 
        {
	        mysqli_query($db, "INSERT INTO organizer_artist SET
                artist_name = '$artist_name',
                artist_gerne = '$artist_gerne',
                concert_id = '$concert_id'
            ");
            header('location: ticket_concert.php');
        } else {echo  implode(" ",$errors);}
    }

    if (isset($_POST['ticket_more'])) 
    {
        $concert_id = $_SESSION['concert_id'];
        $zone_name =  $_POST['zone_name'];
        $zone_price =  $_POST['zone_price'];
        $zone_amount =  $_POST['zone_amount'];

        if (empty($zone_name)) { array_push($errors, "Zone Name is required <br>"); }
        if (empty($zone_price)) { array_push($errors, "Zone Price is required <br>"); }
        if (empty($zone_amount)) { array_push($errors, "Zone Amount is required <br>"); }
        if ($zone_price <= 1) { array_push($errors, "Zone Price need to be number <br>"); }
        if ($zone_amount <= 1) { array_push($errors, "Zone Amount need to be number <br>"); } 

        if (count($errors) == 0) 
        {
	        mysqli_query($db, "INSERT INTO organizer_ticket SET
                zone_name = '$zone_name',
                zone_price = '$zone_price',
                zone_amount = '$zone_amount',
                concert_id = '$concert_id'
            ");
            header('location: ticket_concert.php');
        } else {echo  implode(" ",$errors);}
    }

    if (isset($_POST['ticket_submit'])) 
    {
        $concert_id = $_SESSION['concert_id'];
        $zone_name =  $_POST['zone_name'];
        $zone_price =  $_POST['zone_price'];
        $zone_amount =  $_POST['zone_amount'];

        if (empty($zone_name)) { array_push($errors, "Zone Name is required <br>"); }
        if (empty($zone_price)) { array_push($errors, "Zone Price is required <br>"); }
        if (empty($zone_amount)) { array_push($errors, "Zone Amount is required <br>"); }
        if ($zone_price <= 1) { array_push($errors, "Zone Price need to be number <br>"); }
        if ($zone_amount <= 1) { array_push($errors, "Zone Amount need to be number <br>"); }

        if (count($errors) == 0) 
        {
	        mysqli_query($db, "INSERT INTO organizer_ticket SET
                zone_name = '$zone_name',
                zone_price = '$zone_price',
                zone_amount = '$zone_amount',
                concert_id = '$concert_id'
            ");
            header('location: index.php');
        } else {echo  implode(" ",$errors);}
    }

?>

