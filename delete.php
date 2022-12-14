<?php
      include 'connection.php';
      $cid=$_GET['cid'];

      if($cid){
      $sql = "DELETE FROM `organizer_concert` WHERE `concert_id`= $cid";
      mysqli_query($db, $sql);
      header('location: index.php');
    }

?>