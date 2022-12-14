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

h1 {
  font-size: 20px;
  margin-top: 0;
      font-family: Montserrat, sans-serif;

 
}
h2 h3 {
  font-size: 40px;
  margin-top: 0;
      font-family: Montserrat, sans-serif;
      color:black;
}
span {
  color: black;
}
#options {
	align-content:center;
	align-items:center;
    text-align: center;
}
.printable {
   padding-left: center;
   10px;text-align:center;
}
</style>

<?php
    include('update.php');
    $db = mysqli_connect('127.0.0.1', 't65g5', 't65g5', 't65g5');
        if (!$db) {
            die("Connection failed: " . mysqli_connect_error());
        }
    $concert_id = $_GET['concert_id'];
    $_SESSION["concert_id"] = $concert_id;
    $result = mysqli_query($db,"SELECT * FROM organizer_ticket WHERE concert_id = '$concert_id'");
    $ticket_id = array();
?>

<!DOCTYPE html>
<html lang = "en">
<head>
	<title>Ticket</title> <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <form action="ticket_edit.php" method="post">
<h2><center><b> Ticket Edit</center></b></h2>
<h2><center> <p><a href="concert_manage.php">Go Back</a></p></center></h2>
		<br>
    <center> <table id="database_table" class="table table-striped table-bordered">  </center>
                          <thead>  
                            <tr>
            <th>Zone Name </th>
            <th>Zone Price </th>
            <th>Zone Amount</th>
        </tr>
        <?php
        // output data of each row
            while($row = mysqli_fetch_assoc($result)) 
            {
                array_push($ticket_id,$row['ticket_id']);
                echo  
                "<tr>
                    <td> {$row['zone_name']} </td>
                    <td> 
                        <label for='zone_price'></label>
                        <input type='text' id='zone_price' name='zone_price[".$row['ticket_id']."]' value = '{$row['zone_price']}'><br></br>
                    </td>
                    <td> 
                        <label for='zone_amount'></label>
                        <input type='text' id='zone_amount' name='zone_amount[".$row['ticket_id']."]' value = '{$row['zone_amount']}'><br></br>
                    </td>
                </tr>";
                
            }

            $_SESSION['ticket_id'] = $ticket_id;
        ?>
    </table>

    <div class="input-concert">
        <button type="submit" class="btn" name="ticket_edit">Submit</button> <br></br>
    </div>

    <?php
        
    ?>

    </form>

</body>