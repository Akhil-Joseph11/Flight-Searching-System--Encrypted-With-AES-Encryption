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
$name = $_SESSION['user'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT* FROM usertable where ('name')='$name'";
$result = $conn->query($sql);
if ($result->num_rows = 1) {
    while($row = $result->fetch_assoc()) {
        $a= $row["user"];
        $b= $row["password"];
        $c= $row["phone"];
        $d= $row["email"];
    }
} else {
    echo "0 results";
}
$conn->close();
?> 

</p>
</body>
</html>