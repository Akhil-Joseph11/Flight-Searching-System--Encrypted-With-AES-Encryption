<?php
session_start();
if(!isset($_SESSION['user'])) {
    header('location:adminlogin.php');
  
}
?>

<!DOCTYPE html>
<head>
<title>
View Flights
</title>
<link rel="stylesheet" type="text/css" href="style1.css">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

td a {
    color: white;
    text-decoration: none;
}
</style>
</head>
<body>
<p>
<ul id="nav">
   <li><a href="home.php">HOME</a></li>
   <li><a href="dashboard.php">DASHBOARD</a></li>
   <li><a href="contactus.php">CONTACT US</a></li>
   <li><a href="logout.php"> LOGOUT </a></li>
   </ul>
</p>
<br>
<p>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flightdatabase";
$key = 'qkwjdiw239&&jdafweihbrhnan&^%$ggdnawhd4njshjwuuO';
$iv = '1000100010001000';

function encryptthis($data, $key, $iv) {
    $encryption_key = base64_decode($key);
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
    return base64_encode($encrypted);
    }

function decryptthis($data, $key, $iv) {
    $encryption_key = base64_decode($key);
    $new_data= base64_decode($data);
    return openssl_decrypt($new_data, 'aes-256-cbc', $encryption_key, 0, $iv);
    }

$name = $_SESSION['user'];
$name1= encryptthis($name, $key, $iv);

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT flightnumber,from1,to1,date1,departure,arrival,price FROM bookings where user='$name1'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
 echo "<table><tr><th> Flight Number </th><th> From </th><th> To </th><th> Date </th><th> Departure </th><th> Arrival </th><th> Price </th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["flightnumber"]. "</td><td> " . $row["from1"]. "</td><td>". $row["to1"]. "</td><td>". $row["date1"]. "</td><td>". $row["departure"]. "</td><td>". $row["arrival"]. "</td><td>". $row["price"]. "</td></tr><br>";
    }
} else {
    echo "<font color=white><h3> No Bookings made. </h3></font>";
}
$conn->close();
?> 

</p>
</body>
</html>