<?php
session_start();
if(!isset($_SESSION['user'])) {
  header('location:intro.php');    
}
?>

<!DOCTYPE html>
<head>
<title>
    Dashboard
</title>
<link rel="stylesheet" type="text/css" href="style1.css">
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
<div>
<table>
    <tr><td><a href="home.php">Search Flights</a></td></tr>
    <tr><td><a href="bookingsview.php">View Booking History</a></td></tr>
    <tr><td><a href="payment.php">Payments</a></td></tr>
</table>
</div>
</p>
</body>
</html>