<style>

table#database_table {
    font-size:16px;
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    border-spacing: 0;
}

#database_table td, #database_table th {
    border: 1px solid #ddd;
    text-align: left;
    padding: 8px;
}

#database_table tr:nth-child(even){background-color: #f2f2f2}

#database_table th {
    padding-top: 11px;
    padding-bottom: 11px;
    background-color: black;
    color: white;
}

</style>
<?php
include('connection.php');
$username = $_SESSION['username'];

$db = mysqli_connect('127.0.0.1', 't65g5', 't65g5', 't65g5');
$gerne = "SELECT Favorite_gerne FROM customer_signup WHERE Customer_Username = '$username'";


$query = "SELECT concert_name , artist_name , concert_date , concert_time , concert_place , zone_name , zone_price, ticket_id
FROM organizer_artist , organizer_concert , organizer_ticket
WHERE organizer_artist.artist_gerne IN ($gerne)
AND organizer_concert.concert_id = organizer_artist.concert_id
AND organizer_concert.concert_id = organizer_ticket.concert_id";

$prepared = $db->prepare($query);
$prepared->execute();
$result = $prepared->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concert Recommending</title>
</head>
<body>
    <h2><center><b> Concert Recommending</center></b></h2>
    <h2><center> <p><a href="index.php">Go Back</a></p></center></h2>
    <div class="container">  
                <br />  
                <center> <table id="database_table" class="table table-striped table-bordered">  </center>

  <tr>
    <th>S.N</th>
    <th>Concert Name</th>
    <th>Artist Name</th>
    <th>Concert Date</th>
    <th>Concert Time</th>
    <th>Concert Place</th>
    <th>Zone Name</th>
    <th>Zone Price</th>
    <th>Ticket Amount</th>
    <th>Buying Ticket</th>
  </tr>
<?php
if ($result->num_rows > 0) {
  $sn=1;
  while($data = $result->fetch_assoc()) {
 ?>
 <tr>
   <td><?php echo $sn; ?> </td>
   <td><?php echo $data['concert_name']; ?> </td>
   <td><?php echo $data['artist_name']; ?> </td>
   <td><?php echo $data['concert_date']; ?> </td>
   <td><?php echo $data['concert_time']; ?> </td>
   <td><?php echo $data['concert_place']; ?> </td>
   <td><?php echo $data['zone_name']; ?> </td>
   <td><?php echo $data['zone_price']; ?> </td>
   <?php
   echo ' <form method="POST" action="ticketbuyingpage.php?oid='.$data["ticket_id"].' ">
   <td><input type="number" name="ticket_amount" min="0"></td>
   <td><button type="submit" name="ticketbuying" href="ticketbuyingpage.php?oid='.$data["ticket_id"].'">Click Here</button></td>
   '  ?>

  </tr>
  </form>
 <?php
  $sn++;}
} else { 
  ?>
    <tr>
     <td colspan="8">No data found</td>
    </tr>

 <?php } ?>
 </table
 
