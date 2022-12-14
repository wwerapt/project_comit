<?php
    include('update.php');
    $db = mysqli_connect('127.0.0.1', 't65g5', 't65g5', 't65g5');
        if (!$db) {
            die("Connection failed: " . mysqli_connect_error());
        }
    $concert_id = $_GET['concert_id'];
    $_SESSION["concert_id"] = $concert_id;
    $result = mysqli_query($db,"SELECT * FROM organizer_concert WHERE concert_id = '$concert_id'");
    $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Edit</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
    <h1>Edit concert</h1>
    </div>
    <form action="concert_edit.php" method="post">
		             <h2><center> <p><a href="concert_manage.php">Go Back</a></p></center></h2>
<!--
        <div class="input-group">
	        <label for="concert_place">Concert Place:</label>
	        <input type="text" id="concert_place" name="concert_place" value="<?php #echo $row["concert_place"] ?>"><br></br>
        </div>

        <div class="input-group">
            <label for="concert_image">Zone Photo:</label>
	        <input type="file" id="concert_image" name="concert_image" value="<?php #$row["concert_image"] ?>"><br></br>
        </div>
    -->
        <div class="input-group">
            <label for="concert_sell_date_stop">Date stop to sell ticket:</label>
	        <input type="date" id="concert_sell_date_stop" name="concert_sell_date_stop" value="<?php echo $row["concert_sell_date_stop"] ?>"><br></br>
        </div>

        <div class="input-group">
            <label for="concert_sell_time_stop">Time stop to sell ticket:</label>
	        <input type="time" id="concert_sell_time_stop" name="concert_sell_time_stop" value="<?php echo $row["concert_sell_time_stop"] ?>"><br></br>
        </div>

        <div class="input-group">
            <button type="submit" class="btn" name="edit_concert">Edit Concert</button>
        </div>

    </form>
    <?php
        /*
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row) {
                echo "concert_name: " . $row["concert_name"]. "<br>" .
                     "concert_date: " . $row["concert_date"]. "<br>" .
                     "concert_time: " . $row["concert_time"]. "<br>" .
                     "concert_place: " . $row["concert_place"]. "<br>" .
                     "concert_image: " . $row["concert_image"]. "<br>" .
                     "concert_sell_date_start: " . $row["concert_sell_date_start"]. "<br>" .
                     "concert_sell_time_start: " . $row["concert_sell_time_start"]. "<br>" .
                     "concert_sell_date_stop: " . $row["concert_sell_date_stop"]. "<br>" .
                     "concert_sell_time_stop: " . $row["concert_sell_time_stop"]. "<br>".
                     "";
            }
        } else {
            echo "0 results";
        }*/
    ?>
</body>