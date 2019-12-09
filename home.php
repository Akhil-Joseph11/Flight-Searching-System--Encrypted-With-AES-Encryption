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

<div class="container">
<h1><font color="white">Welcome <?php echo $_SESSION['user']; ?></h1></font>
</div>


<div class="header">
<form action="searchresults.php" method="post">
<h1 class="G"> Book your tickets NOW! </h1>
<div class="form-box">
<input type="text" name="From" class="search-field from" placeholder="From">
<input type="text" name="To" class="search-field to" placeholder="To">
<input type="date" name="Date" class="search-field to" placeholder="Date">
<button class="search-btn" type="submit"> Search </button>
</div>
</form>
</div>
</body>
</html>
