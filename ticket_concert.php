<?php
    include('connection.php'); 
?>

<!DOCTYPE html>
<html lang = "en">
<head>
	<title>Ticket</title> <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <h1>Ticket</h1>

    <form action="ticket_concert.php" method="post">

        <div class="input-group">
	        <label for="zone_name">Zone Name:</label>
	        <input type="text" id="zone_name" name="zone_name"><br></br>
        </div>

        <div class="input-group">
	        <label for="zone_price">Zone price:</label>
	        <input type="int" id="zone_price" name="zone_price"><br></br>
        </div>

        <div class="input-group">
	        <label for="zone_amount">Zone Amount:</label>
	        <input type="int" id="zone_amount" name="zone_amount"><br></br>
        </div>

        <div class="input-group">
  	        <button type="submit" class="btn" name="ticket_more">Add more</button>
  	    </div>

        <div class="input-group">
  	        <button type="submit" class="btn" name="ticket_submit">Next</button>
  	    </div>
    
    </form>
    

</body>
</html>