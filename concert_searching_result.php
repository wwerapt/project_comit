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
  session_start();
  include('searching.php');
  $string = "";
  $concert_name = $_POST['concert_name'];
  $concert_date = $_POST['concert_date'];
  $concert_place = $_POST['concert_place'];
  $zone_price = $_POST['zone_price'];
  if (! empty($concert_name)) {
    if (empty($string)) {
      $string .= " WHERE concert_name = ". "'".$concert_name."'";
    } else {
      $string .= " AND concert_name = ". "'".$concert_name."'";
    }
  }
  if (! empty($concert_date)) {
    if (empty($string)) {
      $string .= " WHERE concert_date = ". "'"."$concert_date"."'";
    } else {
      $string .= " AND concert_date = ". "'"."$concert_date"."'";
    }
  }
  if (! empty($concert_place)) {
    if (empty($string)) {
      $string .= " WHERE concert_place = ". "'"."$concert_place"."'";
    } else {
      $string .= " AND concert_place = ". "'"."$concert_place"."'";
    }
  }
  if (! empty($zone_price)) {
    if (empty($string)) {
      $string .= " WHERE zone_price = ". $zone_price;
    } else {
      $string .= " AND zone_price = ". $zone_price;
    }
  }
  $query = sprintf("SELECT zone_name, concert_name , concert_date , concert_place , zone_price, ticket_id FROM organizer_concert JOIN organizer_ticket ON organizer_concert.concert_id = organizer_ticket.concert_id
  ". $string); 
  $result = mysqli_query($db, $query) or die("$query");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concert Searching</title>
</head>
<body>
    <h2><center><b> Concert Searching</center></b></h2>
	<h2><center> <p><a href="index.php">Go Back</a></p></center></h2>
    <div class="container">  
                <br />  
                <center> <table id="database_table" class="table table-striped table-bordered">  </center>
                          <thead>  
                            <tr>
  <th>Concert Name</th>
  <th>Date </th>
  <th>Place</th>
  <th>Zone Name</th>
  <th>Zone Price</th>
  <th>Ticket Amount</th>
  <th>Buying Ticket</th>
   </tr>  
    </thead>  
    <tbody>
    <?php
   
    while($row = mysqli_fetch_array($result)) { 
// เพิ่ม case แจ้ง error กรณีลูกค้าไม่ได้กรอบจำนวนบัตร
      echo'
        <form method="POST" action="ticketbuyingpage.php?oid='.$row["ticket_id"].' ">
        <tr class="class="table table-striped table-bordered"">
        <td>'.$row["concert_name"].'</td>
        <td>'.$row["concert_date"].'</td>
        <td>'.$row["concert_place"].'</td>
        <td>'.$row["zone_name"].'</td>
        <td>'.$row["zone_price"].'</td>
        <td><input type="number" name="ticket_amount" min="0"></td>
        <td><button type="submit" name="ticketbuying" href="ticketbuyingpage.php?oid='.$row["ticket_id"].' ">Click Here</button></td>
        </form>'
        ;
    }
    echo "</table>";
    ?>
</body>
</html>