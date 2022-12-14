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
</style>
<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concert Manage</title>
</head>
<body>




    <form action="manage_concert.php" method="post">
        <?php
            $db = mysqli_connect('127.0.0.1', 't65g5', 't65g5', 't65g5');
            if (!$db) {
                die("Connection failed: " . mysqli_connect_error());
              }
            $usernames = $_SESSION['username'];
            $res = mysqli_query($db,"SELECT Organizer_ID FROM organizer_signup WHERE Organizer_Username = '$usernames'");
            $row = mysqli_fetch_assoc($res);
            $org_id = $row['Organizer_ID'];  
            $result = mysqli_query($db,"SELECT * FROM organizer_concert 
            WHERE org_id = '$org_id'");
        ?>

            <?php
            if (mysqli_num_rows($result) > 0) {
                ?>
                <h2><center><b> Choose Concert</center></b></h2>
                <h2><center> <p><a href="index.php">Go Back</a></p></center></h2>
    <div class="container">  
    <br />  
    <center> <table id="database_table" class="table table-striped table-bordered">  </center>
                    <tr>
                        <th>Concert Name </th>
                        <th>Concert Date </th>
                        <th>Concert Time</th>
                        <th>Concert Place</th>
                        <th>Edit Concert</th>
                        <th>Edit Artist</th>
                        <th>Edit Ticket</th>
                    </tr>
                <?php
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) 
                {echo  
                    "<tr>
                        <td> {$row["concert_name"]}  </td>
                        <td> {$row["concert_date"]}  </td>
                        <td> {$row["concert_time"]}  </td>
                        <td> {$row["concert_place"]} </td>
                        <td> 
                            <a href ='concert_edit.php?concert_id={$row["concert_id"]}'> 
                                edit concert
                            </a> 
                        </td>
                        <td> 
                            <a href ='artist_edit.php?concert_id={$row["concert_id"]}'> 
                                Add more artist
                            </a> 
                        </td>
                        <td> 
                            <a href ='ticket_edit.php?concert_id={$row["concert_id"]}'> 
                                edit ticket
                            </a> 
                        </td>
                    </tr>";
                }
              } else {
                echo "No concert that you organize, Please create concert <br>";
                echo "<a href = 'index.php'>Go back</a>";
              }
            ?>
        </table>
    </form>
</body>