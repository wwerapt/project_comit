<?php
    include('connection.php'); 
?>

<!DOCTYPE html>
<html lang = "en">
<head>
	<title>Artist</title>  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <h1>Artist</h1>

    <form action="artist_concert.php" method="post">

        <div class="input-group">
	        <label for="artist_name">Artist Name:</label>
	        <input type="text" id="artist_name" name="artist_name"><br></br>
        </div>

        <div class="input-group">
            <label for="artist_gerne">Artist Genre:</label>
            <select class="form-select" name="artist_gerne" >
                <option selected>Select Genre</option>
                <option value="1">Pop</option>
                <option value="2">Rock</option>
                <option value="3">Jazz</option>
            </select>
        </div>

        <div class="input-group">
  	        <button type="submit" class="btn" name="artist_more">Add more</button>
  	    </div>

        <div class="input-group">
  	        <button type="submit" class="btn" name="artist_submit">Next</button>
  	    </div>
    
    </form>
    

</body>
</html>