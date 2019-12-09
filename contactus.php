<?php
session_start();
if(!isset($_SESSION['user'])) {
    header('location:intro.php');
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
   <li><a href="home.php">HOME</a></li>
   <li><a href="dashboard.php">DASHBOARD</a></li>
   <li><a href="contactus.php">CONTACT US</a></li>
   <li><a href="logout.php"> LOGOUT </a></li>
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