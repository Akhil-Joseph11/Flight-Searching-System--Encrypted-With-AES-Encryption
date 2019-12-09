<?php
session_start();
if(!isset($_SESSION['user'])) {
    header('location:adminlogin.php');

}
?>

<!DOCTYPE html>
<head>
<title>
    Contact Us
</title>
<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
<p>
<ul>
   <li><a href="home1.php">HOME</a></li>
   <li><a href="dashboard1.php">DASHBOARD</a></li>
   <li><a href="contactus1.php">CONTACT US</a></li>
   <li><a href="logout1.php"> LOGOUT </a></li>
   </ul>
</p>
<p>
<br>
<table>
<td><h2>THIS PROJECT IS DONE BY:</h2></td>
<tr><td><h1>Akhil Joseph 18BCE0764</h1></td></tr>
<tr><td><h1>akhiljoseph@outlook.com</h1></td></tr>
<tr><td><h1>Phone: 963314991</h1></td></tr>
</table>
</p>
</body>
</html>