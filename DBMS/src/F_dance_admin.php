<?php

// Username is root
$user = 'root';
$password = '';

// Database name is gfg
$database = 'registration';

// Server is localhost with
// port number 3308
$servername='localhost:3306';
$mysqli = new mysqli($servername, $user , $password, $database);

// Checking for connections
if ($mysqli->connect_error) {
    die('Connect Error (' .
    $mysqli->connect_errno . ') '.
    $mysqli->connect_error);
}

// SQL query to select data from database
$sql = "SELECT * FROM facultydance ";
$result = $mysqli->query($sql);
$mysqli->close();

?>

<!DOCTYPE html>
<html lang="en">
<body style="background-color:#bbbbf5">
<head>
    <meta charset="UTF-8">
    <title>Event Registration details</title>
    <!-- CSS FOR STYLING THE PAGE -->
    <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }

        h1 {
            text-align: center;
            color: #45DDD1;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT',
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }

        td {
            background-color: #E4F5D4;
            border: 1px solid black;
        }

        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        td {
            font-weight: lighter;
        }
    </style>
</head>

<body>
    <section>
        <h1>Faculty Dance</h1>
        <!-- TABLE CONSTRUCTION-->
        <table>
            <tr>
                <th>name</th>
                <th>Faculty email</th>
				<th>Faculty Id</th>
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS-->
            <?php   // LOOP TILL END OF DATA
                while($rows=$result->fetch_assoc())
                {

             ?>
            <tr>
                <!--FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN-->
                <td><?php echo $rows['name'];?></td>
                <td><?php echo $rows['F_email'];?></td>
				<td><?php echo $rows['F_Id'];?></td>
            </tr>
            <?php
				}
				?>
        </table>

		  <!-- CSS FOR STYLING THE PAGE -->
		  <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }

        h1 {
            text-align: center;
            color: #2556a1;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT',
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }

        td {
            background-color:#f5fafa;
            border: 1px solid black;
        }

        th
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        td {
            font-weight: lighter;
        }
    </style>
</head>
    </body>
</html>

<!--<body
 background="event2.jpg" link="#4f254f" alink="#f2f5f7" vlink="#000">
    <br />-->