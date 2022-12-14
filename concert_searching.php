<?php 
  include('searching.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ticket Watermelon Concert Searching Page</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
  	<h2>Concert Searching</h2>
  </div>

  <form class="row g-3" method="POST" action="concert_searching_result.php">
  <h3><center> <p><a href="index.php">Go Back</a></p></center></h3>
  <div class="input-group">
  		<label>ชื่องาน</label>
  		<input type="text" name="concert_name" placeholder="ชื่องาน" >
  	</div>
    <div class="input-group">
  		<label>Select a Date:</label>
  		<input type="date" name="concert_date"  >
  	</div>
    <div class="input-group">
  		<label>สถานที่</label>
  		<input type="text" name="concert_place" placeholder="สถานที่" >
  	</div>
    <div class="input-group">
  		<label>ราคาบัตร</label>
  		<input type="text" name="zone_price" placeholder="ราคาบัตร" >
  	</div>
    <div class="input-group">
          <center><button class="btn" type="submit" name="concert_search">Search</button></center>
        </div>
  </form>
</body>
</html>

<?php
/*<form class="row g-3" method="POST" action="concert_searching_result.php">
        <div class="row">
          <br>
          <div class="col">
            <br>
            <label for="validationDefault01" class="form-label">ชื่องาน</label>
            <input type="text" name="concert_name" class="form-control" id="validationDefault01" placeholder="ชื่องาน">
          </div>
        </div>

        <div class="row">
          <div class="col">
            <br>    
            <label for="appt">Select a Date:</label>
            <input type="date" name="concert_date" id="appt" name="appt">
          </div>
        </div>

        <div class="row">
        <br>
          <div class="col">
            <br>
            <label for="validationDefault01" class="form-label">สถานที่</label>
            <input type="text" name="concert_place" class="form-control" id="validationDefault01" placeholder="สถานที่">
          </div>
        </div>

        <div class="row">
        <br>
          <div class="col">
            <br>
            <label for="validationDefault01" class="form-label">ราคาบัตร</label>
            <input type="text" name="zone_price" class="form-control" id="validationDefault01" placeholder="ราคาบัตร">
          </div>
        </div>

        <div class="col-12">
          <button class="btn btn-primary" type="submit" name="concert_search">Search</button>
        </div> 
        */