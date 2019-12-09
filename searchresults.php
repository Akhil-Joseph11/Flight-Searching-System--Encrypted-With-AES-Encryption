<?php

session_start();
if(!isset($_SESSION['user'])){
    header('location:intro.php');
}

?>

<!DOCTYPE html>
<head>
<title>Home Page</title>
<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
<ul>
   <li><a href="home.php">HOME</a></li>
   <li><a href="dashboard.php">DASHBOARD</a></li>
   <li><a href="contactus.php">CONTACT US</a></li>
   <li><a href="logout.php"> LOGOUT </a></li>
</ul>
<br>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flightdatabase";
$searcha= $_POST['From'];
$searchb= $_POST['To'];
$searchc= $_POST['Date'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);}

echo "<font color=white><h2> All Flights </h2></font>";

$sql1 = "SELECT flightnumber, date1, departure, arrival, seats, price from flights F, routes R where F.routeid=R.routeid AND R.from1='$searcha' AND R.to1='$searchb' AND F.date1='$searchc' AND F.seats>0 AND price=(select min(price) from flights F, routes R where F.routeid=R.routeid AND R.from1='$searcha' AND R.to1='$searchb' AND F.date1='$searchc' AND F.seats>0)";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
    echo "<table><tr><th><b> CHEAPEST Flight </b></th><th> Date </th><th> Departure </th><th> Arrival </th><th> Seats </th><th> Price </th></tr>";
        while($row1 = $result1->fetch_assoc()) {
            echo "<tr><td>" . $row1["flightnumber"]. "</td><td> " . $row1["date1"]. "</td><td>". $row1["departure"]. "</td><td>". $row1["arrival"]. "</td><td>". $row1["seats"]. "</td><td>". $row1["price"]. "</td><td><form name='book' action='booking.php' method='POST'><button type='submit' name='book' value='". $row1["flightnumber"]. "' >Book Now</button></form></td></tr><br>";
        }
    } 

    
$sql1 = "SELECT flightnumber, date1, departure, arrival, seats, price from flights F, routes R where F.routeid=R.routeid AND R.from1='$searcha' AND R.to1='$searchb' AND F.date1='$searchc' AND F.seats>0 AND arrival-departure=(select min(arrival-departure) from flights F, routes R where F.routeid=R.routeid AND R.from1='$searcha' AND R.to1='$searchb' AND F.date1='$searchc' AND F.seats>0)";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
    echo "<table><tr><th><b> FASTEST Flight </b></th><th> Date </th><th> Departure </th><th> Arrival </th><th> Seats </th><th> Price </th></tr>";
        while($row1 = $result1->fetch_assoc()) {
            echo "<tr><td>" . $row1["flightnumber"]. "</td><td> " . $row1["date1"]. "</td><td>". $row1["departure"]. "</td><td>". $row1["arrival"]. "</td><td>". $row1["seats"]. "</td><td>". $row1["price"]. "</td><td><form name='book' action='booking.php' method='POST'><button type='submit' name='book' value='". $row1["flightnumber"]. "' >Book Now</button></form></td></tr><br>";
        }
    } 

$sql = "SELECT flightnumber, date1, departure, arrival, seats, price from flights F, routes R where F.routeid=R.routeid AND R.from1='$searcha' AND R.to1='$searchb' AND F.date1='$searchc' AND F.seats>0";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<table><tr><th> Flight Number </th><th> Date </th><th> Departure </th><th> Arrival </th><th> Seats </th><th> Price </th></tr>";
       while($row = $result->fetch_assoc()) {
           echo "<tr><td>" . $row["flightnumber"]. "</td><td> " . $row["date1"]. "</td><td>". $row["departure"]. "</td><td>". $row["arrival"]. "</td><td>". $row["seats"]. "</td><td>". $row["price"]. "</td><td><form name='book' action='booking.php' method='POST'><button type='submit' name='book' value='". $row["flightnumber"]. "' >Book Now</button></form></td></tr><br>";
       }
   } else {
    echo "<font color=white><h3> 0 results </h3></font>";
}

 
?>
</body>
</html>
