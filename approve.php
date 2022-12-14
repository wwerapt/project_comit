<?php
      include 'connection.php';
      $oid=$_GET['oid'];
      $cid=$_GET['cid'];

      if($oid){
      $sql = "SELECT * FROM `organizer_approve` WHERE `Organizer_ID` = $oid ";
      $results = mysqli_query($db, $sql);
      $row = mysqli_fetch_assoc($results);
      $name = $row['Organizer_Name'];
      $bank = $row['Organizer_BankAccount'];
      $username = $row['Organizer_Username'];
      $email = $row['Organizer_Email'];
      $password= $row['Organizer_Password'];
      $telephone = $row['Organizer_Telephone'];
      $sql1 = "INSERT INTO roles SET Username='$username' ,Email='$email' ,Roles='organizer'";
      $sql2 = "INSERT INTO organizer_signup SET Organizer_Username='$username' ,Organizer_Password='$password',Organizer_Email='$email', Organizer_Name='$name'
      , Organizer_Telephone='$telephone', Organizer_BankAccount='$bank'";
      $sql3 = "DELETE FROM `organizer_approve` WHERE `Organizer_ID`= $oid";
      mysqli_query($db, $sql1);
      mysqli_query($db, $sql2);
      mysqli_query($db, $sql3);
      header('location: index.php');
    }

    if($cid){
        $sql = " UPDATE `transaction` SET `status`='success' WHERE`T_NO`= $cid " ;
        mysqli_query($db, $sql);
        $sql1 = "DELETE FROM `payment_confirmpage` WHERE `payment_id`= $cid";
        mysqli_query($db, $sql1);
        header('location: index.php');
      }

?>