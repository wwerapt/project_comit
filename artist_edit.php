<?php
    include('update.php'); 
    $concert_id = $_GET['concert_id'];
    $_SESSION["concert_id"] = $concert_id;
?>

<!DOCTYPE html>
<html lang = "en">
<head>
	<title>Artist</title> <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
<center><h1>Artist</h1></center>
</div>

    <form action="artist_edit.php" method="post">
				             <h2><center> <p><a href="concert_manage.php">Go Back</a></p></center></h2>

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
            </select> <br></br>
        </div>

        <div class="input-group">
  	        <button type="submit" class="btn" name="artist_more">Add More artist</button> <br></br>
  	    </div>

        <div class="input-group">
  	        <button type="submit" class="btn" name="artist_submit">Submit</button> <br></br>
  	    </div>
    
    </form>
    

</body>
</html>