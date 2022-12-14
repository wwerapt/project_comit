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
           <title>TICKET MELON CONCERT DATABASE</title>  
            
      </head>  
      <body >  
             <h2><center><b> CONCERT DELETE</center></b></h2>
             <h2><center> <p><a href="index.php">Go Back</a></p></center></h2>

           <div class="container">  
                <br />  
                <center> <table id="database_table" class="table table-striped table-bordered">  </center>
                          <thead>  
                            <tr>
  <th>Concert Name </th>
  <th>Concert Date </th>
  <th>Concert Time</th>
  <th>Concert Place</th>
  <th>Delete Concert</th>
   </tr>  
    </thead>  
    <tbody>

<?php
include 'connection.php' ;
$db = mysqli_connect('127.0.0.1', 't65g5', 't65g5', 't65g5');

$sql_transactions="SELECT * FROM `organizer_concert`";
$result = $db->query($sql_transactions);
while($row = $result->fetch_assoc()){
        echo'<tr class="class="table table-striped table-bordered"">
        <td>'.$row["concert_name"].'</td>
        <td>'.$row["concert_date"].'</td>
        <td>'.$row["concert_time"].'</td>
        <td>'.$row["concert_place"].'</td>
        <td><a href="delete.php?cid='.$row["concert_id"].' ">Delete</a></td>';
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


