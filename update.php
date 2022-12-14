<?php
session_start();
$errors = array(); 
$db = mysqli_connect('127.0.0.1', 't65g5', 't65g5', 't65g5');


if (isset($_POST['pass_update'])) {
    $username = $_SESSION['username'];
    $checkrole = "SELECT Roles FROM roles WHERE Username = '$username'";
    $sqlrole = mysqli_query($db, $checkrole);
    $roleresult= mysqli_fetch_assoc($sqlrole);
    if ( ($roleresult['Roles'] === "customer"))
    {
    $check = "SELECT Customer_Password FROM customer_signup WHERE Customer_Username = '$username'";
    $sql = mysqli_query($db, $check);
    $result= mysqli_fetch_assoc($sql);
    $password_1= $_POST['Password1'];
    $password_2 = $_POST['Password2'];
    $password_3= $_POST['Password3'];
    if (($password_1)!=$result["Customer_Password"]) { array_push($errors, "Your Old Password is wrong"); }
    if (empty($password_1)) { array_push($errors, "Old Password is required"); }
    if (empty($password_2)) { array_push($errors, "New Password is required"); }
    if (empty($password_3)) { array_push($errors, "Confirm New Password is required"); }
    if ($password_2 != $password_3) {array_push($errors, "The two passwords do not match");}
   
    
      // Finally, register user if there are no errors in the form
    if (count($errors) == 0) 
        {
          $query = "UPDATE customer_signup SET Customer_Password='$password_2' WHERE Customer_Username = '$username'";
          mysqli_query($db, $query);
          header('location: index.php');
        }
    }
    if ( ($roleresult['Roles'] === "organizer"))
    {
    $check = "SELECT Organizer_Password FROM organizer_signup WHERE Organizer_Username = '$username'";
    $sql = mysqli_query($db, $check);
    $result= mysqli_fetch_assoc($sql);
    $password_1= $_POST['Password1'];
    $password_2 = $_POST['Password2'];
    $password_3= $_POST['Password3'];
    if (($password_1)!=$result["Organizer_Password"]) { array_push($errors, "Your Old Password is wrong"); }
    if (empty($password_1)) { array_push($errors, "Old Password is required"); }
    if (empty($password_2)) { array_push($errors, "New Password is required"); }
    if (empty($password_3)) { array_push($errors, "Confirm New Password is required"); }
    if ($password_2 != $password_3) {array_push($errors, "The two passwords do not match");}
   
    
      // Finally, register user if there are no errors in the form
    if (count($errors) == 0) 
        {
          $query = "UPDATE organizer_signup SET Organizer_Password='$password_2' WHERE Organizer_Username = '$username'";
          mysqli_query($db, $query);
          header('location: index.php');
        }
    } 
  
}

if (isset($_POST['info_update'])) {

  $firstname = $_POST['Customer_Name'];
  $lastname = $_POST['Customer_Lastname'];
  $email = $_POST['Customer_Email'];
  $telephone = $_POST['Customer_Telephone'];
  $birthday = $_POST['Customer_Birthday'];
  $gerne = $_POST['Favorite_Gerne'];
  $oldusername = $_SESSION['username'];

  if (empty($firstname)) { array_push($errors, "Firstname is required"); }
  if (empty($lastname)) { array_push($errors, "Lastname is required"); }
  if (empty($telephone)) { array_push($errors, "Telephone Number is required"); }
  if (empty($birthday)) { array_push($errors, "Birthday is required"); } 
  
    // Finally, register user if there are no errors in the form
  if (count($errors) == 0) 
      {
        $query = "UPDATE customer_signup SET Customer_Name='$firstname', Customer_Lastname='$lastname', Customer_Telephone='$telephone', Customer_Birthday='$birthday', Favorite_gerne='$gerne'
        WHERE Customer_Username = '$oldusername'";
        mysqli_query($db, $query);
        header('location: index.php');
      }
    }

if (isset($_POST['contact_update'])) 
{
  $name = $_POST['Organizer_Name'];
  $bank = $_POST['Organizer_BankAccount'];
  $email = $_POST['Organizer_Email'];
  $telephone = $_POST['Organizer_Telephone'];
  $oldusername = $_SESSION['username'];
    
  if (empty($name)) { array_push($errors, "Name is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($telephone)) { array_push($errors, "Telephone Number is required"); }
  if (empty($bank)) { array_push($errors, "Bank Account is required"); } 
  if (count($errors) == 0) 
      {
        $query = "UPDATE organizer_signup SET Organizer_Email='$email', Organizer_Name='$name', Organizer_Telephone='$telephone', Organizer_BankAccount='$bank'
        WHERE Organizer_Username = '$oldusername'";
        mysqli_query($db, $query);
         header('location: index.php');
      }
    }
    
    if (isset($_POST['edit_concert'])) 
    {

      #$concert_place = $_POST['concert_place'];
      #$concert_image = $_POST['concert_image']; 
      $concert_id = $_SESSION["concert_id"];
      $concert_sell_date_stop = $_POST['concert_sell_date_stop'];
      $concert_sell_time_stop = $_POST['concert_sell_time_stop'];
        
      #if (empty($concert_place)) { array_push($errors, "Concert Place is required"); }
      #if (empty($concert_image)) { array_push($errors, "Zone Photo is required"); }
      if (empty($concert_sell_date_stop)) { array_push($errors, "Date stop to sell ticket is required"); }
      if (empty($concert_sell_time_stop)) { array_push($errors, "Time stop to sell ticket is required"); } 
      if (count($errors) == 0) 
          {
            $query = "UPDATE organizer_concert SET 
            concert_sell_date_stop='$concert_sell_date_stop', 
            concert_sell_time_stop='$concert_sell_time_stop'
            WHERE concert_id = '$concert_id'";
            mysqli_query($db, $query);
            header('location: index.php');
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
            header('location: artist_edit.php');
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
            header('location: index.php');
        } else {echo  implode(" ",$errors);}
    }

    if (isset($_POST['ticket_edit'])) 
    {
        #$ticket_id = $_SESSION['ticket_id'];

        foreach($_SESSION['ticket_id'] as $id) {
          $zone_price =  $_POST['zone_price'][$id];
          $zone_amount =  $_POST['zone_amount'][$id];

          if (empty($zone_price)) { array_push($errors, "Zone Price is required <br>"); }
          if (empty($zone_amount)) { array_push($errors, "Zone Amount is required <br>"); }
          if ($zone_price <= 1) { array_push($errors, "Zone Price need to be number <br>"); }
          if ($zone_amount <= 1) { array_push($errors, "Zone Amount need to be number <br>"); }
        
          if (count($errors) == 0) 
          {
	          $query = "UPDATE organizer_ticket SET 
              zone_price='$zone_price', 
              zone_amount='$zone_amount'
              WHERE ticket_id = '$id'";
              mysqli_query($db, $query);
        } else {echo  implode(" ",$errors);}
      }
        header('location: index.php');
    }
?>
