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
           <title>TICKET MELON CUSTOMER BILL DATABASE</title>  
            
      </head>  
      <body >  
             <h2><center><b> CUSTOMER BILL APPROVING</center></b></h2>
             <h2><center> <p><a href="index.php">Go Back</a></p></center></h2>

           <div class="container">  
                <br />  
                <center> <table id="database_table" class="table table-striped table-bordered">  </center>
                          <thead>  
                            <tr>
  <th>Customer ID </th>
  <th>PAYMENT </th>
  <th>Amount</th>
  <th>Date</th>
  <th>Time</th>
  <th>Bank Account</th>
  <th>Last 4 Digits</th>
  <th>Approve Status</th>
   </tr>  
    </thead> 
    <tbody>

<?php
include 'connection.php' ;
$db = mysqli_connect('127.0.0.1', 't65g5', 't65g5', 't65g5');
$username = $_SESSION['username'];
$sql_transactions="SELECT * FROM `payment_confirmpage`";
$result = $db->query($sql_transactions);
while($row = $result->fetch_assoc()){
        echo'<tr class="class="table table-striped table-bordered"">
        <td>'.$row["Customer_Username"].'</td>
        <td>'.$row["payment_bill"].'</td>
        <td>'.$row["payment_amount"].'</td>
        <td>'.$row["payment_date"].'</td>
        <td>'.$row["payment_time"].'</td>
        <td>'.$row["payment_bank"].'</td>
        <td>'.$row["payment_digit"].'</td>
        <td><a  href="approve.php?cid='.$row["payment_ID"].' ">Approve</a></td>';
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


