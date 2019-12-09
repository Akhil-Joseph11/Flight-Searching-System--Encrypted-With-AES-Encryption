<?php
session_start();
if(!isset($_SESSION['user'])) {
    header('location:adminlogin.php');
 
}
?>

<!DOCTYPE html>
<head>
<title>
View Routes
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
   <li><a href="home1.php">HOME</a></li>
   <li><a href="dashboard1.php">DASHBOARD</a></li>
   <li><a href="contactus1.php">CONTACT US</a></li>
   <li><a href="logout1.php"> LOGOUT </a></li>
   </ul>
</p>
<br>
<p>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flightdatabase";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT routeid, from1, to1, distance  FROM routes";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
 echo "<table><tr><th>Route ID</th><th>From</th><th>To</th><th>Distance</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["routeid"]. "</td><td> " . $row["from1"]. "</td><td>". $row["to1"]. "</td><td>". $row["distance"]. "</td></tr><br>";
    }
} else {
    echo "<font color=white><h3> 0 results </h3></font>";
}
$conn->close();
?> 

</p>
</body>
</html>