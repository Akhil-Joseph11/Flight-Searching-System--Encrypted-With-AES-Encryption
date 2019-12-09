<?php

session_start();
if(!isset($_SESSION['user'])){
    header('location:adminlogin.php');
}

?>

<!DOCTYPE html>
<head>
<title>Home Page</title>
<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
<ul>
   <li><a href="home1.php">HOME</a></li>
   <li><a href="dashboard1.php">DASHBOARD</a></li>
   <li><a href="contactus1.php">CONTACT US</a></li>
   <li><a href="logout1.php"> LOGOUT </a></li>
 </ul>
   
<div class="container">
<h1 align="center"><br><br><br><br><br><br><br><font size=+9 color="white">Welcome <?php echo $_SESSION['user']; ?></h1></font>
</div>
</body>

</html>
