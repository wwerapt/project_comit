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

<head>  
           <title>TICKET MELON DATABASE</title>  
            
      </head>  
      <body >  
             <h2><center><b> USER'S TICKET BOOKINGS</center></b></h2>
             <h2><center> <p><a href="index.php">Go Back</a></p></center></h2>
           <div class="container">  
                <br />  
                <center> <table id="database_table" class="table table-striped table-bordered">  </center>
                          <thead>  
                            <tr>
  <th>Concert Name </th>
  <th>Concert Date </th>
  <th>Concert Place</th>
  <th>Zone Name</th>
  <th>Zone Price</th>
  <th>Amount</th>
  <th>Payment Status</th>
   </tr>  
                          </thead>  
                          <tbody>



<?php
include 'connection.php' ;
$db = mysqli_connect('127.0.0.1', 't65g5', 't65g5', 't65g5');
$username = $_SESSION['username'];
$sql_transactions="SELECT * FROM `transaction` WHERE `Customer_Username`='$username'" ;
$result = $db->query($sql_transactions);
while($row = $result->fetch_assoc()){
    if($row["status"]== 'pending'){
        echo'<tr class="class="table table-striped table-bordered"">
        <td>'.$row["concert_name"].'</td>
        <td>'.$row["concert_date"].'</td>
        <td>'.$row["concert_place"].'</td>
        <td>'.$row["zone_name"].'</td>
        <td>'.$row["zoneprice"].'</td>
        <td>'.$row["Amount"].'</td>
        <td><a href="payment_confirm.php">Pending</a></td>';
    }
    if($row["status"]== 'success'){
        echo'<tr class="class="table table-striped table-bordered"">
        <td>'.$row["concert_name"].'</td>
        <td>'.$row["concert_date"].'</td>
        <td>'.$row["concert_place"].'</td>
        <td>'.$row["zone_name"].'</td>
        <td>'.$row["zoneprice"].'</td>
        <td>'.$row["Amount"].'</td>
        <td>'.$row["status"].'</td>';
    }
}
?>

</tbody>
</table>
</div>
 <script>  
 $(document).ready(function() {
    $('#database_table').DataTable( {
        "order": [[ 1, "desc" ]]
    } );
} ); 
 </script>  