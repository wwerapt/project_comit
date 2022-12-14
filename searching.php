<?php
$username = "";
$email    = "";
$errors = array();
// connect to the database
$db = mysqli_connect('127.0.0.1', 't65g5', 't65g5', 't65g5');
$db ->set_charset("utf8");

if (isset($_POST['concert_search'])) {
    $concert_name = $_POST['concert_name'];
    $concert_date = $_POST['concert_date'];
    $concert_place = $_POST['concert_place'];
    $zone_price = $_POST['zone_price'];
    //header('location: concert_searching_result.php');
}


?>