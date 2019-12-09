<?php
session_start();
if(!isset($_SESSION['user'])) {
  header('location:adminlogin.php');
 
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
   <li><a href="home1.php">HOME</a></li>
   <li><a href="dashboard1.php">DASHBOARD</a></li>
   <li><a href="contactus1.php">CONTACT US</a></li>
   <li><a href="logout1.php"> LOGOUT </a></li>
   </ul>
</p>

<br>
<p>
<div>
<table>
    <tr><td><a href="ar.php">Add Routes</a></td></tr>
    <tr><td><a href="dr.php">Delete Routes</a></td></tr>
    <tr><td><a href="vr.php">View Routes</a></td></tr>
    <tr><td><a href="af.php">Add Flights</a></td></tr>
    <tr><td><a href="df.php">Delete Flights</a></td></tr>
    <tr><td><a href="vf.php">View Flights</a></td></tr>
    <tr><td><a href="adminregistration.php">Add Another Admin</a></td></tr>
</table>
</div>
</p>
</body>
</html>