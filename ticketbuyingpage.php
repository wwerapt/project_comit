
           <br>
			<style >
$black: #343434;
.ticket {
    font-family: Montserrat, sans-serif;
}

.ticketdesign {
  background: linear-gradient(to bottom, #FFC107 0%, #FFC107 19%, #d9d9d9 19%, #d9d9d9 100%);
  float: center;
  object-position: center;
  padding: 3em;
  margin-top: 25px;

}


.ticketstructure {
  align-content: center;
  border-top-left-radius: 8px;
  border-bottom-left-radius: 8px;
   border-top-right-radius: 8px;
   border-bottom-right-radius: 8px;
  width: 44em;
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

include('connection.php');
if(isset($_POST['ticket_amount']))
{
  $ticket = $_POST['ticket_amount'];
}
$username= $_SESSION['username'];
$cid=$_GET['oid'];
$sel="SELECT * FROM `organizer_ticket` WHERE `ticket_id`=$cid";
$rs=$db->query($sel);
$row=$rs->fetch_assoc();
$zone = $row['zone_name'];
$price = $ticket * $row['zone_price'];
$sql="SELECT * FROM `organizer_ticket` WHERE `ticket_id` = '$cid' ";
$results = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($results);
$amt = $row['zone_amount'];
$conid = $row['concert_id'];
$remain = (int)$amt-(int)$ticket;
if ($remain >= 0){
$sql1="SELECT * FROM `organizer_concert` WHERE `concert_id`= '$conid' ";
$results = mysqli_query($db, $sql1);
$row = mysqli_fetch_assoc($results);
$name = $row['concert_name'];
$date = $row['concert_date'];
$place = $row['concert_place'];
$sql2 = "INSERT INTO transaction SET Customer_Username='$username' ,concert_name='$name',concert_date='$date', concert_place='$place'
, zone_name ='$zone', zoneprice = '$price' ,Amount ='$ticket', status ='pending'"; 
$sql3 = "UPDATE organizer_ticket SET zone_amount = $amt-$ticket WHERE `ticket_id` = '$cid'";
mysqli_query($db, $sql2) or die("$sql2");
mysqli_query($db, $sql3) or die("$sql3");
?>
<div class="ticket " id="printable">	
<div class="ticketdesign ticketstructure" >
<h2 align="center"><span>Ticket Details</span></h2>
<br>
<h1 align="center"><b><image src="../Nunnapat/qr_payment" style="width:200px;height:200px; ></b> </h1></span>
<div class="title"><br>
<h2 align="center"><span>SCA Bank </span></h2> 
<h2 align="center"><span>Ticket Watermelon Coop. </span></h2>
<h2 align="center"><span>TOTAL PRICE : &nbsp <?php echo $price ?> </span></h2>
<h2 align="center"><a  href="index.php">Click Here</a> </h2>
</div>    
</div>
</div>
</div>
<?php
}
if ($remain < 0)
{
?>
<h2 align="center"><span>Sorry The Ticket Is Sold Out </span></h2> 
<h2 align="center"><a  href="index.php"> OK </a> </h2>
<?php
}
?>




